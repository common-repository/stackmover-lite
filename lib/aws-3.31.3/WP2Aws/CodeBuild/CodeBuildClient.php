<?php
namespace WP2Aws\CodeBuild;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS CodeBuild** service.
 * @method \WP2Aws\Result batchGetBuilds(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetBuildsAsync(array $args = [])
 * @method \WP2Aws\Result batchGetProjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetProjectsAsync(array $args = [])
 * @method \WP2Aws\Result createProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createProjectAsync(array $args = [])
 * @method \WP2Aws\Result deleteProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteProjectAsync(array $args = [])
 * @method \WP2Aws\Result listBuilds(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBuildsAsync(array $args = [])
 * @method \WP2Aws\Result listBuildsForProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBuildsForProjectAsync(array $args = [])
 * @method \WP2Aws\Result listCuratedEnvironmentImages(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listCuratedEnvironmentImagesAsync(array $args = [])
 * @method \WP2Aws\Result listProjects(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listProjectsAsync(array $args = [])
 * @method \WP2Aws\Result startBuild(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startBuildAsync(array $args = [])
 * @method \WP2Aws\Result stopBuild(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopBuildAsync(array $args = [])
 * @method \WP2Aws\Result updateProject(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateProjectAsync(array $args = [])
 */
class CodeBuildClient extends WP2AwsClient {}
