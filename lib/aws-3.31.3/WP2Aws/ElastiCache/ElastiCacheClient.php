<?php
namespace WP2Aws\ElastiCache;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon ElastiCache** service.
 *
 * @method \WP2Aws\Result addTagsToResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \WP2Aws\Result authorizeCacheSecurityGroupIngress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise authorizeCacheSecurityGroupIngressAsync(array $args = [])
 * @method \WP2Aws\Result copySnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise copySnapshotAsync(array $args = [])
 * @method \WP2Aws\Result createCacheCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCacheClusterAsync(array $args = [])
 * @method \WP2Aws\Result createCacheParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCacheParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result createCacheSecurityGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCacheSecurityGroupAsync(array $args = [])
 * @method \WP2Aws\Result createCacheSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCacheSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result createReplicationGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReplicationGroupAsync(array $args = [])
 * @method \WP2Aws\Result createSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result deleteCacheCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCacheClusterAsync(array $args = [])
 * @method \WP2Aws\Result deleteCacheParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCacheParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteCacheSecurityGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCacheSecurityGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteCacheSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCacheSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteReplicationGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReplicationGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheClusters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheClustersAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheEngineVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheEngineVersionsAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheParameterGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheParameterGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheParameters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheParametersAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheSecurityGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheSecurityGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeCacheSubnetGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCacheSubnetGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @method \WP2Aws\Result describeEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \WP2Aws\Result describeReplicationGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReplicationGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeReservedCacheNodes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReservedCacheNodesAsync(array $args = [])
 * @method \WP2Aws\Result describeReservedCacheNodesOfferings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReservedCacheNodesOfferingsAsync(array $args = [])
 * @method \WP2Aws\Result describeSnapshots(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSnapshotsAsync(array $args = [])
 * @method \WP2Aws\Result listAllowedNodeTypeModifications(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAllowedNodeTypeModificationsAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \WP2Aws\Result modifyCacheCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyCacheClusterAsync(array $args = [])
 * @method \WP2Aws\Result modifyCacheParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyCacheParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result modifyCacheSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyCacheSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result modifyReplicationGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyReplicationGroupAsync(array $args = [])
 * @method \WP2Aws\Result purchaseReservedCacheNodesOffering(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise purchaseReservedCacheNodesOfferingAsync(array $args = [])
 * @method \WP2Aws\Result rebootCacheCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise rebootCacheClusterAsync(array $args = [])
 * @method \WP2Aws\Result removeTagsFromResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \WP2Aws\Result resetCacheParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resetCacheParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result revokeCacheSecurityGroupIngress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise revokeCacheSecurityGroupIngressAsync(array $args = [])
 * @method \WP2Aws\Result testFailover(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise testFailoverAsync(array $args = [])
 */
class ElastiCacheClient extends WP2AwsClient {}
