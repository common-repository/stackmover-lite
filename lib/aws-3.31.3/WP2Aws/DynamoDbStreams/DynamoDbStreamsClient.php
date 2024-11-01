<?php
namespace WP2Aws\DynamoDbStreams;

use WP2Aws\WP2AwsClient;
use WP2Aws\DynamoDb\DynamoDbClient;

/**
 * This client is used to interact with the **Amazon DynamoDb Streams** service.
 *
 * @method \WP2Aws\Result describeStream(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeStreamAsync(array $args = [])
 * @method \WP2Aws\Result getRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRecordsAsync(array $args = [])
 * @method \WP2Aws\Result getShardIterator(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getShardIteratorAsync(array $args = [])
 * @method \WP2Aws\Result listStreams(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listStreamsAsync(array $args = [])
 */
class DynamoDbStreamsClient extends WP2AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['default'] = 11;
        $args['retries']['fn'] = [DynamoDbClient::class, '_applyRetryConfig'];

        return $args;
    }
}