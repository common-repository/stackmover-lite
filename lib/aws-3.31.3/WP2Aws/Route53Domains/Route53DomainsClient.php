<?php
namespace WP2Aws\Route53Domains;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Route 53 Domains** service.
 *
 * @method \WP2Aws\Result checkDomainAvailability(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise checkDomainAvailabilityAsync(array $args = [])
 * @method \WP2Aws\Result deleteTagsForDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTagsForDomainAsync(array $args = [])
 * @method \WP2Aws\Result disableDomainAutoRenew(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableDomainAutoRenewAsync(array $args = [])
 * @method \WP2Aws\Result disableDomainTransferLock(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableDomainTransferLockAsync(array $args = [])
 * @method \WP2Aws\Result enableDomainAutoRenew(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableDomainAutoRenewAsync(array $args = [])
 * @method \WP2Aws\Result enableDomainTransferLock(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableDomainTransferLockAsync(array $args = [])
 * @method \WP2Aws\Result getContactReachabilityStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getContactReachabilityStatusAsync(array $args = [])
 * @method \WP2Aws\Result getDomainDetail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDomainDetailAsync(array $args = [])
 * @method \WP2Aws\Result getDomainSuggestions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDomainSuggestionsAsync(array $args = [])
 * @method \WP2Aws\Result getOperationDetail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getOperationDetailAsync(array $args = [])
 * @method \WP2Aws\Result listDomains(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDomainsAsync(array $args = [])
 * @method \WP2Aws\Result listOperations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listOperationsAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForDomainAsync(array $args = [])
 * @method \WP2Aws\Result registerDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise registerDomainAsync(array $args = [])
 * @method \WP2Aws\Result renewDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise renewDomainAsync(array $args = [])
 * @method \WP2Aws\Result resendContactReachabilityEmail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resendContactReachabilityEmailAsync(array $args = [])
 * @method \WP2Aws\Result retrieveDomainAuthCode(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise retrieveDomainAuthCodeAsync(array $args = [])
 * @method \WP2Aws\Result transferDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise transferDomainAsync(array $args = [])
 * @method \WP2Aws\Result updateDomainContact(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDomainContactAsync(array $args = [])
 * @method \WP2Aws\Result updateDomainContactPrivacy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDomainContactPrivacyAsync(array $args = [])
 * @method \WP2Aws\Result updateDomainNameservers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDomainNameserversAsync(array $args = [])
 * @method \WP2Aws\Result updateTagsForDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateTagsForDomainAsync(array $args = [])
 * @method \WP2Aws\Result viewBilling(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise viewBillingAsync(array $args = [])
 */
class Route53DomainsClient extends WP2AwsClient {}