<?php
namespace WP2Aws\DynamoDb;

use WP2Aws\Api\Parser\Crc32ValidatingParser;
use WP2Aws\WP2AwsClient;
use WP2Aws\ClientResolver;
use WP2Aws\HandlerList;
use WP2Aws\Middleware;
use WP2Aws\RetryMiddleware;

/**
 * This client is used to interact with the **Amazon DynamoDB** service.
 *
 * @method \WP2Aws\Result batchGetItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetItemAsync(array $args = [])
 * @method \WP2Aws\Result batchWriteItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchWriteItemAsync(array $args = [])
 * @method \WP2Aws\Result createTable(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTableAsync(array $args = [])
 * @method \WP2Aws\Result deleteItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteItemAsync(array $args = [])
 * @method \WP2Aws\Result deleteTable(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTableAsync(array $args = [])
 * @method \WP2Aws\Result describeTable(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTableAsync(array $args = [])
 * @method \WP2Aws\Result getItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getItemAsync(array $args = [])
 * @method \WP2Aws\Result listTables(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTablesAsync(array $args = [])
 * @method \WP2Aws\Result putItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putItemAsync(array $args = [])
 * @method \WP2Aws\Result query(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise queryAsync(array $args = [])
 * @method \WP2Aws\Result scan(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise scanAsync(array $args = [])
 * @method \WP2Aws\Result updateItem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateItemAsync(array $args = [])
 * @method \WP2Aws\Result updateTable(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateTableAsync(array $args = [])
 * @method \WP2Aws\Result describeLimits(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise describeLimitsAsync(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2Aws\Result describeTimeToLive(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise describeTimeToLiveAsync(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2Aws\Result listTagsOfResource(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise listTagsOfResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2Aws\Result tagResource(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2Aws\Result untagResource(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2Aws\Result updateTimeToLive(array $args = []) (supported in versions 2012-08-10)
 * @method \WP2GuzzleHttp\Promise\Promise updateTimeToLiveAsync(array $args = []) (supported in versions 2012-08-10)
 */
class DynamoDbClient extends WP2AwsClient
{
    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['default'] = 10;
        $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        $args['api_provider']['fn'] = [__CLASS__, '_applyApiProvider'];

        return $args;
    }

    /**
     * Convenience method for instantiating and registering the DynamoDB
     * Session handler with this DynamoDB client object.
     *
     * @param array $config Array of options for the session handler factory
     *
     * @return SessionHandler
     */
    public function registerSessionHandler(array $config = [])
    {
        $handler = SessionHandler::fromClient($this, $config);
        $handler->register();

        return $handler;
    }

    /** @internal */
    public static function _applyRetryConfig($value, array &$args, HandlerList $list)
    {
        if (!$value) {
            return;
        }

        $list->appendSign(
            Middleware::retry(
                RetryMiddleware::createDefaultDecider($value),
                function ($retries) {
                    return $retries
                        ? RetryMiddleware::exponentialDelay($retries) / 2
                        : 0;
                },
                isset($args['stats']['retries'])
                    ? (bool) $args['stats']['retries']
                    : false
            ),
            'retry'
        );
    }

    /** @internal */
    public static function _applyApiProvider($value, array &$args, HandlerList $list)
    {
        ClientResolver::_apply_api_provider($value, $args, $list);
        $args['parser'] = new Crc32ValidatingParser($args['parser']);
    }
}
