<?php
namespace WP2Aws\KinesisAnalytics;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Kinesis Analytics** service.
 * @method \WP2Aws\Result addApplicationCloudWatchLoggingOption(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @method \WP2Aws\Result addApplicationInput(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addApplicationInputAsync(array $args = [])
 * @method \WP2Aws\Result addApplicationOutput(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addApplicationOutputAsync(array $args = [])
 * @method \WP2Aws\Result addApplicationReferenceDataSource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addApplicationReferenceDataSourceAsync(array $args = [])
 * @method \WP2Aws\Result createApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \WP2Aws\Result deleteApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteApplicationAsync(array $args = [])
 * @method \WP2Aws\Result deleteApplicationCloudWatchLoggingOption(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteApplicationCloudWatchLoggingOptionAsync(array $args = [])
 * @method \WP2Aws\Result deleteApplicationOutput(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteApplicationOutputAsync(array $args = [])
 * @method \WP2Aws\Result deleteApplicationReferenceDataSource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteApplicationReferenceDataSourceAsync(array $args = [])
 * @method \WP2Aws\Result describeApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeApplicationAsync(array $args = [])
 * @method \WP2Aws\Result discoverInputSchema(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise discoverInputSchemaAsync(array $args = [])
 * @method \WP2Aws\Result listApplications(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listApplicationsAsync(array $args = [])
 * @method \WP2Aws\Result startApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startApplicationAsync(array $args = [])
 * @method \WP2Aws\Result stopApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopApplicationAsync(array $args = [])
 * @method \WP2Aws\Result updateApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 */
class KinesisAnalyticsClient extends WP2AwsClient {}
