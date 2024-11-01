<?php
namespace WP2Aws\Firehose;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Firehose** service.
 *
 * @method \WP2Aws\Result createDeliveryStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDeliveryStreamAsync(array $args = [])
 * @method \WP2Aws\Result deleteDeliveryStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDeliveryStreamAsync(array $args = [])
 * @method \WP2Aws\Result describeDeliveryStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDeliveryStreamAsync(array $args = [])
 * @method \WP2Aws\Result listDeliveryStreams(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDeliveryStreamsAsync(array $args = [])
 * @method \WP2Aws\Result putRecord(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRecordAsync(array $args = [])
 * @method \WP2Aws\Result putRecordBatch(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRecordBatchAsync(array $args = [])
 * @method \WP2Aws\Result updateDestination(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDestinationAsync(array $args = [])
 */
class FirehoseClient extends WP2AwsClient {}
