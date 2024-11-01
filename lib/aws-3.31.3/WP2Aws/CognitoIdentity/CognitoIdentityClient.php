<?php
namespace WP2Aws\CognitoIdentity;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Identity** service.
 *
 * @method \WP2Aws\Result createIdentityPool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createIdentityPoolAsync(array $args = [])
 * @method \WP2Aws\Result deleteIdentities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIdentitiesAsync(array $args = [])
 * @method \WP2Aws\Result deleteIdentityPool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIdentityPoolAsync(array $args = [])
 * @method \WP2Aws\Result describeIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeIdentityAsync(array $args = [])
 * @method \WP2Aws\Result describeIdentityPool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeIdentityPoolAsync(array $args = [])
 * @method \WP2Aws\Result getCredentialsForIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCredentialsForIdentityAsync(array $args = [])
 * @method \WP2Aws\Result getId(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityPoolRoles(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityPoolRolesAsync(array $args = [])
 * @method \WP2Aws\Result getOpenIdToken(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getOpenIdTokenAsync(array $args = [])
 * @method \WP2Aws\Result getOpenIdTokenForDeveloperIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getOpenIdTokenForDeveloperIdentityAsync(array $args = [])
 * @method \WP2Aws\Result listIdentities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listIdentitiesAsync(array $args = [])
 * @method \WP2Aws\Result listIdentityPools(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listIdentityPoolsAsync(array $args = [])
 * @method \WP2Aws\Result lookupDeveloperIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise lookupDeveloperIdentityAsync(array $args = [])
 * @method \WP2Aws\Result mergeDeveloperIdentities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise mergeDeveloperIdentitiesAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityPoolRoles(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityPoolRolesAsync(array $args = [])
 * @method \WP2Aws\Result unlinkDeveloperIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise unlinkDeveloperIdentityAsync(array $args = [])
 * @method \WP2Aws\Result unlinkIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise unlinkIdentityAsync(array $args = [])
 * @method \WP2Aws\Result updateIdentityPool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateIdentityPoolAsync(array $args = [])
 */
class CognitoIdentityClient extends WP2AwsClient {}
