<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';

/**
 * Class to create S3 bucket.
 * This assumes the AWS keys provided has privileges to create a new bucket.
 * If not, creation will error out.
 */

class StackMover_S3Creator {

    /**
     * Global parameters
     *
     * @var array
     */

    private $params;

    /**
     * s3Client created during init
     *
     * @var mixed
     */

    private $s3Client;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['version'])) {
            $version = $params['version'];
        }
        else {
            $version = 'latest';
        }

        if (isset($params['region'])) {
            $region = $params['region'];
        }
        else {
            $region = 'us-east-1';
        }

        if (isset($params['access_key'])) {
            $access_key = $params['access_key'];
        }

        if (isset($params['secret_key'])) {
            $secret_key = $params['secret_key'];
        }

        try {
            $this->s3Client = new S3Client(array(
                'version' => $version,
                'region' => $region,
                'credentials' => array(
                    'key' => $access_key,
                    'secret' => $secret_key
                )
            ));
        }
        catch(Exception $e) {

            $this->s3Client = NULL;

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

        }

    }

    /**
     * Create a new S3 bucket in the specified region.
     *
     * If there is failure, log messages are sent back.
     * @param   string  $bucketname
     * @param   string  $region
     * @return  mixed
     */

    public function createS3($bucketname, $region) {

        $output = array();

        try {

            $result = $this
                ->s3Client
                ->createBucket(['Bucket' => $bucketname]);

            $output['val'] = join('Created ', $bucketname);
            $output['status'] = STACKMOVER_SUCCESS;
            $output['log'] = join('Created ', $bucketname);

            return $output;

        }
        catch(Exception $e) {

            $output['val'] = NULL;
            $output['status'] = STACKMOVER_FAILURE;
            $output['log'] = $e->getMessage();

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return $output;
        }
    }

}

?>
