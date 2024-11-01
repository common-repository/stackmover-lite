<?php
namespace WP2Aws\Budgets;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **AWS Budgets** service.
 * @method \WP2Aws\Result createBudget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBudgetAsync(array $args = [])
 * @method \WP2Aws\Result createNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createNotificationAsync(array $args = [])
 * @method \WP2Aws\Result createSubscriber(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createSubscriberAsync(array $args = [])
 * @method \WP2Aws\Result deleteBudget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBudgetAsync(array $args = [])
 * @method \WP2Aws\Result deleteNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteNotificationAsync(array $args = [])
 * @method \WP2Aws\Result deleteSubscriber(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteSubscriberAsync(array $args = [])
 * @method \WP2Aws\Result describeBudget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeBudgetAsync(array $args = [])
 * @method \WP2Aws\Result describeBudgets(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeBudgetsAsync(array $args = [])
 * @method \WP2Aws\Result describeNotificationsForBudget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeNotificationsForBudgetAsync(array $args = [])
 * @method \WP2Aws\Result describeSubscribersForNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeSubscribersForNotificationAsync(array $args = [])
 * @method \WP2Aws\Result updateBudget(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateBudgetAsync(array $args = [])
 * @method \WP2Aws\Result updateNotification(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateNotificationAsync(array $args = [])
 * @method \WP2Aws\Result updateSubscriber(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateSubscriberAsync(array $args = [])
 */
class BudgetsClient extends WP2AwsClient {}
