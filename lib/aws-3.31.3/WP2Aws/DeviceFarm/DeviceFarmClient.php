<?php
namespace WP2Aws\DeviceFarm;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon DeviceFarm** service.
 *
 * @method \WP2Aws\Result createDevicePool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDevicePoolAsync(array $args = [])
 * @method \WP2Aws\Result createNetworkProfile(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createNetworkProfileAsync(array $args = [])
 * @method \WP2Aws\Result createProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @method \WP2Aws\Result createRemoteAccessSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createRemoteAccessSessionAsync(array $args = [])
 * @method \WP2Aws\Result createUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createUploadAsync(array $args = [])
 * @method \WP2Aws\Result deleteDevicePool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDevicePoolAsync(array $args = [])
 * @method \WP2Aws\Result deleteNetworkProfile(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteNetworkProfileAsync(array $args = [])
 * @method \WP2Aws\Result deleteProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @method \WP2Aws\Result deleteRemoteAccessSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRemoteAccessSessionAsync(array $args = [])
 * @method \WP2Aws\Result deleteRun(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRunAsync(array $args = [])
 * @method \WP2Aws\Result deleteUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteUploadAsync(array $args = [])
 * @method \WP2Aws\Result getAccountSettings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getAccountSettingsAsync(array $args = [])
 * @method \WP2Aws\Result getDevice(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDeviceAsync(array $args = [])
 * @method \WP2Aws\Result getDevicePool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDevicePoolAsync(array $args = [])
 * @method \WP2Aws\Result getDevicePoolCompatibility(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDevicePoolCompatibilityAsync(array $args = [])
 * @method \WP2Aws\Result getJob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getJobAsync(array $args = [])
 * @method \WP2Aws\Result getNetworkProfile(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getNetworkProfileAsync(array $args = [])
 * @method \WP2Aws\Result getOfferingStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getOfferingStatusAsync(array $args = [])
 * @method \WP2Aws\Result getProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getProjectAsync(array $args = [])
 * @method \WP2Aws\Result getRemoteAccessSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRemoteAccessSessionAsync(array $args = [])
 * @method \WP2Aws\Result getRun(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRunAsync(array $args = [])
 * @method \WP2Aws\Result getSuite(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getSuiteAsync(array $args = [])
 * @method \WP2Aws\Result getTest(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getTestAsync(array $args = [])
 * @method \WP2Aws\Result getUpload(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getUploadAsync(array $args = [])
 * @method \WP2Aws\Result installToRemoteAccessSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise installToRemoteAccessSessionAsync(array $args = [])
 * @method \WP2Aws\Result listArtifacts(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listArtifactsAsync(array $args = [])
 * @method \WP2Aws\Result listDevicePools(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDevicePoolsAsync(array $args = [])
 * @method \WP2Aws\Result listDevices(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDevicesAsync(array $args = [])
 * @method \WP2Aws\Result listJobs(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listJobsAsync(array $args = [])
 * @method \WP2Aws\Result listNetworkProfiles(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listNetworkProfilesAsync(array $args = [])
 * @method \WP2Aws\Result listOfferingPromotions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listOfferingPromotionsAsync(array $args = [])
 * @method \WP2Aws\Result listOfferingTransactions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listOfferingTransactionsAsync(array $args = [])
 * @method \WP2Aws\Result listOfferings(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listOfferingsAsync(array $args = [])
 * @method \WP2Aws\Result listProjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @method \WP2Aws\Result listRemoteAccessSessions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRemoteAccessSessionsAsync(array $args = [])
 * @method \WP2Aws\Result listRuns(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRunsAsync(array $args = [])
 * @method \WP2Aws\Result listSamples(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listSamplesAsync(array $args = [])
 * @method \WP2Aws\Result listSuites(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listSuitesAsync(array $args = [])
 * @method \WP2Aws\Result listTests(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listTestsAsync(array $args = [])
 * @method \WP2Aws\Result listUniqueProblems(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listUniqueProblemsAsync(array $args = [])
 * @method \WP2Aws\Result listUploads(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listUploadsAsync(array $args = [])
 * @method \WP2Aws\Result purchaseOffering(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise purchaseOfferingAsync(array $args = [])
 * @method \WP2Aws\Result renewOffering(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise renewOfferingAsync(array $args = [])
 * @method \WP2Aws\Result scheduleRun(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise scheduleRunAsync(array $args = [])
 * @method \WP2Aws\Result stopRemoteAccessSession(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopRemoteAccessSessionAsync(array $args = [])
 * @method \WP2Aws\Result stopRun(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopRunAsync(array $args = [])
 * @method \WP2Aws\Result updateDevicePool(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDevicePoolAsync(array $args = [])
 * @method \WP2Aws\Result updateNetworkProfile(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateNetworkProfileAsync(array $args = [])
 * @method \WP2Aws\Result updateProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 */
class DeviceFarmClient extends WP2AwsClient {}