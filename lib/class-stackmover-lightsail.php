<?php

if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;
use WP2Aws\Common\Exception\MultipartUploadException;
use WP2Aws\S3\Model\MultipartUpload\UploadBuilder;
use WP2Aws\Ec2\Ec2Client;

class StackMover_LightSail {

    private $params;

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
        else {
            $access_key = '';
        }

        if (isset($params['secret_key'])) {
            $secret_key = $params['secret_key'];
        }
        else {
            $secret_key = '';
        }

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 0;
        }

        $this->verbose = $verbose;
        $this->version = $version;
        $this->region = $region;
        $this->access_key = $access_key;
        $this->secret_key = $secret_key;

        $this->availabilityZone = $params['availabilityZone'];
        $this->blueprintId = $params['blueprintId'];
        $this->bundleId = $params['bundleId'];

        if (isset($params['instanceNames'])) {
            $this->instanceNames = array(
                $params['instanceNames']
            );
        }
        else {
            $this->instanceNames = array(
                'stackmover-mover'
            );
        }

        if (isset($params['userData'])) {
            $this->userData = $params['userData'];
        }
        else {
            $this->userData = '';
        }

    }

    public function getInstanceDetails($instance_name) {

        try {

            $region = $this->getRegionfromAZ($this->availabilityZone);

            $lightSailClient = new LightsailClient(array(
                'version' => $this->version,
                'region' => $region,
                'credentials' => array(
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                )
            ));

            $result = $lightSailClient->getInstance(['instanceName' => $instance_name]);

            return $result['instance'];

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }

    }

    public function findCurrentInstances() {

        try {

            $region = $this->getRegionfromAZ($this->availabilityZone);

            $lightSailClient = new LightsailClient(array(
                'version' => $this->version,
                'region' => $region,
                'credentials' => array(
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                )
            ));

            $instanceNames = array();

            $result = $lightSailClient->getInstances();
            $instances = $result['instances'];


            foreach ($instances as $value) {

                array_push($instanceNames,$value['name']);

            }

            $nextPageToken = $result['nextPageToken'];

            while ($nextPageToken != NULL) {

                $result = $lightSailClient->getInstances(['pageToken' => $nextPageToken]);

                $instances = $result['instances'];
                foreach ($instances as $value) {
                    array_push($instanceNames,$value['name']);
                }
                $nextPageToken = $result['nextPageToken'];
            }

           
            $output = array();
            $output['val'] = $instanceNames;
            $output['status'] = STACKMOVER_SUCCESS;

            return $output;



        } catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            $output = array();
            $output['val'] = array();
            $output['status'] = STACKMOVER_FAILURE;

            StackMover_GlobalMsgQ::setStatus('Could not list LightSail instances.');

            return $output;

        }




    }

    public function getInstancepublicIpAddress($instance_name) {

        try {

            $result = $this->getInstanceDetails($instance_name);

            if ($result != NULL) {

                return $result['publicIpAddress'];

            }
            else {

                return NULL;
            }

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }

    }

    public function getRegionfromAZ($availabilityZone) {

        $regions = array("ap-south-1","eu-west-2","eu-west-1","ap-northeast-2", "ap-northeast-1","sa-east-1","ca-central-1","ap-southeast-1","ap-southeast-2","eu-central-1","us-east-1", 
            "us-east-2","us-west-1","us-west-2");

        foreach ($regions as $region) {

            if (strpos($availabilityZone, $region ) !== false) {
                return $region;
            }

        }

        return 'us-east-1';

    }

    public function createInstances($userData) {

        try {

            if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

            $region = $this->getRegionfromAZ($this->availabilityZone);

            $lightSailClient = new LightsailClient(array(
                'version' => $this->version,
                'region' => $region,
                'credentials' => array(
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                )
            ));

            $result = $lightSailClient->createInstances(['availabilityZone' => $this->availabilityZone, 'blueprintId' => $this->blueprintId, 'bundleId' => $this->bundleId, 'instanceNames' => $this->instanceNames, 'userData' => $userData]);

            $output = array();
            $output['val'] = var_export($result, true);
            $output['status'] = STACKMOVER_SUCCESS;

            return $output;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            $output = array();
            $output['val'] = $e->getMessage();
            $output['status'] = STACKMOVER_FAILURE;

            StackMover_GlobalMsgQ::setStatus('Lightsail launch failed');

            return $output;

        }

    }

}

?>
