<?php
namespace WP2Aws\S3;

use WP2Aws\Api\Parser\AbstractParser;
use WP2Aws\CommandInterface;
use WP2Aws\Exception\WP2AwsException;
use Psr\Http\Message\ResponseInterface;

/**
 * Converts errors returned with a status code of 200 to a retryable error type.
 *
 * @internal
 */
class AmbiguousSuccessParser extends AbstractParser
{
    private static $ambiguousSuccesses = [
        'UploadPartCopy' => true,
        'CopyObject' => true,
        'CompleteMultipartUpload' => true,
    ];

    /** @var callable */
    private $parser;
    /** @var callable */
    private $errorParser;
    /** @var string */
    private $exceptionClass;

    public function __construct(
        callable $parser,
        callable $errorParser,
        $exceptionClass = WP2AwsException::class
    ) {
        $this->parser = $parser;
        $this->errorParser = $errorParser;
        $this->exceptionClass = $exceptionClass;
    }

    public function __invoke(
        CommandInterface $command,
        ResponseInterface $response
    ) {
        if (200 === $response->getStatusCode()
            && isset(self::$ambiguousSuccesses[$command->getName()])
        ) {
            $errorParser = $this->errorParser;
            $parsed = $errorParser($response);
            if (isset($parsed['code']) && isset($parsed['message'])) {
                throw new $this->exceptionClass(
                    $parsed['message'],
                    $command,
                    ['connection_error' => true]
                );
            }
        }

        $fn = $this->parser;
        return $fn($command, $response);
    }
}
