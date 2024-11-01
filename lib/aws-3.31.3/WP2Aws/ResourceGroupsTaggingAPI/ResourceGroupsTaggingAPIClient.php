<?php
namespace WP2Aws\ResourceGroupsTaggingAPI;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Resource Groups Tagging API** service.
 * @method \WP2Aws\Result getResources(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getResourcesAsync(array $args = [])
 * @method \WP2Aws\Result getTagKeys(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTagKeysAsync(array $args = [])
 * @method \WP2Aws\Result getTagValues(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTagValuesAsync(array $args = [])
 * @method \WP2Aws\Result tagResources(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise tagResourcesAsync(array $args = [])
 * @method \WP2Aws\Result untagResources(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise untagResourcesAsync(array $args = [])
 */
class ResourceGroupsTaggingAPIClient extends WP2AwsClient {}
