<?php
namespace WP2Aws\Route53;

use WP2Aws\WP2AwsClient;
use WP2Aws\CommandInterface;
use Psr\Http\Message\RequestInterface;

/**
 * This client is used to interact with the **Amazon Route 53** service.
 *
 * @method \WP2Aws\Result associateVPCWithHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateVPCWithHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result changeResourceRecordSets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise changeResourceRecordSetsAsync(array $args = [])
 * @method \WP2Aws\Result changeTagsForResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise changeTagsForResourceAsync(array $args = [])
 * @method \WP2Aws\Result createHealthCheck(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createHealthCheckAsync(array $args = [])
 * @method \WP2Aws\Result createHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result createReusableDelegationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createReusableDelegationSetAsync(array $args = [])
 * @method \WP2Aws\Result createTrafficPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTrafficPolicyAsync(array $args = [])
 * @method \WP2Aws\Result createTrafficPolicyInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTrafficPolicyInstanceAsync(array $args = [])
 * @method \WP2Aws\Result createTrafficPolicyVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTrafficPolicyVersionAsync(array $args = [])
 * @method \WP2Aws\Result createVPCAssociationAuthorization(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createVPCAssociationAuthorizationAsync(array $args = [])
 * @method \WP2Aws\Result deleteHealthCheck(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteHealthCheckAsync(array $args = [])
 * @method \WP2Aws\Result deleteHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result deleteReusableDelegationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteReusableDelegationSetAsync(array $args = [])
 * @method \WP2Aws\Result deleteTrafficPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTrafficPolicyAsync(array $args = [])
 * @method \WP2Aws\Result deleteTrafficPolicyInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTrafficPolicyInstanceAsync(array $args = [])
 * @method \WP2Aws\Result deleteVPCAssociationAuthorization(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteVPCAssociationAuthorizationAsync(array $args = [])
 * @method \WP2Aws\Result disassociateVPCFromHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateVPCFromHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result getChange(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getChangeAsync(array $args = [])
 * @method \WP2Aws\Result getCheckerIpRanges(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCheckerIpRangesAsync(array $args = [])
 * @method \WP2Aws\Result getGeoLocation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getGeoLocationAsync(array $args = [])
 * @method \WP2Aws\Result getHealthCheck(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHealthCheckAsync(array $args = [])
 * @method \WP2Aws\Result getHealthCheckCount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHealthCheckCountAsync(array $args = [])
 * @method \WP2Aws\Result getHealthCheckLastFailureReason(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHealthCheckLastFailureReasonAsync(array $args = [])
 * @method \WP2Aws\Result getHealthCheckStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHealthCheckStatusAsync(array $args = [])
 * @method \WP2Aws\Result getHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result getHostedZoneCount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getHostedZoneCountAsync(array $args = [])
 * @method \WP2Aws\Result getReusableDelegationSet(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getReusableDelegationSetAsync(array $args = [])
 * @method \WP2Aws\Result getTrafficPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTrafficPolicyAsync(array $args = [])
 * @method \WP2Aws\Result getTrafficPolicyInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTrafficPolicyInstanceAsync(array $args = [])
 * @method \WP2Aws\Result getTrafficPolicyInstanceCount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTrafficPolicyInstanceCountAsync(array $args = [])
 * @method \WP2Aws\Result listGeoLocations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listGeoLocationsAsync(array $args = [])
 * @method \WP2Aws\Result listHealthChecks(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listHealthChecksAsync(array $args = [])
 * @method \WP2Aws\Result listHostedZones(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listHostedZonesAsync(array $args = [])
 * @method \WP2Aws\Result listHostedZonesByName(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listHostedZonesByNameAsync(array $args = [])
 * @method \WP2Aws\Result listResourceRecordSets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listResourceRecordSetsAsync(array $args = [])
 * @method \WP2Aws\Result listReusableDelegationSets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listReusableDelegationSetsAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourceAsync(array $args = [])
 * @method \WP2Aws\Result listTagsForResources(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsForResourcesAsync(array $args = [])
 * @method \WP2Aws\Result listTrafficPolicies(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTrafficPoliciesAsync(array $args = [])
 * @method \WP2Aws\Result listTrafficPolicyInstances(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTrafficPolicyInstancesAsync(array $args = [])
 * @method \WP2Aws\Result listTrafficPolicyInstancesByHostedZone(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByHostedZoneAsync(array $args = [])
 * @method \WP2Aws\Result listTrafficPolicyInstancesByPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTrafficPolicyInstancesByPolicyAsync(array $args = [])
 * @method \WP2Aws\Result listTrafficPolicyVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTrafficPolicyVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listVPCAssociationAuthorizations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listVPCAssociationAuthorizationsAsync(array $args = [])
 * @method \WP2Aws\Result testDNSAnswer(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise testDNSAnswerAsync(array $args = [])
 * @method \WP2Aws\Result updateHealthCheck(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateHealthCheckAsync(array $args = [])
 * @method \WP2Aws\Result updateHostedZoneComment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateHostedZoneCommentAsync(array $args = [])
 * @method \WP2Aws\Result updateTrafficPolicyComment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateTrafficPolicyCommentAsync(array $args = [])
 * @method \WP2Aws\Result updateTrafficPolicyInstance(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateTrafficPolicyInstanceAsync(array $args = [])
 */
class Route53Client extends WP2AwsClient
{
    public function __construct(array $args)
    {
        parent::__construct($args);
        $this->getHandlerList()->appendInit($this->cleanIdFn(), 'route53.clean_id');
    }

    private function cleanIdFn()
    {
        return function (callable $handler) {
            return function (CommandInterface $c, RequestInterface $r = null) use ($handler) {
                foreach (['Id', 'HostedZoneId', 'DelegationSetId'] as $clean) {
                    if ($c->hasParam($clean)) {
                        $c[$clean] = $this->cleanId($c[$clean]);
                    }
                }
                return $handler($c, $r);
            };
        };
    }

    private function cleanId($id)
    {
        static $toClean = ['/hostedzone/', '/change/', '/delegationset/'];

        return str_replace($toClean, '', $id);
    }
}
