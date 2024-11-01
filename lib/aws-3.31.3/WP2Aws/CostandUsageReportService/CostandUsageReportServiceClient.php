<?php
namespace WP2Aws\CostandUsageReportService;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Cost and Usage Report Service** service.
 * @method \WP2Aws\Result deleteReportDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReportDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result describeReportDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReportDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result putReportDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putReportDefinitionAsync(array $args = [])
 */
class CostandUsageReportServiceClient extends WP2AwsClient {}
