<?php
namespace WP2Aws\Batch;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Batch** service.
 * @method \WP2Aws\Result cancelJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \WP2Aws\Result createComputeEnvironment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createComputeEnvironmentAsync(array $args = [])
 * @method \WP2Aws\Result createJobQueue(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createJobQueueAsync(array $args = [])
 * @method \WP2Aws\Result deleteComputeEnvironment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteComputeEnvironmentAsync(array $args = [])
 * @method \WP2Aws\Result deleteJobQueue(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteJobQueueAsync(array $args = [])
 * @method \WP2Aws\Result deregisterJobDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deregisterJobDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result describeComputeEnvironments(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeComputeEnvironmentsAsync(array $args = [])
 * @method \WP2Aws\Result describeJobDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeJobDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result describeJobQueues(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeJobQueuesAsync(array $args = [])
 * @method \WP2Aws\Result describeJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeJobsAsync(array $args = [])
 * @method \WP2Aws\Result listJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \WP2Aws\Result registerJobDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise registerJobDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result submitJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise submitJobAsync(array $args = [])
 * @method \WP2Aws\Result terminateJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise terminateJobAsync(array $args = [])
 * @method \WP2Aws\Result updateComputeEnvironment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateComputeEnvironmentAsync(array $args = [])
 * @method \WP2Aws\Result updateJobQueue(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateJobQueueAsync(array $args = [])
 */
class BatchClient extends WP2AwsClient {}
