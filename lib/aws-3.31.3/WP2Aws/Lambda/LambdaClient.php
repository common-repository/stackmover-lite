<?php
namespace WP2Aws\Lambda;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with AWS Lambda
 *
 * @method \WP2Aws\Result addPermission(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addPermissionAsync(array $args = [])
 * @method \WP2Aws\Result createAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createAliasAsync(array $args = [])
 * @method \WP2Aws\Result createEventSourceMapping(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createEventSourceMappingAsync(array $args = [])
 * @method \WP2Aws\Result createFunction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createFunctionAsync(array $args = [])
 * @method \WP2Aws\Result deleteAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteAliasAsync(array $args = [])
 * @method \WP2Aws\Result deleteEventSourceMapping(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteEventSourceMappingAsync(array $args = [])
 * @method \WP2Aws\Result deleteFunction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteFunctionAsync(array $args = [])
 * @method \WP2Aws\Result getAccountSettings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \WP2Aws\Result getAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getAliasAsync(array $args = [])
 * @method \WP2Aws\Result getEventSourceMapping(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getEventSourceMappingAsync(array $args = [])
 * @method \WP2Aws\Result getFunction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getFunctionAsync(array $args = [])
 * @method \WP2Aws\Result getFunctionConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getFunctionConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getPolicy(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getPolicyAsync(array $args = [])
 * @method \WP2Aws\Result invoke(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise invokeAsync(array $args = [])
 * @method \WP2Aws\Result invokeAsync(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise invokeAsyncAsync(array $args = [])
 * @method \WP2Aws\Result listAliases(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listAliasesAsync(array $args = [])
 * @method \WP2Aws\Result listEventSourceMappings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listEventSourceMappingsAsync(array $args = [])
 * @method \WP2Aws\Result listFunctions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listFunctionsAsync(array $args = [])
 * @method \WP2Aws\Result listTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTagsAsync(array $args = [])
 * @method \WP2Aws\Result listVersionsByFunction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listVersionsByFunctionAsync(array $args = [])
 * @method \WP2Aws\Result publishVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise publishVersionAsync(array $args = [])
 * @method \WP2Aws\Result removePermission(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise removePermissionAsync(array $args = [])
 * @method \WP2Aws\Result tagResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise tagResourceAsync(array $args = [])
 * @method \WP2Aws\Result untagResource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise untagResourceAsync(array $args = [])
 * @method \WP2Aws\Result updateAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateAliasAsync(array $args = [])
 * @method \WP2Aws\Result updateEventSourceMapping(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateEventSourceMappingAsync(array $args = [])
 * @method \WP2Aws\Result updateFunctionCode(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateFunctionCodeAsync(array $args = [])
 * @method \WP2Aws\Result updateFunctionConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateFunctionConfigurationAsync(array $args = [])
 */
class LambdaClient extends WP2AwsClient {}
