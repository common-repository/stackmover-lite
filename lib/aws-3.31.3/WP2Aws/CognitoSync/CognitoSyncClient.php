<?php
namespace WP2Aws\CognitoSync;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Cognito Sync** service.
 *
 * @method \WP2Aws\Result bulkPublish(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise bulkPublishAsync(array $args = [])
 * @method \WP2Aws\Result deleteDataset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDatasetAsync(array $args = [])
 * @method \WP2Aws\Result describeDataset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDatasetAsync(array $args = [])
 * @method \WP2Aws\Result describeIdentityPoolUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeIdentityPoolUsageAsync(array $args = [])
 * @method \WP2Aws\Result describeIdentityUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeIdentityUsageAsync(array $args = [])
 * @method \WP2Aws\Result getBulkPublishDetails(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBulkPublishDetailsAsync(array $args = [])
 * @method \WP2Aws\Result getCognitoEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCognitoEventsAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityPoolConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityPoolConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result listDatasets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDatasetsAsync(array $args = [])
 * @method \WP2Aws\Result listIdentityPoolUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listIdentityPoolUsageAsync(array $args = [])
 * @method \WP2Aws\Result listRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRecordsAsync(array $args = [])
 * @method \WP2Aws\Result registerDevice(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise registerDeviceAsync(array $args = [])
 * @method \WP2Aws\Result setCognitoEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setCognitoEventsAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityPoolConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityPoolConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result subscribeToDataset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise subscribeToDatasetAsync(array $args = [])
 * @method \WP2Aws\Result unsubscribeFromDataset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise unsubscribeFromDatasetAsync(array $args = [])
 * @method \WP2Aws\Result updateRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateRecordsAsync(array $args = [])
 */
class CognitoSyncClient extends WP2AwsClient {}
