<?php
namespace WP2Aws\Rekognition;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Rekognition** service.
 * @method \WP2Aws\Result compareFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise compareFacesAsync(array $args = [])
 * @method \WP2Aws\Result createCollection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCollectionAsync(array $args = [])
 * @method \WP2Aws\Result deleteCollection(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCollectionAsync(array $args = [])
 * @method \WP2Aws\Result deleteFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteFacesAsync(array $args = [])
 * @method \WP2Aws\Result detectFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise detectFacesAsync(array $args = [])
 * @method \WP2Aws\Result detectLabels(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise detectLabelsAsync(array $args = [])
 * @method \WP2Aws\Result detectModerationLabels(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise detectModerationLabelsAsync(array $args = [])
 * @method \WP2Aws\Result getCelebrityInfo(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCelebrityInfoAsync(array $args = [])
 * @method \WP2Aws\Result indexFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise indexFacesAsync(array $args = [])
 * @method \WP2Aws\Result listCollections(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCollectionsAsync(array $args = [])
 * @method \WP2Aws\Result listFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listFacesAsync(array $args = [])
 * @method \WP2Aws\Result recognizeCelebrities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise recognizeCelebritiesAsync(array $args = [])
 * @method \WP2Aws\Result searchFaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise searchFacesAsync(array $args = [])
 * @method \WP2Aws\Result searchFacesByImage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise searchFacesByImageAsync(array $args = [])
 */
class RekognitionClient extends WP2AwsClient {}
