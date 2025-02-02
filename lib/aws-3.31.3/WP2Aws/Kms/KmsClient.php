<?php
namespace WP2Aws\Kms;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Key Management Service**.
 *
 * @method \WP2Aws\Result cancelKeyDeletion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelKeyDeletionAsync(array $args = [])
 * @method \WP2Aws\Result createAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \WP2Aws\Result createGrant(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createGrantAsync(array $args = [])
 * @method \WP2Aws\Result createKey(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createKeyAsync(array $args = [])
 * @method \WP2Aws\Result decrypt(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise decryptAsync(array $args = [])
 * @method \WP2Aws\Result deleteAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \WP2Aws\Result deleteImportedKeyMaterial(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteImportedKeyMaterialAsync(array $args = [])
 * @method \WP2Aws\Result describeKey(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeKeyAsync(array $args = [])
 * @method \WP2Aws\Result disableKey(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableKeyAsync(array $args = [])
 * @method \WP2Aws\Result disableKeyRotation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableKeyRotationAsync(array $args = [])
 * @method \WP2Aws\Result enableKey(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableKeyAsync(array $args = [])
 * @method \WP2Aws\Result enableKeyRotation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableKeyRotationAsync(array $args = [])
 * @method \WP2Aws\Result encrypt(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise encryptAsync(array $args = [])
 * @method \WP2Aws\Result generateDataKey(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise generateDataKeyAsync(array $args = [])
 * @method \WP2Aws\Result generateDataKeyWithoutPlaintext(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise generateDataKeyWithoutPlaintextAsync(array $args = [])
 * @method \WP2Aws\Result generateRandom(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise generateRandomAsync(array $args = [])
 * @method \WP2Aws\Result getKeyPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getKeyPolicyAsync(array $args = [])
 * @method \WP2Aws\Result getKeyRotationStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getKeyRotationStatusAsync(array $args = [])
 * @method \WP2Aws\Result getParametersForImport(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getParametersForImportAsync(array $args = [])
 * @method \WP2Aws\Result importKeyMaterial(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise importKeyMaterialAsync(array $args = [])
 * @method \WP2Aws\Result listAliases(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \WP2Aws\Result listGrants(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listGrantsAsync(array $args = [])
 * @method \WP2Aws\Result listKeyPolicies(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listKeyPoliciesAsync(array $args = [])
 * @method \WP2Aws\Result listKeys(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listKeysAsync(array $args = [])
 * @method \WP2Aws\Result listResourceTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listResourceTagsAsync(array $args = [])
 * @method \WP2Aws\Result listRetirableGrants(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRetirableGrantsAsync(array $args = [])
 * @method \WP2Aws\Result putKeyPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putKeyPolicyAsync(array $args = [])
 * @method \WP2Aws\Result reEncrypt(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise reEncryptAsync(array $args = [])
 * @method \WP2Aws\Result retireGrant(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise retireGrantAsync(array $args = [])
 * @method \WP2Aws\Result revokeGrant(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise revokeGrantAsync(array $args = [])
 * @method \WP2Aws\Result scheduleKeyDeletion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise scheduleKeyDeletionAsync(array $args = [])
 * @method \WP2Aws\Result tagResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \WP2Aws\Result untagResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \WP2Aws\Result updateAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @method \WP2Aws\Result updateKeyDescription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateKeyDescriptionAsync(array $args = [])
 */
class KmsClient extends WP2AwsClient {}
