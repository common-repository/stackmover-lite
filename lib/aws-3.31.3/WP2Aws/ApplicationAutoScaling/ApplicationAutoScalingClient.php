<?php
namespace WP2Aws\ApplicationAutoScaling;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Application Auto Scaling** service.
 * @method \WP2Aws\Result deleteScalingPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteScalingPolicyAsync(array $args = [])
 * @method \WP2Aws\Result deregisterScalableTarget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deregisterScalableTargetAsync(array $args = [])
 * @method \WP2Aws\Result describeScalableTargets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeScalableTargetsAsync(array $args = [])
 * @method \WP2Aws\Result describeScalingActivities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeScalingActivitiesAsync(array $args = [])
 * @method \WP2Aws\Result describeScalingPolicies(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeScalingPoliciesAsync(array $args = [])
 * @method \WP2Aws\Result putScalingPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putScalingPolicyAsync(array $args = [])
 * @method \WP2Aws\Result registerScalableTarget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise registerScalableTargetAsync(array $args = [])
 */
class ApplicationAutoScalingClient extends WP2AwsClient {}
