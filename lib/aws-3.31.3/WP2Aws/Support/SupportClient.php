<?php
namespace WP2Aws\Support;

use WP2Aws\WP2AwsClient;

/**
 * AWS Support client.
 *
 * @method \WP2Aws\Result addAttachmentsToSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addAttachmentsToSetAsync(array $args = [])
 * @method \WP2Aws\Result addCommunicationToCase(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addCommunicationToCaseAsync(array $args = [])
 * @method \WP2Aws\Result createCase(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCaseAsync(array $args = [])
 * @method \WP2Aws\Result describeAttachment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAttachmentAsync(array $args = [])
 * @method \WP2Aws\Result describeCases(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCasesAsync(array $args = [])
 * @method \WP2Aws\Result describeCommunications(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCommunicationsAsync(array $args = [])
 * @method \WP2Aws\Result describeServices(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeServicesAsync(array $args = [])
 * @method \WP2Aws\Result describeSeverityLevels(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSeverityLevelsAsync(array $args = [])
 * @method \WP2Aws\Result describeTrustedAdvisorCheckRefreshStatuses(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckRefreshStatusesAsync(array $args = [])
 * @method \WP2Aws\Result describeTrustedAdvisorCheckResult(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckResultAsync(array $args = [])
 * @method \WP2Aws\Result describeTrustedAdvisorCheckSummaries(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTrustedAdvisorCheckSummariesAsync(array $args = [])
 * @method \WP2Aws\Result describeTrustedAdvisorChecks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTrustedAdvisorChecksAsync(array $args = [])
 * @method \WP2Aws\Result refreshTrustedAdvisorCheck(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise refreshTrustedAdvisorCheckAsync(array $args = [])
 * @method \WP2Aws\Result resolveCase(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resolveCaseAsync(array $args = [])
 */
class SupportClient extends WP2AwsClient {}
