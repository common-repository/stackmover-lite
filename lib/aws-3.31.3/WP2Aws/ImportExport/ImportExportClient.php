<?php
namespace WP2Aws\ImportExport;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Import/Export** service.
 * @method \WP2Aws\Result cancelJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \WP2Aws\Result createJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \WP2Aws\Result getShippingLabel(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getShippingLabelAsync(array $args = [])
 * @method \WP2Aws\Result getStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getStatusAsync(array $args = [])
 * @method \WP2Aws\Result listJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \WP2Aws\Result updateJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateJobAsync(array $args = [])
 */
class ImportExportClient extends WP2AwsClient {}
