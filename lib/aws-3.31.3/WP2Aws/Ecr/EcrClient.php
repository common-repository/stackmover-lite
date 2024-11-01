<?php
namespace WP2Aws\Ecr;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon EC2 Container Registry** service.
 *
 * @method \WP2Aws\Result batchCheckLayerAvailability(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchCheckLayerAvailabilityAsync(array $args = [])
 * @method \WP2Aws\Result batchDeleteImage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchDeleteImageAsync(array $args = [])
 * @method \WP2Aws\Result batchGetImage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetImageAsync(array $args = [])
 * @method \WP2Aws\Result completeLayerUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise completeLayerUploadAsync(array $args = [])
 * @method \WP2Aws\Result createRepository(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @method \WP2Aws\Result deleteRepository(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @method \WP2Aws\Result deleteRepositoryPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRepositoryPolicyAsync(array $args = [])
 * @method \WP2Aws\Result describeImages(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @method \WP2Aws\Result describeRepositories(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeRepositoriesAsync(array $args = [])
 * @method \WP2Aws\Result getAuthorizationToken(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getAuthorizationTokenAsync(array $args = [])
 * @method \WP2Aws\Result getDownloadUrlForLayer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDownloadUrlForLayerAsync(array $args = [])
 * @method \WP2Aws\Result getRepositoryPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRepositoryPolicyAsync(array $args = [])
 * @method \WP2Aws\Result initiateLayerUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise initiateLayerUploadAsync(array $args = [])
 * @method \WP2Aws\Result listImages(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listImagesAsync(array $args = [])
 * @method \WP2Aws\Result putImage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putImageAsync(array $args = [])
 * @method \WP2Aws\Result setRepositoryPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setRepositoryPolicyAsync(array $args = [])
 * @method \WP2Aws\Result uploadLayerPart(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise uploadLayerPartAsync(array $args = [])
 */
class EcrClient extends WP2AwsClient {}
