<?php
namespace WP2Aws\CloudSearchDomain;

use WP2Aws\WP2AwsClient;
use WP2Aws\CommandInterface;
use WP2GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;
use WP2GuzzleHttp\Psr7;

/**
 * This client is used to search and upload documents to an **Amazon CloudSearch** Domain.
 *
 * @method \WP2Aws\Result search(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise searchAsync(array $args = [])
 * @method \WP2Aws\Result suggest(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise suggestAsync(array $args = [])
 * @method \WP2Aws\Result uploadDocuments(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise uploadDocumentsAsync(array $args = [])
 */
class CloudSearchDomainClient extends WP2AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $list = $this->getHandlerList();
        $list->appendBuild($this->searchByPost(), 'cloudsearchdomain.search_by_POST');
    }

    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['endpoint']['required'] = true;
        $args['region']['default'] = function (array $args) {
            // Determine the region from the provided endpoint.
            // (e.g. http://search-blah.{region}.cloudsearch.amazonaws.com)
            return explode('.', new Uri($args['endpoint']))[1];
        };

        return $args;
    }

    /**
     * Use POST for search command
     *
     * Useful when query string is too long
     */
    private function searchByPost()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $c,
                RequestInterface $r = null
            ) use ($handler) {
                if ($c->getName() !== 'Search') {
                    return $handler($c, $r);
                }
                return $handler($c, self::convertGetToPost($r));
            };
        };
    }

    /**
     * Converts default GET request to a POST request
     *
     * Avoiding length restriction in query
     *
     * @param RequestInterface $r GET request to be converted
     * @return RequestInterface $req converted POST request
     */
    public static function convertGetToPost(RequestInterface $r)
    {
        if ($r->getMethod() === 'POST') {
            return $r;
        }

        $query = $r->getUri()->getQuery();
        $req = $r->withMethod('POST')
            ->withBody(Psr7\stream_for($query))
            ->withHeader('Content-Length', strlen($query))
            ->withHeader('Content-Type', 'application/x-www-form-urlencoded')
            ->withUri($r->getUri()->withQuery(''));
        return $req;
    }
}
