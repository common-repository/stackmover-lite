<?php
namespace WP2Aws\Health;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Health APIs and Notifications** service.
 * @method \WP2Aws\Result describeAffectedEntities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAffectedEntitiesAsync(array $args = [])
 * @method \WP2Aws\Result describeEntityAggregates(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEntityAggregatesAsync(array $args = [])
 * @method \WP2Aws\Result describeEventAggregates(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventAggregatesAsync(array $args = [])
 * @method \WP2Aws\Result describeEventDetails(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventDetailsAsync(array $args = [])
 * @method \WP2Aws\Result describeEventTypes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventTypesAsync(array $args = [])
 * @method \WP2Aws\Result describeEvents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEventsAsync(array $args = [])
 */
class HealthClient extends WP2AwsClient {}
