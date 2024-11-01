<?php
namespace WP2Aws\OpsWorksCM;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS OpsWorks for Chef Automate** service.
 * @method \WP2Aws\Result associateNode(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateNodeAsync(array $args = [])
 * @method \WP2Aws\Result createBackup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBackupAsync(array $args = [])
 * @method \WP2Aws\Result createServer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createServerAsync(array $args = [])
 * @method \WP2Aws\Result deleteBackup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBackupAsync(array $args = [])
 * @method \WP2Aws\Result deleteServer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteServerAsync(array $args = [])
 * @method \WP2Aws\Result describeAccountAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAccountAttributesAsync(array $args = [])
 * @method \WP2Aws\Result describeBackups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeBackupsAsync(array $args = [])
 * @method \WP2Aws\Result describeEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 * @method \WP2Aws\Result describeNodeAssociationStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeNodeAssociationStatusAsync(array $args = [])
 * @method \WP2Aws\Result describeServers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeServersAsync(array $args = [])
 * @method \WP2Aws\Result disassociateNode(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateNodeAsync(array $args = [])
 * @method \WP2Aws\Result restoreServer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise restoreServerAsync(array $args = [])
 * @method \WP2Aws\Result startMaintenance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startMaintenanceAsync(array $args = [])
 * @method \WP2Aws\Result updateServer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateServerAsync(array $args = [])
 * @method \WP2Aws\Result updateServerEngineAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateServerEngineAttributesAsync(array $args = [])
 */
class OpsWorksCMClient extends WP2AwsClient {}
