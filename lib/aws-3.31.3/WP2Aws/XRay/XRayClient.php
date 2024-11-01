<?php
namespace WP2Aws\XRay;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS X-Ray** service.
 * @method \WP2Aws\Result batchGetTraces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetTracesAsync(array $args = [])
 * @method \WP2Aws\Result getServiceGraph(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getServiceGraphAsync(array $args = [])
 * @method \WP2Aws\Result getTraceGraph(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTraceGraphAsync(array $args = [])
 * @method \WP2Aws\Result getTraceSummaries(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTraceSummariesAsync(array $args = [])
 * @method \WP2Aws\Result putTelemetryRecords(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putTelemetryRecordsAsync(array $args = [])
 * @method \WP2Aws\Result putTraceSegments(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putTraceSegmentsAsync(array $args = [])
 */
class XRayClient extends WP2AwsClient {}
