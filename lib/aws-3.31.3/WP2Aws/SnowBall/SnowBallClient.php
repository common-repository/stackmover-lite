<?php
namespace WP2Aws\SnowBall;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Import/Export Snowball** service.
 * @method \WP2Aws\Result cancelCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelClusterAsync(array $args = [])
 * @method \WP2Aws\Result cancelJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \WP2Aws\Result createAddress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createAddressAsync(array $args = [])
 * @method \WP2Aws\Result createCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createClusterAsync(array $args = [])
 * @method \WP2Aws\Result createJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \WP2Aws\Result describeAddress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAddressAsync(array $args = [])
 * @method \WP2Aws\Result describeAddresses(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAddressesAsync(array $args = [])
 * @method \WP2Aws\Result describeCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeClusterAsync(array $args = [])
 * @method \WP2Aws\Result describeJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeJobAsync(array $args = [])
 * @method \WP2Aws\Result getJobManifest(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getJobManifestAsync(array $args = [])
 * @method \WP2Aws\Result getJobUnlockCode(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getJobUnlockCodeAsync(array $args = [])
 * @method \WP2Aws\Result getSnowballUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSnowballUsageAsync(array $args = [])
 * @method \WP2Aws\Result listClusterJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listClusterJobsAsync(array $args = [])
 * @method \WP2Aws\Result listClusters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listClustersAsync(array $args = [])
 * @method \WP2Aws\Result listJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \WP2Aws\Result updateCluster(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateClusterAsync(array $args = [])
 * @method \WP2Aws\Result updateJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 */
class SnowBallClient extends WP2AwsClient {}
