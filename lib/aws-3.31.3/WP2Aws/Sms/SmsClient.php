<?php
namespace WP2Aws\Sms;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Server Migration Service** service.
 * @method \WP2Aws\Result createReplicationJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReplicationJobAsync(array $args = [])
 * @method \WP2Aws\Result deleteReplicationJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReplicationJobAsync(array $args = [])
 * @method \WP2Aws\Result deleteServerCatalog(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteServerCatalogAsync(array $args = [])
 * @method \WP2Aws\Result disassociateConnector(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateConnectorAsync(array $args = [])
 * @method \WP2Aws\Result getConnectors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getConnectorsAsync(array $args = [])
 * @method \WP2Aws\Result getReplicationJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getReplicationJobsAsync(array $args = [])
 * @method \WP2Aws\Result getReplicationRuns(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getReplicationRunsAsync(array $args = [])
 * @method \WP2Aws\Result getServers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getServersAsync(array $args = [])
 * @method \WP2Aws\Result importServerCatalog(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise importServerCatalogAsync(array $args = [])
 * @method \WP2Aws\Result startOnDemandReplicationRun(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startOnDemandReplicationRunAsync(array $args = [])
 * @method \WP2Aws\Result updateReplicationJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateReplicationJobAsync(array $args = [])
 */
class SmsClient extends WP2AwsClient {}
