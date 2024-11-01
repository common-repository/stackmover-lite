<?php
namespace WP2Aws\CloudTrail;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS CloudTrail** service.
 *
 * @method \WP2Aws\Result addTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \WP2Aws\Result createTrail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTrailAsync(array $args = [])
 * @method \WP2Aws\Result deleteTrail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTrailAsync(array $args = [])
 * @method \WP2Aws\Result describeTrails(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTrailsAsync(array $args = [])
 * @method \WP2Aws\Result getEventSelectors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getEventSelectorsAsync(array $args = [])
 * @method \WP2Aws\Result getTrailStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTrailStatusAsync(array $args = [])
 * @method \WP2Aws\Result listPublicKeys(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listPublicKeysAsync(array $args = [])
 * @method \WP2Aws\Result listTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \WP2Aws\Result lookupEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise lookupEventsAsync(array $args = [])
 * @method \WP2Aws\Result putEventSelectors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putEventSelectorsAsync(array $args = [])
 * @method \WP2Aws\Result removeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \WP2Aws\Result startLogging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startLoggingAsync(array $args = [])
 * @method \WP2Aws\Result stopLogging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopLoggingAsync(array $args = [])
 * @method \WP2Aws\Result updateTrail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateTrailAsync(array $args = [])
 */
class CloudTrailClient extends WP2AwsClient {}
