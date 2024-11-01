<?php
namespace WP2Aws\DataPipeline;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Data Pipeline** service.
 *
 * @method \WP2Aws\Result activatePipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise activatePipelineAsync(array $args = [])
 * @method \WP2Aws\Result addTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \WP2Aws\Result createPipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @method \WP2Aws\Result deactivatePipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deactivatePipelineAsync(array $args = [])
 * @method \WP2Aws\Result deletePipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @method \WP2Aws\Result describeObjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeObjectsAsync(array $args = [])
 * @method \WP2Aws\Result describePipelines(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describePipelinesAsync(array $args = [])
 * @method \WP2Aws\Result evaluateExpression(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise evaluateExpressionAsync(array $args = [])
 * @method \WP2Aws\Result getPipelineDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getPipelineDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result listPipelines(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @method \WP2Aws\Result pollForTask(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise pollForTaskAsync(array $args = [])
 * @method \WP2Aws\Result putPipelineDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putPipelineDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result queryObjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise queryObjectsAsync(array $args = [])
 * @method \WP2Aws\Result removeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \WP2Aws\Result reportTaskProgress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise reportTaskProgressAsync(array $args = [])
 * @method \WP2Aws\Result reportTaskRunnerHeartbeat(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise reportTaskRunnerHeartbeatAsync(array $args = [])
 * @method \WP2Aws\Result setStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setStatusAsync(array $args = [])
 * @method \WP2Aws\Result setTaskStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setTaskStatusAsync(array $args = [])
 * @method \WP2Aws\Result validatePipelineDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise validatePipelineDefinitionAsync(array $args = [])
 */
class DataPipelineClient extends WP2AwsClient {}
