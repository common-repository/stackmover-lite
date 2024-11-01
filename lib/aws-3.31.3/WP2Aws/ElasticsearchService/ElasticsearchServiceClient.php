<?php
namespace WP2Aws\ElasticsearchService;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Elasticsearch Service** service.
 *
 * @method \WP2Aws\Result addTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \WP2Aws\Result createElasticsearchDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createElasticsearchDomainAsync(array $args = [])
 * @method \WP2Aws\Result deleteElasticsearchDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteElasticsearchDomainAsync(array $args = [])
 * @method \WP2Aws\Result describeElasticsearchDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeElasticsearchDomainAsync(array $args = [])
 * @method \WP2Aws\Result describeElasticsearchDomainConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeElasticsearchDomainConfigAsync(array $args = [])
 * @method \WP2Aws\Result describeElasticsearchDomains(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeElasticsearchDomainsAsync(array $args = [])
 * @method \WP2Aws\Result describeElasticsearchInstanceTypeLimits(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeElasticsearchInstanceTypeLimitsAsync(array $args = [])
 * @method \WP2Aws\Result listDomainNames(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDomainNamesAsync(array $args = [])
 * @method \WP2Aws\Result listElasticsearchInstanceTypes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listElasticsearchInstanceTypesAsync(array $args = [])
 * @method \WP2Aws\Result listElasticsearchVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listElasticsearchVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \WP2Aws\Result removeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsAsync(array $args = [])
 * @method \WP2Aws\Result updateElasticsearchDomainConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateElasticsearchDomainConfigAsync(array $args = [])
 */
class ElasticsearchServiceClient extends WP2AwsClient {}
