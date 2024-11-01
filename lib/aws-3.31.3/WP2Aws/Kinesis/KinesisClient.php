<?php
namespace WP2Aws\Kinesis;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis** service.
 *
 * @method \WP2Aws\Result addTagsToStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsToStreamAsync(array $args = [])
 * @method \WP2Aws\Result createStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createStreamAsync(array $args = [])
 * @method \WP2Aws\Result decreaseStreamRetentionPeriod(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise decreaseStreamRetentionPeriodAsync(array $args = [])
 * @method \WP2Aws\Result deleteStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteStreamAsync(array $args = [])
 * @method \WP2Aws\Result describeLimits(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeLimitsAsync(array $args = [])
 * @method \WP2Aws\Result describeStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \WP2Aws\Result disableEnhancedMonitoring(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableEnhancedMonitoringAsync(array $args = [])
 * @method \WP2Aws\Result enableEnhancedMonitoring(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableEnhancedMonitoringAsync(array $args = [])
 * @method \WP2Aws\Result getRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @method \WP2Aws\Result getShardIterator(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @method \WP2Aws\Result increaseStreamRetentionPeriod(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise increaseStreamRetentionPeriodAsync(array $args = [])
 * @method \WP2Aws\Result listStreams(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForStreamAsync(array $args = [])
 * @method \WP2Aws\Result mergeShards(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise mergeShardsAsync(array $args = [])
 * @method \WP2Aws\Result putRecord(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 * @method \WP2Aws\Result putRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRecordsAsync(array $args = [])
 * @method \WP2Aws\Result removeTagsFromStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsFromStreamAsync(array $args = [])
 * @method \WP2Aws\Result splitShard(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise splitShardAsync(array $args = [])
 * @method \WP2Aws\Result startStreamEncryption(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startStreamEncryptionAsync(array $args = [])
 * @method \WP2Aws\Result stopStreamEncryption(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopStreamEncryptionAsync(array $args = [])
 * @method \WP2Aws\Result updateShardCount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateShardCountAsync(array $args = [])
 */
class KinesisClient extends WP2AwsClient {}
