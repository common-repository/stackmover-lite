<?php
namespace WP2Aws\Appstream;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon AppStream** service.
 * @method \WP2Aws\Result associateFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateFleetAsync(array $args = [])
 * @method \WP2Aws\Result createFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createFleetAsync(array $args = [])
 * @method \WP2Aws\Result createStack(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createStackAsync(array $args = [])
 * @method \WP2Aws\Result createStreamingURL(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createStreamingURLAsync(array $args = [])
 * @method \WP2Aws\Result deleteFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteFleetAsync(array $args = [])
 * @method \WP2Aws\Result deleteStack(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteStackAsync(array $args = [])
 * @method \WP2Aws\Result describeFleets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeFleetsAsync(array $args = [])
 * @method \WP2Aws\Result describeImages(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeImagesAsync(array $args = [])
 * @method \WP2Aws\Result describeSessions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSessionsAsync(array $args = [])
 * @method \WP2Aws\Result describeStacks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeStacksAsync(array $args = [])
 * @method \WP2Aws\Result disassociateFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateFleetAsync(array $args = [])
 * @method \WP2Aws\Result expireSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise expireSessionAsync(array $args = [])
 * @method \WP2Aws\Result listAssociatedFleets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAssociatedFleetsAsync(array $args = [])
 * @method \WP2Aws\Result listAssociatedStacks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAssociatedStacksAsync(array $args = [])
 * @method \WP2Aws\Result startFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startFleetAsync(array $args = [])
 * @method \WP2Aws\Result stopFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopFleetAsync(array $args = [])
 * @method \WP2Aws\Result updateFleet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateFleetAsync(array $args = [])
 * @method \WP2Aws\Result updateStack(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateStackAsync(array $args = [])
 */
class AppstreamClient extends WP2AwsClient {}
