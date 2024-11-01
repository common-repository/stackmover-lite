<?php
namespace WP2Aws\ElasticTranscoder;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Elastic Transcoder** service.
 *
 * @method \WP2Aws\Result cancelJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cancelJobAsync(array $args = [])
 * @method \WP2Aws\Result createJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createJobAsync(array $args = [])
 * @method \WP2Aws\Result createPipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createPipelineAsync(array $args = [])
 * @method \WP2Aws\Result createPreset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createPresetAsync(array $args = [])
 * @method \WP2Aws\Result deletePipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deletePipelineAsync(array $args = [])
 * @method \WP2Aws\Result deletePreset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deletePresetAsync(array $args = [])
 * @method \WP2Aws\Result listJobsByPipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsByPipelineAsync(array $args = [])
 * @method \WP2Aws\Result listJobsByStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsByStatusAsync(array $args = [])
 * @method \WP2Aws\Result listPipelines(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listPipelinesAsync(array $args = [])
 * @method \WP2Aws\Result listPresets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listPresetsAsync(array $args = [])
 * @method \WP2Aws\Result readJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise readJobAsync(array $args = [])
 * @method \WP2Aws\Result readPipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise readPipelineAsync(array $args = [])
 * @method \WP2Aws\Result readPreset(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise readPresetAsync(array $args = [])
 * @method \WP2Aws\Result testRole(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise testRoleAsync(array $args = [])
 * @method \WP2Aws\Result updatePipeline(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updatePipelineAsync(array $args = [])
 * @method \WP2Aws\Result updatePipelineNotifications(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updatePipelineNotificationsAsync(array $args = [])
 * @method \WP2Aws\Result updatePipelineStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updatePipelineStatusAsync(array $args = [])
 */
class ElasticTranscoderClient extends WP2AwsClient {}
