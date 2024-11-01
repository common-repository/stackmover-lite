<?php
namespace WP2Aws\CodeCommit;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS CodeCommit** service.
 *
 * @method \WP2Aws\Result batchGetRepositories(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise batchGetRepositoriesAsync(array $args = [])
 * @method \WP2Aws\Result createBranch(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBranchAsync(array $args = [])
 * @method \WP2Aws\Result createRepository(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createRepositoryAsync(array $args = [])
 * @method \WP2Aws\Result deleteRepository(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRepositoryAsync(array $args = [])
 * @method \WP2Aws\Result getBlob(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBlobAsync(array $args = [])
 * @method \WP2Aws\Result getBranch(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBranchAsync(array $args = [])
 * @method \WP2Aws\Result getCommit(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getCommitAsync(array $args = [])
 * @method \WP2Aws\Result getDifferences(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDifferencesAsync(array $args = [])
 * @method \WP2Aws\Result getRepository(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRepositoryAsync(array $args = [])
 * @method \WP2Aws\Result getRepositoryTriggers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getRepositoryTriggersAsync(array $args = [])
 * @method \WP2Aws\Result listBranches(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listBranchesAsync(array $args = [])
 * @method \WP2Aws\Result listRepositories(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listRepositoriesAsync(array $args = [])
 * @method \WP2Aws\Result putRepositoryTriggers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putRepositoryTriggersAsync(array $args = [])
 * @method \WP2Aws\Result testRepositoryTriggers(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise testRepositoryTriggersAsync(array $args = [])
 * @method \WP2Aws\Result updateDefaultBranch(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDefaultBranchAsync(array $args = [])
 * @method \WP2Aws\Result updateRepositoryDescription(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateRepositoryDescriptionAsync(array $args = [])
 * @method \WP2Aws\Result updateRepositoryName(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateRepositoryNameAsync(array $args = [])
 */
class CodeCommitClient extends WP2AwsClient {}
