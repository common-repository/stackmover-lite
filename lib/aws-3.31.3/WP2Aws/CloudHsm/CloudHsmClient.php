<?php
namespace WP2Aws\CloudHsm;

use WP2Aws\Api\ApiProvider;
use WP2Aws\Api\DocModel;
use WP2Aws\Api\Service;
use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with **AWS CloudHSM**.
 *
 * @method \WP2Aws\Result addTagsToResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsToResourceAsync(array $args = [])
 * @method \WP2Aws\Result createHapg(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createHapgAsync(array $args = [])
 * @method \WP2Aws\Result createHsm(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createHsmAsync(array $args = [])
 * @method \WP2Aws\Result createLunaClient(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createLunaClientAsync(array $args = [])
 * @method \WP2Aws\Result deleteHapg(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteHapgAsync(array $args = [])
 * @method \WP2Aws\Result deleteHsm(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteHsmAsync(array $args = [])
 * @method \WP2Aws\Result deleteLunaClient(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteLunaClientAsync(array $args = [])
 * @method \WP2Aws\Result describeHapg(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeHapgAsync(array $args = [])
 * @method \WP2Aws\Result describeHsm(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeHsmAsync(array $args = [])
 * @method \WP2Aws\Result describeLunaClient(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeLunaClientAsync(array $args = [])
 * @method \WP2Aws\Result getConfig(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getConfigAsync(array $args = [])
 * @method \WP2Aws\Result listAvailableZones(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAvailableZonesAsync(array $args = [])
 * @method \WP2Aws\Result listHapgs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listHapgsAsync(array $args = [])
 * @method \WP2Aws\Result listHsms(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listHsmsAsync(array $args = [])
 * @method \WP2Aws\Result listLunaClients(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listLunaClientsAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \WP2Aws\Result modifyHapg(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyHapgAsync(array $args = [])
 * @method \WP2Aws\Result modifyHsm(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyHsmAsync(array $args = [])
 * @method \WP2Aws\Result modifyLunaClient(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyLunaClientAsync(array $args = [])
 * @method \WP2Aws\Result removeTagsFromResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removeTagsFromResourceAsync(array $args = [])
 */
class CloudHsmClient extends WP2AwsClient
{
    public function __call($name, array $args)
    {
        // Overcomes a naming collision with `WP2AwsClient::getConfig`.
        if (lcfirst($name) === 'getConfigFiles') {
            $name = 'GetConfig';
        } elseif (lcfirst($name) === 'getConfigFilesAsync') {
            $name = 'GetConfigAsync';
        }

        return parent::__call($name, $args);
    }

    /**
     * @internal
     * @codeCoverageIgnore
     */
    public static function applyDocFilters(array $api, array $docs)
    {
        // Overcomes a naming collision with `WP2AwsClient::getConfig`.
        $api['operations']['GetConfigFiles'] = $api['operations']['GetConfig'];
        $docs['operations']['GetConfigFiles'] = $docs['operations']['GetConfig'];
        unset($api['operations']['GetConfig'], $docs['operations']['GetConfig']);
        ksort($api['operations']);

        return [
            new Service($api, ApiProvider::defaultProvider()),
            new DocModel($docs)
        ];
    }
}
