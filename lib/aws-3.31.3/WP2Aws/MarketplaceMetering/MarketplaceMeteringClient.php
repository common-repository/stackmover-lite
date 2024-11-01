<?php
namespace WP2Aws\MarketplaceMetering;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWSMarketplace Metering** service.
 * @method \WP2Aws\Result batchMeterUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchMeterUsageAsync(array $args = [])
 * @method \WP2Aws\Result meterUsage(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise meterUsageAsync(array $args = [])
 * @method \WP2Aws\Result resolveCustomer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resolveCustomerAsync(array $args = [])
 */
class MarketplaceMeteringClient extends WP2AwsClient {}
