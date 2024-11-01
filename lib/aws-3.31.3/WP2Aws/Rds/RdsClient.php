<?php
namespace WP2Aws\Rds;

use WP2Aws\WP2AwsClient;
use WP2Aws\Api\Service;
use WP2Aws\Api\DocModel;
use WP2Aws\Api\ApiProvider;
use WP2Aws\PresignUrlMiddleware;

/**
 * This client is used to interact with the **Amazon Relational Database Service (Amazon RDS)**.
 *
 * @method \WP2Aws\Result addSourceIdentifierToSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addSourceIdentifierToSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result addTagsToResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \WP2Aws\Result authorizeDBSecurityGroupIngress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise authorizeDBSecurityGroupIngressAsync(array $args = [])
 * @method \WP2Aws\Result copyDBParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise copyDBParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result copyDBSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise copyDBSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result copyOptionGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise copyOptionGroupAsync(array $args = [])
 * @method \WP2Aws\Result createDBInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBInstanceAsync(array $args = [])
 * @method \WP2Aws\Result createDBInstanceReadReplica(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBInstanceReadReplicaAsync(array $args = [])
 * @method \WP2Aws\Result createDBParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result createDBSecurityGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBSecurityGroupAsync(array $args = [])
 * @method \WP2Aws\Result createDBSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result createDBSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDBSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result createEventSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createEventSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result createOptionGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createOptionGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteDBInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBInstanceAsync(array $args = [])
 * @method \WP2Aws\Result deleteDBParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteDBSecurityGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBSecurityGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteDBSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result deleteDBSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteEventSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteEventSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result deleteOptionGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteOptionGroupAsync(array $args = [])
 * @method \WP2Aws\Result describeDBEngineVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBEngineVersionsAsync(array $args = [])
 * @method \WP2Aws\Result describeDBInstances(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBInstancesAsync(array $args = [])
 * @method \WP2Aws\Result describeDBLogFiles(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBLogFilesAsync(array $args = [])
 * @method \WP2Aws\Result describeDBParameterGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBParameterGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeDBParameters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBParametersAsync(array $args = [])
 * @method \WP2Aws\Result describeDBSecurityGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBSecurityGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeDBSnapshots(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBSnapshotsAsync(array $args = [])
 * @method \WP2Aws\Result describeDBSubnetGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDBSubnetGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeEngineDefaultParameters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEngineDefaultParametersAsync(array $args = [])
 * @method \WP2Aws\Result describeEventCategories(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventCategoriesAsync(array $args = [])
 * @method \WP2Aws\Result describeEventSubscriptions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventSubscriptionsAsync(array $args = [])
 * @method \WP2Aws\Result describeEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \WP2Aws\Result describeOptionGroupOptions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeOptionGroupOptionsAsync(array $args = [])
 * @method \WP2Aws\Result describeOptionGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeOptionGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeOrderableDBInstanceOptions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeOrderableDBInstanceOptionsAsync(array $args = [])
 * @method \WP2Aws\Result describeReservedDBInstances(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReservedDBInstancesAsync(array $args = [])
 * @method \WP2Aws\Result describeReservedDBInstancesOfferings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReservedDBInstancesOfferingsAsync(array $args = [])
 * @method \WP2Aws\Result downloadDBLogFilePortion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise downloadDBLogFilePortionAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \WP2Aws\Result modifyDBInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBInstanceAsync(array $args = [])
 * @method \WP2Aws\Result modifyDBParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result modifyDBSubnetGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBSubnetGroupAsync(array $args = [])
 * @method \WP2Aws\Result modifyEventSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyEventSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result modifyOptionGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyOptionGroupAsync(array $args = [])
 * @method \WP2Aws\Result promoteReadReplica(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise promoteReadReplicaAsync(array $args = [])
 * @method \WP2Aws\Result purchaseReservedDBInstancesOffering(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise purchaseReservedDBInstancesOfferingAsync(array $args = [])
 * @method \WP2Aws\Result rebootDBInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise rebootDBInstanceAsync(array $args = [])
 * @method \WP2Aws\Result removeSourceIdentifierFromSubscription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeSourceIdentifierFromSubscriptionAsync(array $args = [])
 * @method \WP2Aws\Result removeTagsFromResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 * @method \WP2Aws\Result resetDBParameterGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resetDBParameterGroupAsync(array $args = [])
 * @method \WP2Aws\Result restoreDBInstanceFromDBSnapshot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise restoreDBInstanceFromDBSnapshotAsync(array $args = [])
 * @method \WP2Aws\Result restoreDBInstanceToPointInTime(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise restoreDBInstanceToPointInTimeAsync(array $args = [])
 * @method \WP2Aws\Result revokeDBSecurityGroupIngress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise revokeDBSecurityGroupIngressAsync(array $args = [])
 * @method \WP2Aws\Result addRoleToDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise addRoleToDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result applyPendingMaintenanceAction(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise applyPendingMaintenanceActionAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result copyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise copyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result copyDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise copyDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result createDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise createDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result createDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise createDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result createDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise createDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result deleteDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result deleteDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result deleteDBClusterSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise deleteDBClusterSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeAccountAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeCertificates(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeCertificatesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBClusterParameterGroups(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBClusterParameterGroupsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBClusterSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBClusterSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBClusterSnapshots(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBClusterSnapshotsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBClusters(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBClustersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeDBSnapshotAttributes(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeDBSnapshotAttributesAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeEngineDefaultClusterParameters(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeEngineDefaultClusterParametersAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describePendingMaintenanceActions(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describePendingMaintenanceActionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result describeSourceRegions(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise describeSourceRegionsAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result failoverDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise failoverDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result modifyDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result modifyDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result modifyDBClusterSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBClusterSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result modifyDBSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result modifyDBSnapshotAttribute(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise modifyDBSnapshotAttributeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result promoteReadReplicaDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise promoteReadReplicaDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result removeRoleFromDBCluster(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise removeRoleFromDBClusterAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result resetDBClusterParameterGroup(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise resetDBClusterParameterGroupAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result restoreDBClusterFromS3(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise restoreDBClusterFromS3Async(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result restoreDBClusterFromSnapshot(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise restoreDBClusterFromSnapshotAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result restoreDBClusterToPointInTime(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise restoreDBClusterToPointInTimeAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result startDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise startDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2Aws\Result stopDBInstance(array $args = []) (supported in versions 2014-10-31)
 * @method \WP2GuzzleHttp\Promise\Promise stopDBInstanceAsync(array $args = []) (supported in versions 2014-10-31)
 */
class RdsClient extends WP2AwsClient
{
    public function __construct(array $args)
    {
        $args['with_resolved'] = function (array $args) {
            $this->getHandlerList()->appendInit(
                PresignUrlMiddleware::wrap(
                    $this,
                    $args['endpoint_provider'],
                    [
                        'operations' => [
                            'CopyDBSnapshot',
                            'CreateDBInstanceReadReplica',
                            'CopyDBClusterSnapshot',
                            'CreateDBCluster'
                        ],
                        'service' => 'rds',
                        'presign_param' => 'PreSignedUrl',
                    ]
                ),
                'rds.presigner'
            );
        };

        parent::__construct($args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Add the SourceRegion parameter
        $docs['shapes']['SourceRegion']['base'] = 'A required parameter that indicates '
            . 'the region that the DB snapshot will be copied from.';
        $api['shapes']['SourceRegion'] = ['type' => 'string'];
        $api['shapes']['CopyDBSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
        $api['shapes']['CreateDBInstanceReadReplicaMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CopyDBSnapshotMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        // Several parameters in presign APIs are optional.
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$PreSignedUrl']
            = '<div class="alert alert-info">The SDK will compute this value '
            . 'for you on your behalf.</div>';
        $docs['shapes']['String']['refs']['CreateDBInstanceReadReplicaMessage$DestinationRegion']
            = '<div class="alert alert-info">The SDK will populate this '
            . 'parameter on your behalf using the configured region value of '
            . 'the client.</div>';

        if ($api['metadata']['apiVersion'] != '2014-09-01') {
            $api['shapes']['CopyDBClusterSnapshotMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];
            $api['shapes']['CreateDBClusterMessage']['members']['SourceRegion'] = ['shape' => 'SourceRegion'];

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CopyDBClusterSnapshotMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';

            // Several parameters in presign APIs are optional.
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$PreSignedUrl']
                = '<div class="alert alert-info">The SDK will compute this value '
                . 'for you on your behalf.</div>';
            $docs['shapes']['String']['refs']['CreateDBClusterMessage$DestinationRegion']
                = '<div class="alert alert-info">The SDK will populate this '
                . 'parameter on your behalf using the configured region value of '
                . 'the client.</div>';
        }

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
