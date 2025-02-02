<?php
namespace WP2Aws\S3;

use WP2Aws\Api\ApiProvider;
use WP2Aws\Api\DocModel;
use WP2Aws\Api\Service;
use WP2Aws\WP2AwsClient;
use WP2Aws\ClientResolver;
use WP2Aws\Command;
use WP2Aws\Exception\WP2AwsException;
use WP2Aws\HandlerList;
use WP2Aws\Middleware;
use WP2Aws\RetryMiddleware;
use WP2Aws\ResultInterface;
use WP2Aws\CommandInterface;
use WP2GuzzleHttp\Exception\RequestException;
use WP2GuzzleHttp\Promise;
use WP2GuzzleHttp\Psr7;
use Psr\Http\Message\RequestInterface;

/**
 * Client used to interact with **Amazon Simple Storage Service (Amazon S3)**.
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
class S3Client extends WP2AwsClient implements S3ClientInterface
{
    use S3ClientTrait;

    public static function getArguments()
    {
        $args = parent::getArguments();
        $args['retries']['fn'] = [__CLASS__, '_applyRetryConfig'];
        $args['api_provider']['fn'] = [__CLASS__, '_applyApiProvider'];

        return $args + [
            'bucket_endpoint' => [
                'type'    => 'config',
                'valid'   => ['bool'],
                'doc'     => 'Set to true to send requests to a hardcoded '
                    . 'bucket endpoint rather than create an endpoint as a '
                    . 'result of injecting the bucket into the URL. This '
                    . 'option is useful for interacting with CNAME endpoints.',
            ],
            'use_accelerate_endpoint' => [
                'type' => 'config',
                'valid' => ['bool'],
                'doc' => 'Set to true to send requests to an S3 Accelerate'
                    . ' endpoint by default. Can be enabled or disabled on'
                    . ' individual operations by setting'
                    . ' \'@use_accelerate_endpoint\' to true or false. Note:'
                    . ' you must enable S3 Accelerate on a bucket before it can'
                    . ' be accessed via an Accelerate endpoint.',
                'default' => false,
            ],
            'use_dual_stack_endpoint' => [
                'type' => 'config',
                'valid' => ['bool'],
                'doc' => 'Set to true to send requests to an S3 Dual Stack'
                    . ' endpoint by default, which enables IPv6 Protocol.'
                    . ' Can be enabled or disabled on individual operations by setting'
                    . ' \'@use_dual_stack_endpoint\' to true or false.',
                'default' => false,
            ],
            'use_path_style_endpoint' => [
                'type' => 'config',
                'valid' => ['bool'],
                'doc' => 'Set to true to send requests to an S3 path style'
                    . ' endpoint by default.'
                    . ' Can be enabled or disabled on individual operations by setting'
                    . ' \'@use_path_style_endpoint\' to true or false.',
                'default' => false,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     *
     * In addition to the options available to
     * {@see WP2Aws\WP2AwsClient::__construct}, S3Client accepts the following
     * options:
     *
     * - bucket_endpoint: (bool) Set to true to send requests to a
     *   hardcoded bucket endpoint rather than create an endpoint as a result
     *   of injecting the bucket into the URL. This option is useful for
     *   interacting with CNAME endpoints.
     * - calculate_md5: (bool) Set to false to disable calculating an MD5
     *   for all Amazon S3 signed uploads.
     * - use_accelerate_endpoint: (bool) Set to true to send requests to an S3
     *   Accelerate endpoint by default. Can be enabled or disabled on
     *   individual operations by setting '@use_accelerate_endpoint' to true or
     *   false. Note: you must enable S3 Accelerate on a bucket before it can be
     *   accessed via an Accelerate endpoint.
     * - use_dual_stack_endpoint: (bool) Set to true to send requests to an S3
     *   Dual Stack endpoint by default, which enables IPv6 Protocol.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_dual_stack_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     * - use_path_style_endpoint: (bool) Set to true to send requests to an S3
     *   path style endpoint by default.
     *   Can be enabled or disabled on individual operations by setting
     *   '@use_path_style_endpoint\' to true or false. Note:
     *   you cannot use it together with an accelerate endpoint.
     *
     * @param array $args
     */
    public function __construct(array $args)
    {
        parent::__construct($args);
        $stack = $this->getHandlerList();
        $stack->appendInit(SSECMiddleware::wrap($this->getEndpoint()->getScheme()), 's3.ssec');
        $stack->appendBuild(ApplyChecksumMiddleware::wrap(), 's3.checksum');
        $stack->appendBuild(
            Middleware::contentType(['PutObject', 'UploadPart']),
            's3.content_type'
        );


        // Use the bucket style middleware when using a "bucket_endpoint" (for cnames)
        if ($this->getConfig('bucket_endpoint')) {
            $stack->appendBuild(BucketEndpointMiddleware::wrap(), 's3.bucket_endpoint');
        } else {
            $stack->appendBuild(
                S3EndpointMiddleware::wrap(
                    $this->getRegion(),
                    [
                        'dual_stack' => $this->getConfig('use_dual_stack_endpoint'),
                        'accelerate' => $this->getConfig('use_accelerate_endpoint'),
                        'path_style' => $this->getConfig('use_path_style_endpoint')
                    ]
                ),
                's3.endpoint_middleware'
            );
        }

        $stack->appendSign(PutObjectUrlMiddleware::wrap(), 's3.put_object_url');
        $stack->appendSign(PermanentRedirectMiddleware::wrap(), 's3.permanent_redirect');
        $stack->appendInit(Middleware::sourceFile($this->getApi()), 's3.source_file');
        $stack->appendInit($this->getSaveAsParameter(), 's3.save_as');
        $stack->appendInit($this->getLocationConstraintMiddleware(), 's3.location');
        $stack->appendInit($this->getEncodingTypeMiddleware(), 's3.auto_encode');
        $stack->appendInit($this->getHeadObjectMiddleware(), 's3.head_object');
    }

    /**
     * Determine if a string is a valid name for a DNS compatible Amazon S3
     * bucket.
     *
     * DNS compatible bucket names can be used as a subdomain in a URL (e.g.,
     * "<bucket>.s3.amazonaws.com").
     *
     * @param string $bucket Bucket name to check.
     *
     * @return bool
     */
    public static function isBucketDnsCompatible($bucket)
    {
        $bucketLen = strlen($bucket);

        return ($bucketLen >= 3 && $bucketLen <= 63) &&
            // Cannot look like an IP address
            !filter_var($bucket, FILTER_VALIDATE_IP) &&
            preg_match('/^[a-z0-9]([a-z0-9\-\.]*[a-z0-9])?$/', $bucket);
    }

    public function createPresignedRequest(CommandInterface $command, $expires)
    {
        $command = clone $command;
        $command->getHandlerList()->remove('signer');

        /** @var \WP2Aws\Signature\SignatureInterface $signer */
        $signer = call_user_func(
            $this->getSignatureProvider(),
            $this->getConfig('signature_version'),
            $this->getConfig('signing_name'),
            $this->getConfig('signing_region')
        );

        return $signer->presign(
            \WP2Aws\serialize($command),
            $this->getCredentials()->wait(),
            $expires
        );
    }

    public function getObjectUrl($bucket, $key)
    {
        $command = $this->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key'    => $key
        ]);

        return (string) \WP2Aws\serialize($command)->getUri();
    }

    /**
     * Raw URL encode a key and allow for '/' characters
     *
     * @param string $key Key to encode
     *
     * @return string Returns the encoded key
     */
    public static function encodeKey($key)
    {
        return str_replace('%2F', '/', rawurlencode($key));
    }

    /**
     * Provides a middleware that removes the need to specify LocationConstraint on CreateBucket.
     *
     * @return \Closure
     */
    private function getLocationConstraintMiddleware()
    {
        $region = $this->getRegion();
        return static function (callable $handler) use ($region) {
            return function (Command $command, $request = null) use ($handler, $region) {
                if ($command->getName() === 'CreateBucket') {
                    $locationConstraint = isset($command['CreateBucketConfiguration']['LocationConstraint'])
                        ? $command['CreateBucketConfiguration']['LocationConstraint']
                        : null;

                    if ($locationConstraint === 'us-east-1') {
                        unset($command['CreateBucketConfiguration']);
                    } elseif ('us-east-1' !== $region && empty($locationConstraint)) {
                        $command['CreateBucketConfiguration'] = ['LocationConstraint' => $region];
                    }
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that supports the `SaveAs` parameter.
     *
     * @return \Closure
     */
    private function getSaveAsParameter()
    {
        return static function (callable $handler) {
            return function (Command $command, $request = null) use ($handler) {
                if ($command->getName() === 'GetObject' && isset($command['SaveAs'])) {
                    $command['@http']['sink'] = $command['SaveAs'];
                    unset($command['SaveAs']);
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that disables content decoding on HeadObject
     * commands.
     *
     * @return \Closure
     */
    private function getHeadObjectMiddleware()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $command,
                RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'HeadObject'
                    && !isset($command['@http']['decode_content'])
                ) {
                    $command['@http']['decode_content'] = false;
                }

                return $handler($command, $request);
            };
        };
    }

    /**
     * Provides a middleware that autopopulates the EncodingType parameter on
     * ListObjects commands.
     *
     * @return \Closure
     */
    private function getEncodingTypeMiddleware()
    {
        return static function (callable $handler) {
            return function (Command $command, $request = null) use ($handler) {
                $autoSet = false;
                if ($command->getName() === 'ListObjects'
                    && empty($command['EncodingType'])
                ) {
                    $command['EncodingType'] = 'url';
                    $autoSet = true;
                }

                return $handler($command, $request)
                    ->then(function (ResultInterface $result) use ($autoSet) {
                        if ($result['EncodingType'] === 'url' && $autoSet) {
                            static $topLevel = [
                                'Delimiter',
                                'Marker',
                                'NextMarker',
                                'Prefix',
                            ];
                            static $nested = [
                                ['Contents', 'Key'],
                                ['CommonPrefixes', 'Prefix'],
                            ];

                            foreach ($topLevel as $key) {
                                if (isset($result[$key])) {
                                    $result[$key] = urldecode($result[$key]);
                                }
                            }
                            foreach ($nested as $steps) {
                                if (isset($result[$steps[0]])) {
                                    foreach ($result[$steps[0]] as $key => $part) {
                                        if (isset($part[$steps[1]])) {
                                            $result[$steps[0]][$key][$steps[1]]
                                                = urldecode($part[$steps[1]]);
                                        }
                                    }
                                }
                            }

                        }

                        return $result;
                    });
            };
        };
    }

    /** @internal */
    public static function _applyRetryConfig($value, $_, HandlerList $list)
    {
        if (!$value) {
            return;
        }

        $decider = RetryMiddleware::createDefaultDecider($value);
        $decider = function ($retries, $command, $request, $result, $error) use ($decider, $value) {
            $maxRetries = null !== $command['@retries']
                ? $command['@retries']
                : $value;

            if ($decider($retries, $command, $request, $result, $error)) {
                return true;
            } elseif ($error instanceof WP2AwsException
                && $retries < $maxRetries
            ) {
                if (
                    $error->getResponse()
                    && $error->getResponse()->getStatusCode() >= 400
                ) {
                    return strpos(
                        $error->getResponse()->getBody(),
                        'Your socket connection to the server'
                    ) !== false;
                } elseif ($error->getPrevious() instanceof RequestException) {
                    // All commands except CompleteMultipartUpload are
                    // idempotent and may be retried without worry if a
                    // networking error has occurred.
                    return $command->getName() !== 'CompleteMultipartUpload';
                }
            }
            return false;
        };

        $delay = [RetryMiddleware::class, 'exponentialDelay'];
        $list->appendSign(Middleware::retry($decider, $delay), 'retry');
    }

    /** @internal */
    public static function _applyApiProvider($value, array &$args, HandlerList $list)
    {
        ClientResolver::_apply_api_provider($value, $args, $list);
        $args['parser'] = new GetBucketLocationParser(
            new AmbiguousSuccessParser(
                new RetryableMalformedResponseParser(
                    $args['parser'],
                    $args['exception_class']
                ),
                $args['error_parser'],
                $args['exception_class']
            )
        );
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        $b64 = '<div class="alert alert-info">This value will be base64 encoded on your behalf.</div>';
        $opt = '<div class="alert alert-info">This value will be computed for you it is not supplied.</div>';

        // Add the SourceFile parameter.
        $docs['shapes']['SourceFile']['base'] = 'The path to a file on disk to use instead of the Body parameter.';
        $api['shapes']['SourceFile'] = ['type' => 'string'];
        $api['shapes']['PutObjectRequest']['members']['SourceFile'] = ['shape' => 'SourceFile'];
        $api['shapes']['UploadPartRequest']['members']['SourceFile'] = ['shape' => 'SourceFile'];

        // Add the ContentSHA256 parameter.
        $docs['shapes']['ContentSHA256']['base'] = 'A SHA256 hash of the body content of the request.';
        $api['shapes']['ContentSHA256'] = ['type' => 'string'];
        $api['shapes']['PutObjectRequest']['members']['ContentSHA256'] = ['shape' => 'ContentSHA256'];
        $api['shapes']['UploadPartRequest']['members']['ContentSHA256'] = ['shape' => 'ContentSHA256'];
        unset($api['shapes']['PutObjectRequest']['members']['ContentMD5']);
        unset($api['shapes']['UploadPartRequest']['members']['ContentMD5']);
        $docs['shapes']['ContentSHA256']['append'] = $opt;

        // Add the SaveAs parameter.
        $docs['shapes']['SaveAs']['base'] = 'The path to a file on disk to save the object data.';
        $api['shapes']['SaveAs'] = ['type' => 'string'];
        $api['shapes']['GetObjectRequest']['members']['SaveAs'] = ['shape' => 'SaveAs'];

        // Several SSECustomerKey documentation updates.
        $docs['shapes']['SSECustomerKey']['append'] = $b64;
        $docs['shapes']['CopySourceSSECustomerKey']['append'] = $b64;
        $docs['shapes']['SSECustomerKeyMd5']['append'] = $opt;

        // Add the ObjectURL to various output shapes and documentation.
        $docs['shapes']['ObjectURL']['base'] = 'The URI of the created object.';
        $api['shapes']['ObjectURL'] = ['type' => 'string'];
        $api['shapes']['PutObjectOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];
        $api['shapes']['CopyObjectOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];
        $api['shapes']['CompleteMultipartUploadOutput']['members']['ObjectURL'] = ['shape' => 'ObjectURL'];

        // Fix references to Location Constraint.
        unset($api['shapes']['CreateBucketRequest']['payload']);
        $api['shapes']['BucketLocationConstraint']['enum'] = [
            "ap-northeast-1",
            "ap-southeast-2",
            "ap-southeast-1",
            "cn-north-1",
            "eu-central-1",
            "eu-west-1",
            "us-east-1",
            "us-west-1",
            "us-west-2",
            "sa-east-1",
        ];

        // Add a note that the ContentMD5 is optional.
        $docs['shapes']['ContentMD5']['append'] = '<div class="alert alert-info">The value will be computed on '
            . 'your behalf.</div>';

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
