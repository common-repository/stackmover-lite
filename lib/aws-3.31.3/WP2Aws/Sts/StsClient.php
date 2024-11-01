<?php
namespace WP2Aws\Sts;

use WP2Aws\WP2AwsClient;
use WP2Aws\Result;
use WP2Aws\Credentials\Credentials;

/**
 * This client is used to interact with the **AWS Security Token Service (AWS STS)**.
 *
 * @method \WP2Aws\Result assumeRole(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise assumeRoleAsync(array $args = [])
 * @method \WP2Aws\Result assumeRoleWithSAML(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise assumeRoleWithSAMLAsync(array $args = [])
 * @method \WP2Aws\Result assumeRoleWithWebIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise assumeRoleWithWebIdentityAsync(array $args = [])
 * @method \WP2Aws\Result decodeAuthorizationMessage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise decodeAuthorizationMessageAsync(array $args = [])
 * @method \WP2Aws\Result getCallerIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCallerIdentityAsync(array $args = [])
 * @method \WP2Aws\Result getFederationToken(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getFederationTokenAsync(array $args = [])
 * @method \WP2Aws\Result getSessionToken(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSessionTokenAsync(array $args = [])
 */
class StsClient extends WP2AwsClient
{
    /**
     * Creates credentials from the result of an STS operations
     *
     * @param Result $result Result of an STS operation
     *
     * @return Credentials
     * @throws \InvalidArgumentException if the result contains no credentials
     */
    public function createCredentials(Result $result)
    {
        if (!$result->hasKey('Credentials')) {
            throw new \InvalidArgumentException('Result contains no credentials');
        }

        $c = $result['Credentials'];

        return new Credentials(
            $c['AccessKeyId'],
            $c['SecretAccessKey'],
            isset($c['SessionToken']) ? $c['SessionToken'] : null,
            isset($c['Expiration']) && $c['Expiration'] instanceof \DateTimeInterface
                ? (int) $c['Expiration']->format('U')
                : null
        );
    }
}
