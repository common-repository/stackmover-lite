<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

/**
 * Class to find and cache list of all Availability Zones.
 * LightSail launch needs an AZ input.
 * A local cache (csv file) of all AZs is created first time during AWS Keys validation.
 */

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;
use WP2Aws\Common\Exception\MultipartUploadException;
use WP2Aws\S3\Model\MultipartUpload\UploadBuilder;
use WP2Aws\Ec2\Ec2Client;

class StackMover_EC2 {

    /**
     * Global parameters
     *
     * @var array
     */

    private $params;

    /**
     * Local cache file containing all the AZs available.
     *
     * @var string
     */

    static private $AZListfileCache = STACKMOVER_LOCALTMPDIR . '/' . 'myAZs' . '.csv';

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

        StackMover_FileUtil::ensureDirExists(StackMover_EC2::$AZListfileCache);

    }

    /**
     * Create a local file with Region:Availability zone mapping.
     * Each row in csv looks like below
     * us-east-1,us-east-1a,us-east-1b,us-east-1c,us-east-1d,us-east-1e,us-east-1f
     *
     * Input consists of array of region:[AZs] map in $availabilityZones
     * @param   array  $availabilityZones
     */

    public function cacheAZs($availabilityZones) {

        $file = StackMover_EC2::$AZListfileCache;

        if (file_exists($file)) {
            if (filesize($file) > 0) return;
        }

        try {

            foreach ($availabilityZones as $region => $AZs) {

                $csv = $region . ',' . implode(',', $AZs) . PHP_EOL;

                file_put_contents($file, $csv, FILE_APPEND | LOCK_EX);

            }

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            unlink($file);

        }

    }

    /**
     * Get Region:AZs mapping from local cache
     * Output consists of array of region:[AZs] map
     *
     * @return  mixed
     */

    public function getcachedAZMap() {

        $filename = StackMover_EC2::$AZListfileCache;

        try {

            if (!file_exists($filename)) {
                return NULL;
            }

            if (filesize($filename) == 0) return NULL;

            $availabilityZones = array();
            $csv = array_map('str_getcsv', file($filename));

            foreach ($csv as $line) {

                $region = $line[0];
                $availabilityZones[$region] = array();

                foreach ($line as $key => $value) {

                    if ($key == 0) continue;
                    array_push($availabilityZones[$region], $value);

                }
            }

            return $availabilityZones;

        }
        catch(Exception $e) {

            return NULL;

        }

    }

    /**
     * Main function to list all the AZs available to launch LightSail.
     * Output consists of array of region:[AZs] map
     *
     * If local file with Region:[AZs] map exist, result read from there.
     * Else describeAvailabilityZones is made for each region and cached.
     * @return  mixed
     */

    public function getLightSailAZs() {

        $regions = array(
            "us-east-1",
            "us-east-2",
            "us-west-2",
            "eu-central-1",
            "eu-west-1",
            "eu-west-2",
            "ap-south-1",
            "ap-southeast-1",
            "ap-southeast-2",
            "ap-northeast-1"
        );

        $availabilityZonesCached = $this->getcachedAZMap();
        if ($availabilityZonesCached != NULL) {

            return $availabilityZonesCached;

        }

        $availabilityZones = array();
        foreach ($regions as $region) {

            $ec2Client = new ec2Client(array(
                'version' => $this->version,
                'region' => $region,
                'credentials' => array(
                    'key' => $this->access_key,
                    'secret' => $this->secret_key
                )
            ));

            try {
                $result = $ec2Client->describeAvailabilityZones(['Filters' => [['Name' => 'region-name', 'Values' => [$region], ]]]);
                $availabilityZones[$region] = array();
                foreach ($result['AvailabilityZones'] as $data) {

                    $zone = $data['ZoneName'];
                    array_push($availabilityZones[$region], $zone);

                }

            }
            catch(Exception $e) {

                $logger = new StackMoverLogger();
                $logger->write_log($e->getMessage());

                return NULL;;

            }

        }

        $this->cacheAZs($availabilityZones); //only cache if first time
        return $availabilityZones;

    }

}

?>
