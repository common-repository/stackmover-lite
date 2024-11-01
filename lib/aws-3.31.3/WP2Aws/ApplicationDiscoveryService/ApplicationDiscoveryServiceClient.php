<?php
namespace WP2Aws\ApplicationDiscoveryService;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Application Discovery Service** service.
 * @method \WP2Aws\Result associateConfigurationItemsToApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateConfigurationItemsToApplicationAsync(array $args = [])
 * @method \WP2Aws\Result createApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createApplicationAsync(array $args = [])
 * @method \WP2Aws\Result createTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \WP2Aws\Result deleteApplications(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteApplicationsAsync(array $args = [])
 * @method \WP2Aws\Result deleteTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \WP2Aws\Result describeAgents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAgentsAsync(array $args = [])
 * @method \WP2Aws\Result describeConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result describeExportConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeExportConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result describeExportTasks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeExportTasksAsync(array $args = [])
 * @method \WP2Aws\Result describeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \WP2Aws\Result disassociateConfigurationItemsFromApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateConfigurationItemsFromApplicationAsync(array $args = [])
 * @method \WP2Aws\Result exportConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise exportConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result getDiscoverySummary(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDiscoverySummaryAsync(array $args = [])
 * @method \WP2Aws\Result listConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result listServerNeighbors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listServerNeighborsAsync(array $args = [])
 * @method \WP2Aws\Result startDataCollectionByAgentIds(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startDataCollectionByAgentIdsAsync(array $args = [])
 * @method \WP2Aws\Result startExportTask(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startExportTaskAsync(array $args = [])
 * @method \WP2Aws\Result stopDataCollectionByAgentIds(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopDataCollectionByAgentIdsAsync(array $args = [])
 * @method \WP2Aws\Result updateApplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateApplicationAsync(array $args = [])
 */
class ApplicationDiscoveryServiceClient extends WP2AwsClient {}
