<?php
namespace WP2Aws\Emr;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic MapReduce (Amazon EMR)** service.
 *
 * @method \WP2Aws\Result addInstanceFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addInstanceFleetAsync(array $args = [])
 * @method \WP2Aws\Result addInstanceGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addInstanceGroupsAsync(array $args = [])
 * @method \WP2Aws\Result addJobFlowSteps(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addJobFlowStepsAsync(array $args = [])
 * @method \WP2Aws\Result addTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \WP2Aws\Result cancelSteps(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelStepsAsync(array $args = [])
 * @method \WP2Aws\Result createSecurityConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSecurityConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result deleteSecurityConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSecurityConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result describeCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \WP2Aws\Result describeJobFlows(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeJobFlowsAsync(array $args = [])
 * @method \WP2Aws\Result describeSecurityConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSecurityConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result describeStep(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeStepAsync(array $args = [])
 * @method \WP2Aws\Result listBootstrapActions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBootstrapActionsAsync(array $args = [])
 * @method \WP2Aws\Result listClusters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \WP2Aws\Result listInstanceFleets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listInstanceFleetsAsync(array $args = [])
 * @method \WP2Aws\Result listInstanceGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listInstanceGroupsAsync(array $args = [])
 * @method \WP2Aws\Result listInstances(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listInstancesAsync(array $args = [])
 * @method \WP2Aws\Result listSecurityConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listSecurityConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result listSteps(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listStepsAsync(array $args = [])
 * @method \WP2Aws\Result modifyInstanceFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyInstanceFleetAsync(array $args = [])
 * @method \WP2Aws\Result modifyInstanceGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyInstanceGroupsAsync(array $args = [])
 * @method \WP2Aws\Result putAutoScalingPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putAutoScalingPolicyAsync(array $args = [])
 * @method \WP2Aws\Result removeAutoScalingPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeAutoScalingPolicyAsync(array $args = [])
 * @method \WP2Aws\Result removeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \WP2Aws\Result runJobFlow(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise runJobFlowAsync(array $args = [])
 * @method \WP2Aws\Result setTerminationProtection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setTerminationProtectionAsync(array $args = [])
 * @method \WP2Aws\Result setVisibleToAllUsers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setVisibleToAllUsersAsync(array $args = [])
 * @method \WP2Aws\Result terminateJobFlows(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise terminateJobFlowsAsync(array $args = [])
 */
class EmrClient extends WP2AwsClient {}