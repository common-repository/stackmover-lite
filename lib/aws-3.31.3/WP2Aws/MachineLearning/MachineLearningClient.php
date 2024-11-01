<?php
namespace WP2Aws\MachineLearning;

use WP2Aws\WP2AwsClient;
use WP2Aws\CommandInterface;
use WP2GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * Amazon Machine Learning client.
 *
 * @method \WP2Aws\Result addTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise addTagsAsync(array $args = [])
 * @method \WP2Aws\Result createBatchPrediction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createBatchPredictionAsync(array $args = [])
 * @method \WP2Aws\Result createDataSourceFromRDS(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDataSourceFromRDSAsync(array $args = [])
 * @method \WP2Aws\Result createDataSourceFromRedshift(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDataSourceFromRedshiftAsync(array $args = [])
 * @method \WP2Aws\Result createDataSourceFromS3(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createDataSourceFromS3Async(array $args = [])
 * @method \WP2Aws\Result createEvaluation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createEvaluationAsync(array $args = [])
 * @method \WP2Aws\Result createMLModel(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createMLModelAsync(array $args = [])
 * @method \WP2Aws\Result createRealtimeEndpoint(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise createRealtimeEndpointAsync(array $args = [])
 * @method \WP2Aws\Result deleteBatchPrediction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteBatchPredictionAsync(array $args = [])
 * @method \WP2Aws\Result deleteDataSource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteDataSourceAsync(array $args = [])
 * @method \WP2Aws\Result deleteEvaluation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteEvaluationAsync(array $args = [])
 * @method \WP2Aws\Result deleteMLModel(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteMLModelAsync(array $args = [])
 * @method \WP2Aws\Result deleteRealtimeEndpoint(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteRealtimeEndpointAsync(array $args = [])
 * @method \WP2Aws\Result deleteTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise deleteTagsAsync(array $args = [])
 * @method \WP2Aws\Result describeBatchPredictions(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeBatchPredictionsAsync(array $args = [])
 * @method \WP2Aws\Result describeDataSources(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeDataSourcesAsync(array $args = [])
 * @method \WP2Aws\Result describeEvaluations(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeEvaluationsAsync(array $args = [])
 * @method \WP2Aws\Result describeMLModels(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeMLModelsAsync(array $args = [])
 * @method \WP2Aws\Result describeTags(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise describeTagsAsync(array $args = [])
 * @method \WP2Aws\Result getBatchPrediction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getBatchPredictionAsync(array $args = [])
 * @method \WP2Aws\Result getDataSource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getDataSourceAsync(array $args = [])
 * @method \WP2Aws\Result getEvaluation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getEvaluationAsync(array $args = [])
 * @method \WP2Aws\Result getMLModel(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise getMLModelAsync(array $args = [])
 * @method \WP2Aws\Result predict(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise predictAsync(array $args = [])
 * @method \WP2Aws\Result updateBatchPrediction(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateBatchPredictionAsync(array $args = [])
 * @method \WP2Aws\Result updateDataSource(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateDataSourceAsync(array $args = [])
 * @method \WP2Aws\Result updateEvaluation(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateEvaluationAsync(array $args = [])
 * @method \WP2Aws\Result updateMLModel(array $args = [])
 * @method \WP2GuzzleHttp\Promise\Promise updateMLModelAsync(array $args = [])
 */
class MachineLearningClient extends WP2AwsClient
{
    public function __construct(array $config)
    {
        parent::__construct($config);
        $list = $this->getHandlerList();
        $list->appendBuild($this->predictEndpoint(), 'ml.predict_endpoint');
    }

    /**
     * Changes the endpoint of the Predict operation to the provided endpoint.
     *
     * @return callable
     */
    private function predictEndpoint()
    {
        return static function (callable $handler) {
            return function (
                CommandInterface $command,
                RequestInterface $request = null
            ) use ($handler) {
                if ($command->getName() === 'Predict') {
                    $request = $request->withUri(new Uri($command['PredictEndpoint']));
                }
                return $handler($command, $request);
            };
        };
    }
}
