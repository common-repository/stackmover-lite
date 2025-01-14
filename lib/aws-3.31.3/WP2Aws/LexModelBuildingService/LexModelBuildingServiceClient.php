<?php
namespace WP2Aws\LexModelBuildingService;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon Lex Model Building Service** service.
 * @method \WP2Aws\Result createBotVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBotVersionAsync(array $args = [])
 * @method \WP2Aws\Result createIntentVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createIntentVersionAsync(array $args = [])
 * @method \WP2Aws\Result createSlotTypeVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSlotTypeVersionAsync(array $args = [])
 * @method \WP2Aws\Result deleteBot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBotAsync(array $args = [])
 * @method \WP2Aws\Result deleteBotAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBotAliasAsync(array $args = [])
 * @method \WP2Aws\Result deleteBotChannelAssociation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBotChannelAssociationAsync(array $args = [])
 * @method \WP2Aws\Result deleteBotVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBotVersionAsync(array $args = [])
 * @method \WP2Aws\Result deleteIntent(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIntentAsync(array $args = [])
 * @method \WP2Aws\Result deleteIntentVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteIntentVersionAsync(array $args = [])
 * @method \WP2Aws\Result deleteSlotType(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSlotTypeAsync(array $args = [])
 * @method \WP2Aws\Result deleteSlotTypeVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSlotTypeVersionAsync(array $args = [])
 * @method \WP2Aws\Result deleteUtterances(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteUtterancesAsync(array $args = [])
 * @method \WP2Aws\Result getBot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotAsync(array $args = [])
 * @method \WP2Aws\Result getBotAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotAliasAsync(array $args = [])
 * @method \WP2Aws\Result getBotAliases(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotAliasesAsync(array $args = [])
 * @method \WP2Aws\Result getBotChannelAssociation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotChannelAssociationAsync(array $args = [])
 * @method \WP2Aws\Result getBotChannelAssociations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotChannelAssociationsAsync(array $args = [])
 * @method \WP2Aws\Result getBotVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotVersionsAsync(array $args = [])
 * @method \WP2Aws\Result getBots(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBotsAsync(array $args = [])
 * @method \WP2Aws\Result getBuiltinIntent(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBuiltinIntentAsync(array $args = [])
 * @method \WP2Aws\Result getBuiltinIntents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBuiltinIntentsAsync(array $args = [])
 * @method \WP2Aws\Result getBuiltinSlotTypes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBuiltinSlotTypesAsync(array $args = [])
 * @method \WP2Aws\Result getIntent(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIntentAsync(array $args = [])
 * @method \WP2Aws\Result getIntentVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIntentVersionsAsync(array $args = [])
 * @method \WP2Aws\Result getIntents(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getIntentsAsync(array $args = [])
 * @method \WP2Aws\Result getSlotType(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSlotTypeAsync(array $args = [])
 * @method \WP2Aws\Result getSlotTypeVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSlotTypeVersionsAsync(array $args = [])
 * @method \WP2Aws\Result getSlotTypes(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSlotTypesAsync(array $args = [])
 * @method \WP2Aws\Result getUtterancesView(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getUtterancesViewAsync(array $args = [])
 * @method \WP2Aws\Result putBot(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBotAsync(array $args = [])
 * @method \WP2Aws\Result putBotAlias(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putBotAliasAsync(array $args = [])
 * @method \WP2Aws\Result putIntent(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putIntentAsync(array $args = [])
 * @method \WP2Aws\Result putSlotType(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putSlotTypeAsync(array $args = [])
 */
class LexModelBuildingServiceClient extends WP2AwsClient {}
