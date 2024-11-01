<?php
namespace WP2Aws\CloudFront;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon CloudFront** service.
 *
 * @method \WP2Aws\Result createCloudFrontOriginAccessIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \WP2Aws\Result createDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDistributionAsync(array $args = [])
 * @method \WP2Aws\Result createInvalidation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createInvalidationAsync(array $args = [])
 * @method \WP2Aws\Result createStreamingDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createStreamingDistributionAsync(array $args = [])
 * @method \WP2Aws\Result deleteCloudFrontOriginAccessIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \WP2Aws\Result deleteDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDistributionAsync(array $args = [])
 * @method \WP2Aws\Result deleteStreamingDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteStreamingDistributionAsync(array $args = [])
 * @method \WP2Aws\Result getCloudFrontOriginAccessIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \WP2Aws\Result getCloudFrontOriginAccessIdentityConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCloudFrontOriginAccessIdentityConfigAsync(array $args = [])
 * @method \WP2Aws\Result getDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDistributionAsync(array $args = [])
 * @method \WP2Aws\Result getDistributionConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDistributionConfigAsync(array $args = [])
 * @method \WP2Aws\Result getInvalidation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getInvalidationAsync(array $args = [])
 * @method \WP2Aws\Result getStreamingDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getStreamingDistributionAsync(array $args = [])
 * @method \WP2Aws\Result getStreamingDistributionConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getStreamingDistributionConfigAsync(array $args = [])
 * @method \WP2Aws\Result listCloudFrontOriginAccessIdentities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCloudFrontOriginAccessIdentitiesAsync(array $args = [])
 * @method \WP2Aws\Result listDistributions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDistributionsAsync(array $args = [])
 * @method \WP2Aws\Result listDistributionsByWebACLId(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDistributionsByWebACLIdAsync(array $args = [])
 * @method \WP2Aws\Result listInvalidations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listInvalidationsAsync(array $args = [])
 * @method \WP2Aws\Result listStreamingDistributions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listStreamingDistributionsAsync(array $args = [])
 * @method \WP2Aws\Result updateCloudFrontOriginAccessIdentity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateCloudFrontOriginAccessIdentityAsync(array $args = [])
 * @method \WP2Aws\Result updateDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDistributionAsync(array $args = [])
 * @method \WP2Aws\Result updateStreamingDistribution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateStreamingDistributionAsync(array $args = [])
 * @method \WP2Aws\Result createDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2GuzzleHttp\Promise\Promise createDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2Aws\Result createStreamingDistributionWithTags(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2GuzzleHttp\Promise\Promise createStreamingDistributionWithTagsAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2Aws\Result listTagsForResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2Aws\Result tagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2GuzzleHttp\Promise\Promise tagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2Aws\Result untagResource(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 * @method \WP2GuzzleHttp\Promise\Promise untagResourceAsync(array $args = []) (supported in versions 2016-08-01, 2016-08-20, 2016-09-07, 2016-09-29, 2016-11-25, 2017-03-25)
 */
class CloudFrontClient extends WP2AwsClient
{
    /**
     * Create a signed Amazon CloudFront URL.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: rtmp://s5c39gqb8ow64r.cloudfront.net/videos/mp3_name.mp3
     *   http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath ot the private key used to sign
     *   CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return string Signed URL with authentication parameters
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedUrl(array $options)
    {
        foreach (['url', 'key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $urlSigner = new UrlSigner(
            $options['key_pair_id'],
            $options['private_key']
        );

        return $urlSigner->getSignedUrl(
            $options['url'],
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }

    /**
     * Create a signed Amazon CloudFront cookie.
     *
     * This method accepts an array of configuration options:
     *
     * - url: (string)  URL of the resource being signed (can include query
     *   string and wildcards). For example: http://d111111abcdef8.cloudfront.net/images/horizon.jpg?size=large&license=yes
     * - policy: (string) JSON policy. Use this option when creating a signed
     *   URL for a custom policy.
     * - expires: (int) UTC Unix timestamp used when signing with a canned
     *   policy. Not required when passing a custom 'policy' option.
     * - key_pair_id: (string) The ID of the key pair used to sign CloudFront
     *   URLs for private distributions.
     * - private_key: (string) The filepath ot the private key used to sign
     *   CloudFront URLs for private distributions.
     *
     * @param array $options Array of configuration options used when signing
     *
     * @return array Key => value pairs of signed cookies to set
     * @throws \InvalidArgumentException if url, key_pair_id, or private_key
     *     were not specified.
     * @link http://docs.aws.amazon.com/AmazonCloudFront/latest/DeveloperGuide/WorkingWithStreamingDistributions.html
     */
    public function getSignedCookie(array $options)
    {
        foreach (['key_pair_id', 'private_key'] as $required) {
            if (!isset($options[$required])) {
                throw new \InvalidArgumentException("$required is required");
            }
        }

        $cookieSigner = new CookieSigner(
            $options['key_pair_id'],
            $options['private_key']
        );

        return $cookieSigner->getSignedCookie(
            isset($options['url']) ? $options['url'] : null,
            isset($options['expires']) ? $options['expires'] : null,
            isset($options['policy']) ? $options['policy'] : null
        );
    }
}
