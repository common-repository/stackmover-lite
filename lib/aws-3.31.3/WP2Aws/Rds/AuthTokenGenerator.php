<?php
namespace WP2Aws\Rds;

use WP2Aws\Credentials\CredentialsInterface;
use WP2Aws\Credentials\Credentials;
use WP2Aws\Signature\SignatureV4;
use WP2GuzzleHttp\Psr7\Request;
use WP2GuzzleHttp\Psr7\Uri;
use WP2GuzzleHttp\Promise;
use WP2Aws;

/**
 * Generates RDS auth tokens for use with IAM authentication.
 */
class AuthTokenGenerator
{

    private $credentialProvider;

    /**
     * The constructor takes an instance of Credentials or a CredentialProvider
     *
     * @param callable|Credentials $creds
     */
    public function __construct($creds)
    {
        if ($creds instanceof CredentialsInterface) {
            $promise = new Promise\FulfilledPromise($creds);
            $this->credentialProvider = WP2Aws\constantly($promise);
        } else {
            $this->credentialProvider = $creds;
        }
    }

    /**
     * Create the token for database login
     *
     * @param string $endpoint The database hostname with port number specified
     *                         (e.g., host:port)
     * @param string $region The region where the database is located
     * @param string $username The username to login as
     *
     * @return string Token generated
     */
    public function createToken($endpoint, $region, $username)
    {
        $uri = new Uri($endpoint);
        $uri = $uri->withPath('/');
        $uri = $uri->withQuery('Action=connect&DBUser=' . $username);

        $request = new Request('GET', $uri);
        $signer = new SignatureV4('rds-db', $region);
        $provider = $this->credentialProvider;

        $url = (string) $signer->presign(
            $request,
            $provider()->wait(),
            '+15 minutes'
        )->getUri();

        // Remove 2 extra slash from the presigned url result
        return substr($url, 2);
    }
}
