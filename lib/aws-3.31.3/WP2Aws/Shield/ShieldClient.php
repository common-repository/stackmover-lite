<?php
namespace WP2Aws\Shield;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Shield** service.
 * @method \WP2Aws\Result createProtection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createProtectionAsync(array $args = [])
 * @method \WP2Aws\Result createSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result deleteProtection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteProtectionAsync(array $args = [])
 * @method \WP2Aws\Result deleteSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result describeAttack(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAttackAsync(array $args = [])
 * @method \WP2Aws\Result describeProtection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeProtectionAsync(array $args = [])
 * @method \WP2Aws\Result describeSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result listAttacks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAttacksAsync(array $args = [])
 * @method \WP2Aws\Result listProtections(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listProtectionsAsync(array $args = [])
 */
class ShieldClient extends WP2AwsClient {}
