<?php
namespace WP2Aws\CloudWatchEvents;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch Events** service.
 *
 * @method \WP2Aws\Result deleteRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @method \WP2Aws\Result describeEventBus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventBusAsync(array $args = [])
 * @method \WP2Aws\Result describeRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeRuleAsync(array $args = [])
 * @method \WP2Aws\Result disableRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableRuleAsync(array $args = [])
 * @method \WP2Aws\Result enableRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableRuleAsync(array $args = [])
 * @method \WP2Aws\Result listRuleNamesByTarget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRuleNamesByTargetAsync(array $args = [])
 * @method \WP2Aws\Result listRules(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @method \WP2Aws\Result listTargetsByRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTargetsByRuleAsync(array $args = [])
 * @method \WP2Aws\Result putEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putEventsAsync(array $args = [])
 * @method \WP2Aws\Result putPermission(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putPermissionAsync(array $args = [])
 * @method \WP2Aws\Result putRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRuleAsync(array $args = [])
 * @method \WP2Aws\Result putTargets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putTargetsAsync(array $args = [])
 * @method \WP2Aws\Result removePermission(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @method \WP2Aws\Result removeTargets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTargetsAsync(array $args = [])
 * @method \WP2Aws\Result testEventPattern(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise testEventPatternAsync(array $args = [])
 */
class CloudWatchEventsClient extends WP2AwsClient {}
