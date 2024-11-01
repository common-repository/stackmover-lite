<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

/**
 * Class to handle validation of AWS Keys.
 * Validation is limited to checking if list permissions are available on S3.
 * If an existing bucket is chosen, permissions are evaluated on that bucket.
 */

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';

class StackMover_KeysChecker {
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

        if (isset($params['aws_s3_region'])) {
            $aws_s3_region = $params['aws_s3_region'];
        }
        else {
            $aws_s3_region = 'us-east-1';
        }

    
        if (isset($params['access_key'])) {
            $access_key = $params['access_key'];
        }

        if (isset($params['secret_key'])) {
            $secret_key = $params['secret_key'];
        }

        if (isset($params['aws_preset_s3_bucket'])) {
            $aws_preset_s3_bucket = $params['aws_preset_s3_bucket'];
        }
        else {
            $aws_preset_s3_bucket = NULL;
        }

        $this->aws_preset_s3_bucket = $aws_preset_s3_bucket;

        try {
            $this->s3Client = new S3Client(array(
                'version' => $version,
                'region' => $aws_s3_region,
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

    public function hasExistingBucket() {

        return strlen($this->aws_preset_s3_bucket) > 0;

    }

    public function getExistingBucket() {

        return $this->aws_preset_s3_bucket;

    }

    public function getBuckets() {

        if ($this->hasExistingBucket()) {

            $output = array();
            $output['val'] = array(
                $this->getExistingBucket()
            );
            $output['status'] = 1;
            $output['log'] = '';

            return $output;
        }

        $output = array();

        try {

            $result = $this
                ->s3Client
                ->listBuckets();
            $s3Buckets = $result->search('Buckets[].Name');
            $output['val'] = $s3Buckets;
            $output['status'] = 1;
            $output['log'] = '';

            return $output;

        }
        catch(Exception $e) {

            $output['val'] = NULL;
            $output['status'] = 0;
            $output['log'] = $e->getMessage();

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return $output;
        }
    }

    public function canListPresetS3Obj() {

        $output = array();

        try {

            $bucket = $this->aws_preset_s3_bucket;
            $result = $this
                ->s3Client
                ->listObjects(array(
                'Bucket' => $bucket
            ));
            $s3Obj = array();

            foreach ($result['Contents'] as $object) {
                array_push($s3Obj, 'Found ' . $object['Key']);
            }

            $output['val'] = $s3Obj;
            $output['status'] = STACKMOVER_SUCCESS;
            $output['log'] = $result;

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

    public function canListS3Buckets() {

        $output = array();

        try {
            $result = $this
                ->s3Client
                ->listBuckets();

            $s3Buckets = $result->search('Buckets[].Name');
            $s3Names = $result->search('Buckets[].Name');

            $output['val'] = $s3Names;
            $output['status'] = STACKMOVER_SUCCESS;
            $output['log'] = $s3Names;

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

    /**
     * Main invoke to validate S3 access.
     *
     * If specific bucket is chosen, access is evaluated on it specifically.
     *
     * @return  bool
     */

    public function canAccessS3() {

        if ($this->hasExistingBucket()) {

            return $this->canListPresetS3Obj();

        }
        else {

            return $this->canListS3Buckets();
        }

    }

}

?>
