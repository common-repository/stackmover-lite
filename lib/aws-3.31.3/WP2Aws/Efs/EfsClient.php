<?php
namespace WP2Aws\Efs;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with **Amazon EFS**.
 *
 * @method \WP2Aws\Result createFileSystem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createFileSystemAsync(array $args = [])
 * @method \WP2Aws\Result createMountTarget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createMountTargetAsync(array $args = [])
 * @method \WP2Aws\Result createTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createTagsAsync(array $args = [])
 * @method \WP2Aws\Result deleteFileSystem(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteFileSystemAsync(array $args = [])
 * @method \WP2Aws\Result deleteMountTarget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteMountTargetAsync(array $args = [])
 * @method \WP2Aws\Result deleteTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \WP2Aws\Result describeFileSystems(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeFileSystemsAsync(array $args = [])
 * @method \WP2Aws\Result describeMountTargetSecurityGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeMountTargetSecurityGroupsAsync(array $args = [])
 * @method \WP2Aws\Result describeMountTargets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeMountTargetsAsync(array $args = [])
 * @method \WP2Aws\Result describeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \WP2Aws\Result modifyMountTargetSecurityGroups(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise modifyMountTargetSecurityGroupsAsync(array $args = [])
 */
class EfsClient extends WP2AwsClient {}
