<?php
namespace WP2Aws\IotDataPlane;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS IoT Data Plane** service.
 *
 * @method \WP2Aws\Result deleteThingShadow(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteThingShadowAsync(array $args = [])
 * @method \WP2Aws\Result getThingShadow(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getThingShadowAsync(array $args = [])
 * @method \WP2Aws\Result publish(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise publishAsync(array $args = [])
 * @method \WP2Aws\Result updateThingShadow(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateThingShadowAsync(array $args = [])
 */
class IotDataPlaneClient extends WP2AwsClient {}
