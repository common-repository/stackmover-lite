<?php
namespace WP2Aws\CloudWatch;

use WP2Aws\WP2AwsClient;

/**
 * This client is used to interact with the **Amazon CloudWatch** service.
 *
 * @method \WP2Aws\Result deleteAlarms(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteAlarmsAsync(array $args = [])
 * @method \WP2Aws\Result deleteDashboards(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDashboardsAsync(array $args = [])
 * @method \WP2Aws\Result describeAlarmHistory(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAlarmHistoryAsync(array $args = [])
 * @method \WP2Aws\Result describeAlarms(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAlarmsAsync(array $args = [])
 * @method \WP2Aws\Result describeAlarmsForMetric(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeAlarmsForMetricAsync(array $args = [])
 * @method \WP2Aws\Result disableAlarmActions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise disableAlarmActionsAsync(array $args = [])
 * @method \WP2Aws\Result enableAlarmActions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise enableAlarmActionsAsync(array $args = [])
 * @method \WP2Aws\Result getDashboard(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDashboardAsync(array $args = [])
 * @method \WP2Aws\Result getMetricStatistics(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getMetricStatisticsAsync(array $args = [])
 * @method \WP2Aws\Result listDashboards(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listDashboardsAsync(array $args = [])
 * @method \WP2Aws\Result listMetrics(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise listMetricsAsync(array $args = [])
 * @method \WP2Aws\Result putDashboard(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putDashboardAsync(array $args = [])
 * @method \WP2Aws\Result putMetricAlarm(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putMetricAlarmAsync(array $args = [])
 * @method \WP2Aws\Result putMetricData(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise putMetricDataAsync(array $args = [])
 * @method \WP2Aws\Result setAlarmState(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise setAlarmStateAsync(array $args = [])
 */
class CloudWatchClient extends WP2AwsClient {}
