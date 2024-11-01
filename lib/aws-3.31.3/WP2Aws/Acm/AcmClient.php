<?php
namespace WP2Aws\Acm;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Certificate Manager** service.
 *
 * @method \WP2Aws\Result addTagsToCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsToCertificateAsync(array $args = [])
 * @method \WP2Aws\Result deleteCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCertificateAsync(array $args = [])
 * @method \WP2Aws\Result describeCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeCertificateAsync(array $args = [])
 * @method \WP2Aws\Result getCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCertificateAsync(array $args = [])
 * @method \WP2Aws\Result importCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise importCertificateAsync(array $args = [])
 * @method \WP2Aws\Result listCertificates(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCertificatesAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForCertificateAsync(array $args = [])
 * @method \WP2Aws\Result removeTagsFromCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsFromCertificateAsync(array $args = [])
 * @method \WP2Aws\Result requestCertificate(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise requestCertificateAsync(array $args = [])
 * @method \WP2Aws\Result resendValidationEmail(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise resendValidationEmailAsync(array $args = [])
 */
class AcmClient extends WP2AwsClient {}
