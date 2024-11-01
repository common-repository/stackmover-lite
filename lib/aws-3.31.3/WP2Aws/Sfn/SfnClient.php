<?php
namespace WP2Aws\Sfn;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Step Functions** service.
 * @method \WP2Aws\Result createActivity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createActivityAsync(array $args = [])
 * @method \WP2Aws\Result createStateMachine(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createStateMachineAsync(array $args = [])
 * @method \WP2Aws\Result deleteActivity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteActivityAsync(array $args = [])
 * @method \WP2Aws\Result deleteStateMachine(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteStateMachineAsync(array $args = [])
 * @method \WP2Aws\Result describeActivity(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeActivityAsync(array $args = [])
 * @method \WP2Aws\Result describeExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeExecutionAsync(array $args = [])
 * @method \WP2Aws\Result describeStateMachine(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeStateMachineAsync(array $args = [])
 * @method \WP2Aws\Result getActivityTask(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getActivityTaskAsync(array $args = [])
 * @method \WP2Aws\Result getExecutionHistory(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getExecutionHistoryAsync(array $args = [])
 * @method \WP2Aws\Result listActivities(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listActivitiesAsync(array $args = [])
 * @method \WP2Aws\Result listExecutions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listExecutionsAsync(array $args = [])
 * @method \WP2Aws\Result listStateMachines(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listStateMachinesAsync(array $args = [])
 * @method \WP2Aws\Result sendTaskFailure(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendTaskFailureAsync(array $args = [])
 * @method \WP2Aws\Result sendTaskHeartbeat(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendTaskHeartbeatAsync(array $args = [])
 * @method \WP2Aws\Result sendTaskSuccess(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise sendTaskSuccessAsync(array $args = [])
 * @method \WP2Aws\Result startExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise startExecutionAsync(array $args = [])
 * @method \WP2Aws\Result stopExecution(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise stopExecutionAsync(array $args = [])
 */
class SfnClient extends WP2AwsClient {}
