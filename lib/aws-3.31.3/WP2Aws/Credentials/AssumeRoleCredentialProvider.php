<?php
namespace WP2Aws\Credentials;

use WP2Aws\Exception\WP2AwsException;
use WP2Aws\Exception\CredentialsException;
use WP2Aws\Result;
use WP2Aws\Sts\StsClient;
use WP2GuzzleHttp\Promise;
use WP2GuzzleHttp\Psr7\Request;
use WP2GuzzleHttp\Promise\PromiseInterface;
use WP2GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Credential provider that provides credentials via assuming a role
 * More Information, see: http://docs.aws.amazon.com/aws-sdk-php/v3/api/api-sts-2011-06-15.html#assumerole
 */
class AssumeRoleCredentialProvider
{
    const ERROR_MSG = "Missing required 'AssumeRoleCredentialProvider' configuration option: ";

    /** @var callable */
    private $client;

    /** @var array */
    private $assumeRoleParams;

    /**
     * The constructor requires following configure parameters:
     *  - client: a StsClient
     *  - assume_role_params: Parameters used to make assumeRole call
     *
     * @param array $config Configuration options
     * @throws \InvalidArgumentException
     */
    public function __construct(array $config = [])
    {
        if (!isset($config['assume_role_params'])) {
            throw new \InvalidArgumentException(self::ERROR_MSG . "'assume_role_params'.");
        }

        if (!isset($config['client'])) {
            throw new \InvalidArgumentException(self::ERROR_MSG . "'client'.");
        }

        $this->client = $config['client'];
        $this->assumeRoleParams = $config['assume_role_params'];
    }

    /**
     * Loads assume role credentials.
     *
     * @return PromiseInterface
     */
    public function __invoke()
    {
        $client = $this->client;
        return $client->assumeRoleAsync($this->assumeRoleParams)
            ->then(function (Result $result) {
                return $this->client->createCredentials($result);
            })->otherwise(function (\RuntimeException $exception) {
                throw new CredentialsException(
                    "Error in retrieving assume role credentials.",
                    0,
                    $exception
                );
            });
    }
}
