<?php
namespace WP2Aws;

/**
 * Builds AWS clients based on configuration settings.
 *
 * @method \WP2Aws\Acm\AcmClient createAcm(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionAcm(array $args = [])
 * @method \WP2Aws\ApiGateway\ApiGatewayClient createApiGateway(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionApiGateway(array $args = [])
 * @method \WP2Aws\ApplicationAutoScaling\ApplicationAutoScalingClient createApplicationAutoScaling(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionApplicationAutoScaling(array $args = [])
 * @method \WP2Aws\ApplicationDiscoveryService\ApplicationDiscoveryServiceClient createApplicationDiscoveryService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionApplicationDiscoveryService(array $args = [])
 * @method \WP2Aws\Appstream\AppstreamClient createAppstream(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionAppstream(array $args = [])
 * @method \WP2Aws\Athena\AthenaClient createAthena(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionAthena(array $args = [])
 * @method \WP2Aws\AutoScaling\AutoScalingClient createAutoScaling(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionAutoScaling(array $args = [])
 * @method \WP2Aws\Batch\BatchClient createBatch(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionBatch(array $args = [])
 * @method \WP2Aws\Budgets\BudgetsClient createBudgets(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionBudgets(array $args = [])
 * @method \WP2Aws\CloudDirectory\CloudDirectoryClient createCloudDirectory(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudDirectory(array $args = [])
 * @method \WP2Aws\CloudFormation\CloudFormationClient createCloudFormation(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudFormation(array $args = [])
 * @method \WP2Aws\CloudFront\CloudFrontClient createCloudFront(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudFront(array $args = [])
 * @method \WP2Aws\CloudHsm\CloudHsmClient createCloudHsm(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudHsm(array $args = [])
 * @method \WP2Aws\CloudSearch\CloudSearchClient createCloudSearch(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudSearch(array $args = [])
 * @method \WP2Aws\CloudSearchDomain\CloudSearchDomainClient createCloudSearchDomain(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudSearchDomain(array $args = [])
 * @method \WP2Aws\CloudTrail\CloudTrailClient createCloudTrail(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudTrail(array $args = [])
 * @method \WP2Aws\CloudWatch\CloudWatchClient createCloudWatch(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudWatch(array $args = [])
 * @method \WP2Aws\CloudWatchEvents\CloudWatchEventsClient createCloudWatchEvents(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudWatchEvents(array $args = [])
 * @method \WP2Aws\CloudWatchLogs\CloudWatchLogsClient createCloudWatchLogs(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCloudWatchLogs(array $args = [])
 * @method \WP2Aws\CodeBuild\CodeBuildClient createCodeBuild(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCodeBuild(array $args = [])
 * @method \WP2Aws\CodeCommit\CodeCommitClient createCodeCommit(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCodeCommit(array $args = [])
 * @method \WP2Aws\CodeDeploy\CodeDeployClient createCodeDeploy(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCodeDeploy(array $args = [])
 * @method \WP2Aws\CodePipeline\CodePipelineClient createCodePipeline(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCodePipeline(array $args = [])
 * @method \WP2Aws\CodeStar\CodeStarClient createCodeStar(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCodeStar(array $args = [])
 * @method \WP2Aws\CognitoIdentity\CognitoIdentityClient createCognitoIdentity(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCognitoIdentity(array $args = [])
 * @method \WP2Aws\CognitoIdentityProvider\CognitoIdentityProviderClient createCognitoIdentityProvider(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCognitoIdentityProvider(array $args = [])
 * @method \WP2Aws\CognitoSync\CognitoSyncClient createCognitoSync(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCognitoSync(array $args = [])
 * @method \WP2Aws\ConfigService\ConfigServiceClient createConfigService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionConfigService(array $args = [])
 * @method \WP2Aws\CostandUsageReportService\CostandUsageReportServiceClient createCostandUsageReportService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionCostandUsageReportService(array $args = [])
 * @method \WP2Aws\DAX\DAXClient createDAX(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDAX(array $args = [])
 * @method \WP2Aws\DataPipeline\DataPipelineClient createDataPipeline(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDataPipeline(array $args = [])
 * @method \WP2Aws\DatabaseMigrationService\DatabaseMigrationServiceClient createDatabaseMigrationService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDatabaseMigrationService(array $args = [])
 * @method \WP2Aws\DeviceFarm\DeviceFarmClient createDeviceFarm(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDeviceFarm(array $args = [])
 * @method \WP2Aws\DirectConnect\DirectConnectClient createDirectConnect(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDirectConnect(array $args = [])
 * @method \WP2Aws\DirectoryService\DirectoryServiceClient createDirectoryService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDirectoryService(array $args = [])
 * @method \WP2Aws\DynamoDb\DynamoDbClient createDynamoDb(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDynamoDb(array $args = [])
 * @method \WP2Aws\DynamoDbStreams\DynamoDbStreamsClient createDynamoDbStreams(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionDynamoDbStreams(array $args = [])
 * @method \WP2Aws\Ec2\Ec2Client createEc2(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionEc2(array $args = [])
 * @method \WP2Aws\Ecr\EcrClient createEcr(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionEcr(array $args = [])
 * @method \WP2Aws\Ecs\EcsClient createEcs(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionEcs(array $args = [])
 * @method \WP2Aws\Efs\EfsClient createEfs(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionEfs(array $args = [])
 * @method \WP2Aws\ElastiCache\ElastiCacheClient createElastiCache(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElastiCache(array $args = [])
 * @method \WP2Aws\ElasticBeanstalk\ElasticBeanstalkClient createElasticBeanstalk(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElasticBeanstalk(array $args = [])
 * @method \WP2Aws\ElasticLoadBalancing\ElasticLoadBalancingClient createElasticLoadBalancing(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElasticLoadBalancing(array $args = [])
 * @method \WP2Aws\ElasticLoadBalancingV2\ElasticLoadBalancingV2Client createElasticLoadBalancingV2(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElasticLoadBalancingV2(array $args = [])
 * @method \WP2Aws\ElasticTranscoder\ElasticTranscoderClient createElasticTranscoder(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElasticTranscoder(array $args = [])
 * @method \WP2Aws\ElasticsearchService\ElasticsearchServiceClient createElasticsearchService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionElasticsearchService(array $args = [])
 * @method \WP2Aws\Emr\EmrClient createEmr(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionEmr(array $args = [])
 * @method \WP2Aws\Firehose\FirehoseClient createFirehose(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionFirehose(array $args = [])
 * @method \WP2Aws\GameLift\GameLiftClient createGameLift(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionGameLift(array $args = [])
 * @method \WP2Aws\Glacier\GlacierClient createGlacier(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionGlacier(array $args = [])
 * @method \WP2Aws\Greengrass\GreengrassClient createGreengrass(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionGreengrass(array $args = [])
 * @method \WP2Aws\Health\HealthClient createHealth(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionHealth(array $args = [])
 * @method \WP2Aws\Iam\IamClient createIam(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionIam(array $args = [])
 * @method \WP2Aws\ImportExport\ImportExportClient createImportExport(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionImportExport(array $args = [])
 * @method \WP2Aws\Inspector\InspectorClient createInspector(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionInspector(array $args = [])
 * @method \WP2Aws\Iot\IotClient createIot(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionIot(array $args = [])
 * @method \WP2Aws\IotDataPlane\IotDataPlaneClient createIotDataPlane(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionIotDataPlane(array $args = [])
 * @method \WP2Aws\Kinesis\KinesisClient createKinesis(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionKinesis(array $args = [])
 * @method \WP2Aws\KinesisAnalytics\KinesisAnalyticsClient createKinesisAnalytics(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionKinesisAnalytics(array $args = [])
 * @method \WP2Aws\Kms\KmsClient createKms(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionKms(array $args = [])
 * @method \WP2Aws\Lambda\LambdaClient createLambda(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionLambda(array $args = [])
 * @method \WP2Aws\LexModelBuildingService\LexModelBuildingServiceClient createLexModelBuildingService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionLexModelBuildingService(array $args = [])
 * @method \WP2Aws\LexRuntimeService\LexRuntimeServiceClient createLexRuntimeService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionLexRuntimeService(array $args = [])
 * @method \WP2Aws\Lightsail\LightsailClient createLightsail(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionLightsail(array $args = [])
 * @method \WP2Aws\MTurk\MTurkClient createMTurk(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionMTurk(array $args = [])
 * @method \WP2Aws\MachineLearning\MachineLearningClient createMachineLearning(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionMachineLearning(array $args = [])
 * @method \WP2Aws\MarketplaceCommerceAnalytics\MarketplaceCommerceAnalyticsClient createMarketplaceCommerceAnalytics(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionMarketplaceCommerceAnalytics(array $args = [])
 * @method \WP2Aws\MarketplaceEntitlementService\MarketplaceEntitlementServiceClient createMarketplaceEntitlementService(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionMarketplaceEntitlementService(array $args = [])
 * @method \WP2Aws\MarketplaceMetering\MarketplaceMeteringClient createMarketplaceMetering(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionMarketplaceMetering(array $args = [])
 * @method \WP2Aws\OpsWorks\OpsWorksClient createOpsWorks(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionOpsWorks(array $args = [])
 * @method \WP2Aws\OpsWorksCM\OpsWorksCMClient createOpsWorksCM(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionOpsWorksCM(array $args = [])
 * @method \WP2Aws\Organizations\OrganizationsClient createOrganizations(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionOrganizations(array $args = [])
 * @method \WP2Aws\Pinpoint\PinpointClient createPinpoint(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionPinpoint(array $args = [])
 * @method \WP2Aws\Polly\PollyClient createPolly(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionPolly(array $args = [])
 * @method \WP2Aws\Rds\RdsClient createRds(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionRds(array $args = [])
 * @method \WP2Aws\Redshift\RedshiftClient createRedshift(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionRedshift(array $args = [])
 * @method \WP2Aws\Rekognition\RekognitionClient createRekognition(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionRekognition(array $args = [])
 * @method \WP2Aws\ResourceGroupsTaggingAPI\ResourceGroupsTaggingAPIClient createResourceGroupsTaggingAPI(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionResourceGroupsTaggingAPI(array $args = [])
 * @method \WP2Aws\Route53\Route53Client createRoute53(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionRoute53(array $args = [])
 * @method \WP2Aws\Route53Domains\Route53DomainsClient createRoute53Domains(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionRoute53Domains(array $args = [])
 * @method \WP2Aws\S3\S3Client createS3(array $args = [])
 * @method \WP2Aws\S3\S3MultiRegionClient createMultiRegionS3(array $args = [])
 * @method \WP2Aws\ServiceCatalog\ServiceCatalogClient createServiceCatalog(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionServiceCatalog(array $args = [])
 * @method \WP2Aws\Ses\SesClient createSes(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSes(array $args = [])
 * @method \WP2Aws\Sfn\SfnClient createSfn(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSfn(array $args = [])
 * @method \WP2Aws\Shield\ShieldClient createShield(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionShield(array $args = [])
 * @method \WP2Aws\Sms\SmsClient createSms(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSms(array $args = [])
 * @method \WP2Aws\SnowBall\SnowBallClient createSnowBall(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSnowBall(array $args = [])
 * @method \WP2Aws\Sns\SnsClient createSns(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSns(array $args = [])
 * @method \WP2Aws\Sqs\SqsClient createSqs(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSqs(array $args = [])
 * @method \WP2Aws\Ssm\SsmClient createSsm(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSsm(array $args = [])
 * @method \WP2Aws\StorageGateway\StorageGatewayClient createStorageGateway(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionStorageGateway(array $args = [])
 * @method \WP2Aws\Sts\StsClient createSts(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSts(array $args = [])
 * @method \WP2Aws\Support\SupportClient createSupport(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSupport(array $args = [])
 * @method \WP2Aws\Swf\SwfClient createSwf(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionSwf(array $args = [])
 * @method \WP2Aws\Waf\WafClient createWaf(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionWaf(array $args = [])
 * @method \WP2Aws\WafRegional\WafRegionalClient createWafRegional(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionWafRegional(array $args = [])
 * @method \WP2Aws\WorkDocs\WorkDocsClient createWorkDocs(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionWorkDocs(array $args = [])
 * @method \WP2Aws\WorkSpaces\WorkSpacesClient createWorkSpaces(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionWorkSpaces(array $args = [])
 * @method \WP2Aws\XRay\XRayClient createXRay(array $args = [])
 * @method \WP2Aws\MultiRegionClient createMultiRegionXRay(array $args = [])
 */
class Sdk
{
    const VERSION = '3.31.3';

    /** @var array Arguments for creating clients */
    private $args;

    /**
     * Constructs a new SDK object with an associative array of default
     * client settings.
     *
     * @param array $args
     *
     * @throws \InvalidArgumentException
     * @see WP2Aws\WP2AwsClient::__construct for a list of available options.
     */
    public function __construct(array $args = [])
    {
        $this->args = $args;

        if (!isset($args['handler']) && !isset($args['http_handler'])) {
            $this->args['http_handler'] = default_http_handler();
        }
    }

    public function __call($name, array $args)
    {
        $args = isset($args[0]) ? $args[0] : [];
        if (strpos($name, 'createMultiRegion') === 0) {
            return $this->createMultiRegionClient(substr($name, 17), $args);
        } elseif (strpos($name, 'create') === 0) {
            return $this->createClient(substr($name, 6), $args);
        }

        throw new \BadMethodCallException("Unknown method: {$name}.");
    }

    /**
     * Get a client by name using an array of constructor options.
     *
     * @param string $name Service name or namespace (e.g., DynamoDb, s3).
     * @param array  $args Arguments to configure the client.
     *
     * @return WP2AwsClientInterface
     * @throws \InvalidArgumentException if any required options are missing or
     *                                   the service is not supported.
     * @see WP2Aws\WP2AwsClient::__construct for a list of available options for args.
     */
    public function createClient($name, array $args = [])
    {
        // Get information about the service from the manifest file.
        $service = manifest($name);
        $namespace = $service['namespace'];

        // Instantiate the client class.
        $client = "WP2Aws\\{$namespace}\\{$namespace}Client";
        return new $client($this->mergeArgs($namespace, $service, $args));
    }

    public function createMultiRegionClient($name, array $args = [])
    {
        // Get information about the service from the manifest file.
        $service = manifest($name);
        $namespace = $service['namespace'];

        $klass = "WP2Aws\\{$namespace}\\{$namespace}MultiRegionClient";
        $klass = class_exists($klass) ? $klass : 'WP2Aws\\MultiRegionClient';

        return new $klass($this->mergeArgs($namespace, $service, $args));
    }

    private function mergeArgs($namespace, array $manifest, array $args = [])
    {
        // Merge provided args with stored, service-specific args.
        if (isset($this->args[$namespace])) {
            $args += $this->args[$namespace];
        }

        // Provide the endpoint prefix in the args.
        if (!isset($args['service'])) {
            $args['service'] = $manifest['endpoint'];
        }

        return $args + $this->args;
    }

    /**
     * Determine the endpoint prefix from a client namespace.
     *
     * @param string $name Namespace name
     *
     * @return string
     * @internal
     * @deprecated Use the `\WP2Aws\manifest()` function instead.
     */
    public static function getEndpointPrefix($name)
    {
        return manifest($name)['endpoint'];
    }
}
