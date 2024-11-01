<?php
namespace WP2Aws\Athena;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Athena** service.
 * @method \WP2Aws\Result batchGetNamedQuery(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetNamedQueryAsync(array $args = [])
 * @method \WP2Aws\Result batchGetQueryExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetQueryExecutionAsync(array $args = [])
 * @method \WP2Aws\Result createNamedQuery(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createNamedQueryAsync(array $args = [])
 * @method \WP2Aws\Result deleteNamedQuery(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteNamedQueryAsync(array $args = [])
 * @method \WP2Aws\Result getNamedQuery(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getNamedQueryAsync(array $args = [])
 * @method \WP2Aws\Result getQueryExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getQueryExecutionAsync(array $args = [])
 * @method \WP2Aws\Result getQueryResults(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getQueryResultsAsync(array $args = [])
 * @method \WP2Aws\Result listNamedQueries(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listNamedQueriesAsync(array $args = [])
 * @method \WP2Aws\Result listQueryExecutions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listQueryExecutionsAsync(array $args = [])
 * @method \WP2Aws\Result startQueryExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startQueryExecutionAsync(array $args = [])
 * @method \WP2Aws\Result stopQueryExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopQueryExecutionAsync(array $args = [])
 */
class AthenaClient extends WP2AwsClient {}
