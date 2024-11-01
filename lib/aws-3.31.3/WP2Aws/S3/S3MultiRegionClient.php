<?php
namespace WP2Aws\S3;

use WP2Aws\CacheInterface;
use WP2Aws\CommandInterface;
use WP2Aws\LruArrayCache;
use WP2Aws\MultiRegionClient as BaseClient;
use WP2Aws\S3\Exception\PermanentRedirectException;
use WP2GuzzleHttp\Promise;

/**
 * **Amazon Simple Storage Service** multi-region client.
 *
 * @method \WP2Aws\Result abortMultipartUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise abortMultipartUploadAsync(array $args = [])
 * @method \WP2Aws\Result completeMultipartUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise completeMultipartUploadAsync(array $args = [])
 * @method \WP2Aws\Result copyObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise copyObjectAsync(array $args = [])
 * @method \WP2Aws\Result createBucket(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBucketAsync(array $args = [])
 * @method \WP2Aws\Result createMultipartUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createMultipartUploadAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucket(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketAnalyticsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketCors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketCorsAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketInventoryConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketInventoryConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketLifecycle(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketLifecycleAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketMetricsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketMetricsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketPolicyAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketReplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketReplicationAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketTaggingAsync(array $args = [])
 * @method \WP2Aws\Result deleteBucketWebsite(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBucketWebsiteAsync(array $args = [])
 * @method \WP2Aws\Result deleteObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteObjectAsync(array $args = [])
 * @method \WP2Aws\Result deleteObjectTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteObjectTaggingAsync(array $args = [])
 * @method \WP2Aws\Result deleteObjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteObjectsAsync(array $args = [])
 * @method \WP2Aws\Result getBucketAccelerateConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketAccelerateConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketAcl(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketAclAsync(array $args = [])
 * @method \WP2Aws\Result getBucketAnalyticsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketCors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketCorsAsync(array $args = [])
 * @method \WP2Aws\Result getBucketInventoryConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketInventoryConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketLifecycle(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketLifecycleAsync(array $args = [])
 * @method \WP2Aws\Result getBucketLifecycleConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketLifecycleConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketLocation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketLocationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketLogging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketLoggingAsync(array $args = [])
 * @method \WP2Aws\Result getBucketMetricsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketMetricsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketNotificationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketNotificationConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketNotificationConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketPolicyAsync(array $args = [])
 * @method \WP2Aws\Result getBucketReplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketReplicationAsync(array $args = [])
 * @method \WP2Aws\Result getBucketRequestPayment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketRequestPaymentAsync(array $args = [])
 * @method \WP2Aws\Result getBucketTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketTaggingAsync(array $args = [])
 * @method \WP2Aws\Result getBucketVersioning(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketVersioningAsync(array $args = [])
 * @method \WP2Aws\Result getBucketWebsite(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBucketWebsiteAsync(array $args = [])
 * @method \WP2Aws\Result getObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getObjectAsync(array $args = [])
 * @method \WP2Aws\Result getObjectAcl(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getObjectAclAsync(array $args = [])
 * @method \WP2Aws\Result getObjectTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getObjectTaggingAsync(array $args = [])
 * @method \WP2Aws\Result getObjectTorrent(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getObjectTorrentAsync(array $args = [])
 * @method \WP2Aws\Result headBucket(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise headBucketAsync(array $args = [])
 * @method \WP2Aws\Result headObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise headObjectAsync(array $args = [])
 * @method \WP2Aws\Result listBucketAnalyticsConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBucketAnalyticsConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result listBucketInventoryConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBucketInventoryConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result listBucketMetricsConfigurations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBucketMetricsConfigurationsAsync(array $args = [])
 * @method \WP2Aws\Result listBuckets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBucketsAsync(array $args = [])
 * @method \WP2Aws\Result listMultipartUploads(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listMultipartUploadsAsync(array $args = [])
 * @method \WP2Aws\Result listObjectVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listObjectVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listObjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listObjectsAsync(array $args = [])
 * @method \WP2Aws\Result listObjectsV2(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listObjectsV2Async(array $args = [])
 * @method \WP2Aws\Result listParts(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listPartsAsync(array $args = [])
 * @method \WP2Aws\Result putBucketAccelerateConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketAccelerateConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketAcl(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketAclAsync(array $args = [])
 * @method \WP2Aws\Result putBucketAnalyticsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketAnalyticsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketCors(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketCorsAsync(array $args = [])
 * @method \WP2Aws\Result putBucketInventoryConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketInventoryConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketLifecycle(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketLifecycleAsync(array $args = [])
 * @method \WP2Aws\Result putBucketLifecycleConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketLifecycleConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketLogging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketLoggingAsync(array $args = [])
 * @method \WP2Aws\Result putBucketMetricsConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketMetricsConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketNotificationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketNotificationConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketNotificationConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketPolicyAsync(array $args = [])
 * @method \WP2Aws\Result putBucketReplication(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketReplicationAsync(array $args = [])
 * @method \WP2Aws\Result putBucketRequestPayment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketRequestPaymentAsync(array $args = [])
 * @method \WP2Aws\Result putBucketTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketTaggingAsync(array $args = [])
 * @method \WP2Aws\Result putBucketVersioning(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketVersioningAsync(array $args = [])
 * @method \WP2Aws\Result putBucketWebsite(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBucketWebsiteAsync(array $args = [])
 * @method \WP2Aws\Result putObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putObjectAsync(array $args = [])
 * @method \WP2Aws\Result putObjectAcl(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putObjectAclAsync(array $args = [])
 * @method \WP2Aws\Result putObjectTagging(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putObjectTaggingAsync(array $args = [])
 * @method \WP2Aws\Result restoreObject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise restoreObjectAsync(array $args = [])
 * @method \WP2Aws\Result uploadPart(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise uploadPartAsync(array $args = [])
 * @method \WP2Aws\Result uploadPartCopy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise uploadPartCopyAsync(array $args = [])
 */
class S3MultiRegionClient extends BaseClient implements S3ClientInterface
{
    use S3ClientTrait;

    /** @var CacheInterface */
    private $cache;

    public static function getArguments()
    {
        $args = parent::getArguments();
        $regionDef = $args['region'] + ['default' => function (array &$args) {
            $availableRegions = array_keys($args['partition']['regions']);
            return end($availableRegions);
        }];
        unset($args['region']);

        return $args + [
            'bucket_region_cache' => [
                'type' => 'config',
                'valid' => [CacheInterface::class],
                'doc' => 'Cache of regions in which given buckets are located.',
                'default' => function () { return new LruArrayCache; },
            ],
            'region' => $regionDef,
        ];
    }

    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->cache = $this->getConfig('bucket_region_cache');

        $this->getHandlerList()->prependInit(
            $this->determineRegionMiddleware(),
            'determine_region'
        );
    }

    private function determineRegionMiddleware() {
        return function (callable $handler) {
            return function (CommandInterface $command) use ($handler) {
                $cacheKey = $this->getCacheKey($command['Bucket']);
                if (
                    empty($command['@region']) &&
                    $region = $this->cache->get($cacheKey)
                ) {
                    $command['@region'] = $region;
                }

                return Promise\coroutine(function () use (
                    $handler,
                    $command,
                    $cacheKey
                ) {
                    try {
                        yield $handler($command);
                    } catch (PermanentRedirectException $e) {
                        if (empty($command['Bucket'])) {
                            throw $e;
                        }
                        $result = $e->getResult();
                        $region = null;
                        if (isset($result['@metadata']['headers']['x-amz-bucket-region'])) {
                            $region = $result['@metadata']['headers']['x-amz-bucket-region'];
                        } else {
                            /** @var S3ClientInterface $client */
                            $client = $this->getClientFromPool();
                            $region = (yield $client->determineBucketRegionAsync(
                                $command['Bucket']
                            ));
                        }

                        $this->cache->set($cacheKey, $region);
                        $command['@region'] = $region;
                        yield $handler($command);
                    }
                });
            };
        };
    }

    public function createPresignedRequest(CommandInterface $command, $expires)
    {
        if (empty($command['Bucket'])) {
            throw new \InvalidArgumentException('The S3\\MultiRegionClient'
                . ' cannot create presigned requests for commands without a'
                . ' specified bucket.');
        }

        /** @var S3ClientInterface $client */
        $client = $this->getClientFromPool(
            $this->determineBucketRegion($command['Bucket'])
        );
        return $client->createPresignedRequest(
            $client->getCommand($command->getName(), $command->toArray()),
            $expires
        );
    }

    public function getObjectUrl($bucket, $key)
    {
        /** @var S3Client $regionalClient */
        $regionalClient = $this->getClientFromPool(
            $this->determineBucketRegion($bucket)
        );

        return $regionalClient->getObjectUrl($bucket, $key);
    }

    public function determineBucketRegionAsync($bucketName)
    {
        $cacheKey = $this->getCacheKey($bucketName);
        if ($cached = $this->cache->get($cacheKey)) {
            return Promise\promise_for($cached);
        }

        /** @var S3ClientInterface $regionalClient */
        $regionalClient = $this->getClientFromPool();
        return $regionalClient->determineBucketRegionAsync($bucketName)
            ->then(function ($region) use ($cacheKey) {
                $this->cache->set($cacheKey, $region);

                return $region;
            });
    }

    private function getCacheKey($bucketName)
    {
        return "aws:s3:{$bucketName}:location";
    }
}
