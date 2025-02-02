<?php
namespace WP2Aws\Greengrass;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Greengrass** service.
 * @method \WP2Aws\Result associateRoleToGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateRoleToGroupAsync(array $args = [])
 * @method \WP2Aws\Result associateServiceRoleToAccount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise associateServiceRoleToAccountAsync(array $args = [])
 * @method \WP2Aws\Result createCoreDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCoreDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result createCoreDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createCoreDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result createDeployment(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDeploymentAsync(array $args = [])
 * @method \WP2Aws\Result createDeviceDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDeviceDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result createDeviceDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDeviceDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result createFunctionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createFunctionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result createFunctionDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createFunctionDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result createGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createGroupAsync(array $args = [])
 * @method \WP2Aws\Result createGroupCertificateAuthority(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createGroupCertificateAuthorityAsync(array $args = [])
 * @method \WP2Aws\Result createGroupVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createGroupVersionAsync(array $args = [])
 * @method \WP2Aws\Result createLoggerDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createLoggerDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result createLoggerDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createLoggerDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result createSubscriptionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSubscriptionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result createSubscriptionDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSubscriptionDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result deleteCoreDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteCoreDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result deleteDeviceDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDeviceDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result deleteFunctionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteFunctionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result deleteGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteGroupAsync(array $args = [])
 * @method \WP2Aws\Result deleteLoggerDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteLoggerDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result deleteSubscriptionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSubscriptionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result disassociateRoleFromGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateRoleFromGroupAsync(array $args = [])
 * @method \WP2Aws\Result disassociateServiceRoleFromAccount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disassociateServiceRoleFromAccountAsync(array $args = [])
 * @method \WP2Aws\Result getAssociatedRole(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getAssociatedRoleAsync(array $args = [])
 * @method \WP2Aws\Result getConnectivityInfo(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getConnectivityInfoAsync(array $args = [])
 * @method \WP2Aws\Result getCoreDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCoreDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result getCoreDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCoreDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result getDeploymentStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDeploymentStatusAsync(array $args = [])
 * @method \WP2Aws\Result getDeviceDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDeviceDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result getDeviceDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDeviceDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result getFunctionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getFunctionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result getFunctionDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getFunctionDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result getGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getGroupAsync(array $args = [])
 * @method \WP2Aws\Result getGroupCertificateAuthority(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getGroupCertificateAuthorityAsync(array $args = [])
 * @method \WP2Aws\Result getGroupCertificateConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getGroupCertificateConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result getGroupVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getGroupVersionAsync(array $args = [])
 * @method \WP2Aws\Result getLoggerDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getLoggerDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result getLoggerDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getLoggerDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result getServiceRoleForAccount(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getServiceRoleForAccountAsync(array $args = [])
 * @method \WP2Aws\Result getSubscriptionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSubscriptionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result getSubscriptionDefinitionVersion(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSubscriptionDefinitionVersionAsync(array $args = [])
 * @method \WP2Aws\Result listCoreDefinitionVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCoreDefinitionVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listCoreDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCoreDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result listDeployments(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDeploymentsAsync(array $args = [])
 * @method \WP2Aws\Result listDeviceDefinitionVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDeviceDefinitionVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listDeviceDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDeviceDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result listFunctionDefinitionVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listFunctionDefinitionVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listFunctionDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listFunctionDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result listGroupCertificateAuthorities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listGroupCertificateAuthoritiesAsync(array $args = [])
 * @method \WP2Aws\Result listGroupVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listGroupVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listGroupsAsync(array $args = [])
 * @method \WP2Aws\Result listLoggerDefinitionVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listLoggerDefinitionVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listLoggerDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listLoggerDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result listSubscriptionDefinitionVersions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listSubscriptionDefinitionVersionsAsync(array $args = [])
 * @method \WP2Aws\Result listSubscriptionDefinitions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listSubscriptionDefinitionsAsync(array $args = [])
 * @method \WP2Aws\Result updateConnectivityInfo(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateConnectivityInfoAsync(array $args = [])
 * @method \WP2Aws\Result updateCoreDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateCoreDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result updateDeviceDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDeviceDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result updateFunctionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateFunctionDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result updateGroup(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateGroupAsync(array $args = [])
 * @method \WP2Aws\Result updateGroupCertificateConfiguration(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateGroupCertificateConfigurationAsync(array $args = [])
 * @method \WP2Aws\Result updateLoggerDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateLoggerDefinitionAsync(array $args = [])
 * @method \WP2Aws\Result updateSubscriptionDefinition(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateSubscriptionDefinitionAsync(array $args = [])
 */
class GreengrassClient extends WP2AwsClient {}
