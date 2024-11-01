<?php
namespace WP2Aws\WorkSpaces;

use WP2Aws\WP2AwsClient;

/**
 * Amazon WorkSpaces client.
 *
 * @method \WP2Aws\Result createTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \WP2Aws\Result createWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result deleteTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \WP2Aws\Result describeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \WP2Aws\Result describeWorkspaceBundles(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeWorkspaceBundlesAsync(array $args = [])
 * @method \WP2Aws\Result describeWorkspaceDirectories(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeWorkspaceDirectoriesAsync(array $args = [])
 * @method \WP2Aws\Result describeWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result describeWorkspacesConnectionStatus(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeWorkspacesConnectionStatusAsync(array $args = [])
 * @method \WP2Aws\Result modifyWorkspaceProperties(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyWorkspacePropertiesAsync(array $args = [])
 * @method \WP2Aws\Result rebootWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise rebootWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result rebuildWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise rebuildWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result startWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result stopWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopWorkspacesAsync(array $args = [])
 * @method \WP2Aws\Result terminateWorkspaces(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise terminateWorkspacesAsync(array $args = [])
 */
class WorkSpacesClient extends WP2AwsClient {}
