<?php
namespace WP2Aws\Ses;

use WP2Aws\Credentials\CredentialsInterface;

/**
 * This client is used to interact with the **Amazon Simple Email Service (Amazon SES)**.
 *
 * @method \WP2Aws\Result cloneReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise cloneReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result createConfigurationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createConfigurationSetAsync(array $args = [])
 * @method \WP2Aws\Result createConfigurationSetEventDestination(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createConfigurationSetEventDestinationAsync(array $args = [])
 * @method \WP2Aws\Result createReceiptFilter(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReceiptFilterAsync(array $args = [])
 * @method \WP2Aws\Result createReceiptRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReceiptRuleAsync(array $args = [])
 * @method \WP2Aws\Result createReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result deleteConfigurationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteConfigurationSetAsync(array $args = [])
 * @method \WP2Aws\Result deleteConfigurationSetEventDestination(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteConfigurationSetEventDestinationAsync(array $args = [])
 * @method \WP2Aws\Result deleteIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIdentityAsync(array $args = [])
 * @method \WP2Aws\Result deleteIdentityPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIdentityPolicyAsync(array $args = [])
 * @method \WP2Aws\Result deleteReceiptFilter(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReceiptFilterAsync(array $args = [])
 * @method \WP2Aws\Result deleteReceiptRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReceiptRuleAsync(array $args = [])
 * @method \WP2Aws\Result deleteReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result deleteVerifiedEmailAddress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteVerifiedEmailAddressAsync(array $args = [])
 * @method \WP2Aws\Result describeActiveReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeActiveReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result describeConfigurationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeConfigurationSetAsync(array $args = [])
 * @method \WP2Aws\Result describeReceiptRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReceiptRuleAsync(array $args = [])
 * @method \WP2Aws\Result describeReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityDkimAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityDkimAttributesAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityMailFromDomainAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityMailFromDomainAttributesAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityNotificationAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityNotificationAttributesAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityPolicies(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityPoliciesAsync(array $args = [])
 * @method \WP2Aws\Result getIdentityVerificationAttributes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIdentityVerificationAttributesAsync(array $args = [])
 * @method \WP2Aws\Result getSendQuota(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSendQuotaAsync(array $args = [])
 * @method \WP2Aws\Result getSendStatistics(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSendStatisticsAsync(array $args = [])
 * @method \WP2Aws\Result listConfigurationSets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listConfigurationSetsAsync(array $args = [])
 * @method \WP2Aws\Result listIdentities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listIdentitiesAsync(array $args = [])
 * @method \WP2Aws\Result listIdentityPolicies(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listIdentityPoliciesAsync(array $args = [])
 * @method \WP2Aws\Result listReceiptFilters(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listReceiptFiltersAsync(array $args = [])
 * @method \WP2Aws\Result listReceiptRuleSets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listReceiptRuleSetsAsync(array $args = [])
 * @method \WP2Aws\Result listVerifiedEmailAddresses(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listVerifiedEmailAddressesAsync(array $args = [])
 * @method \WP2Aws\Result putIdentityPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putIdentityPolicyAsync(array $args = [])
 * @method \WP2Aws\Result reorderReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise reorderReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result sendBounce(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendBounceAsync(array $args = [])
 * @method \WP2Aws\Result sendEmail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendEmailAsync(array $args = [])
 * @method \WP2Aws\Result sendRawEmail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendRawEmailAsync(array $args = [])
 * @method \WP2Aws\Result setActiveReceiptRuleSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setActiveReceiptRuleSetAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityDkimEnabled(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityDkimEnabledAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityFeedbackForwardingEnabled(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityFeedbackForwardingEnabledAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityHeadersInNotificationsEnabled(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityHeadersInNotificationsEnabledAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityMailFromDomain(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityMailFromDomainAsync(array $args = [])
 * @method \WP2Aws\Result setIdentityNotificationTopic(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setIdentityNotificationTopicAsync(array $args = [])
 * @method \WP2Aws\Result setReceiptRulePosition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setReceiptRulePositionAsync(array $args = [])
 * @method \WP2Aws\Result updateConfigurationSetEventDestination(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateConfigurationSetEventDestinationAsync(array $args = [])
 * @method \WP2Aws\Result updateReceiptRule(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateReceiptRuleAsync(array $args = [])
 * @method \WP2Aws\Result verifyDomainDkim(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise verifyDomainDkimAsync(array $args = [])
 * @method \WP2Aws\Result verifyDomainIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise verifyDomainIdentityAsync(array $args = [])
 * @method \WP2Aws\Result verifyEmailAddress(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise verifyEmailAddressAsync(array $args = [])
 * @method \WP2Aws\Result verifyEmailIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise verifyEmailIdentityAsync(array $args = [])
 */
class SesClient extends \WP2Aws\WP2AwsClient
{
    /**
     * Create an SMTP password for a given IAM user's credentials.
     *
     * The SMTP username is the Access Key ID for the provided credentials.
     *
     * @link http://docs.aws.amazon.com/ses/latest/DeveloperGuide/smtp-credentials.html#smtp-credentials-convert
     *
     * @param CredentialsInterface $creds
     *
     * @return string
     */
    public static function generateSmtpPassword(CredentialsInterface $creds)
    {
        static $version = "\x02";
        static $algo = 'sha256';
        static $message = 'SendRawEmail';
        $signature = hash_hmac($algo, $message, $creds->getSecretKey(), true);

        return base64_encode($version . $signature);
    }
}
