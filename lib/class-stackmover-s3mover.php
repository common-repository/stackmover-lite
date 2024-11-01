<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

use WP2Aws\Exception\AwsException;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;
use WP2Aws\S3\S3Client;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\S3\MultipartUploader;
use WP2Aws\Exception\MultipartUploadException;

class StackMover_S3PutOptions {

    private $params;

    public function __construct($params = array()) {

        if (isset($params['StorageClass'])) {
            $storageclass = $params['StorageClass'];
        }
        else {
            $storageclass = 'STANDARD_IA';
        }

        if (isset($params['ServerSideEncryption'])) {
            $sse = $params['ServerSideEncryption'];
        }
        else {
            $sse = 'AES256';
        }

        if (isset($params['UseServerSideEncryption'])) {
            $use_sse = $params['UseServerSideEncryption'];
        }
        else {
            $use_sse = false;
        }

        if (isset($params['ACL'])) {
            $acl = $params['ACL'];
        }
        else {
            $acl = 'authenticated-read';
        }

        if (isset($params['MinPartSize'])) {
            $minpartsize = $params['MinPartSize'];
        }
        else {
            $minpartsize = 1024 * 1024 * 8;
        }

        if (isset($params['Concurrency'])) {
            $concurrency = $params['Concurrency'];
        }
        else {
            $concurrency = 2;
        }

        $this->storageclass = $storageclass;
        $this->sse = $sse;
        $this->use_sse = $use_sse;
        $this->acl = $acl;
        $this->minpartsize = $minpartsize;
        $this->concurrency = $concurrency;

    }

}

class StackMover_S3Mover {

    private $params;
    public $s3Client;

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

        if (isset($params['use_cache'])) {
            $use_cache = $params['use_cache'];
        }
        else {
            $use_cache = true;
        }

        if (isset($params['backup_dir'])) {
            $backup_dir = $params['backup_dir'];
        }
        else {
            $backup_dir = '/backup/';
        }

        if (isset($params['tag'])) {
            $tag = $params['tag'];
        }
        else {
            $tag = '';
        }
        $this->tag = $tag;

        $this->verbose = $verbose;
        $this->version = $version;
        $this->region = $region;
        $this->access_key = $access_key;
        $this->secret_key = $secret_key;
        $this->use_cache = $use_cache;
        $this->backup_dir = $backup_dir;

        /* In general, when your object size reaches 100 MB,
         *  you should consider using multipart uploads instead of uploading the object
         *  in a single operation.
         *  Ref: http://docs.aws.amazon.com/AmazonS3/latest/dev/uploadobjusingmpu.html
        */

        $this->multipart_threshold = 100 * 1024 * 1024;

        $this->s3Client = new S3Client(array(
            'version' => $version,
            'region' => $region,
            'credentials' => array(
                'key' => $access_key,
                'secret' => $secret_key
            )
        ));

        $this->multipartChunkMB = 8;

    }

    public function doesObjectExist($bucket, $key) {

        return $this
            ->s3Client
            ->doesObjectExist($bucket, $key);

    }

    public function putFileMultipart($s3Client, $filename, $bucket, $keyname) {

        try {

            $result = $s3Client->createMultipartUpload(array(
                'Bucket' => $bucket,
                'Key' => $keyname,
            ));

            $uploadId = $result['UploadId'];

            $file = fopen($filename, 'r');
            $stat = fstat($file);
            $readMax = $stat['size'];
            $parts = array();
            $partNumber = 1;

            $partChunkMB = $this->multipartChunkMB;
            $partSize = $partChunkMB * 1024 * 1024;
            $numParts = ceil($readMax / $partSize);

            /* epoch. Number of seconds */
            $timeStart = time();

            while (!feof($file)) {

                /* run out of memory otherwise
                 *  Aggresive GC
                */

                gc_collect_cycles();

                if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

                    StackMover_GlobalMsgQ::setStatus('Interrupt signal received. Aborting multipart upload');
                    $result = $s3Client->abortMultipartUpload(array(
                        'Bucket' => $bucket,
                        'Key' => $keyname,
                        'UploadId' => $uploadId
                    ));

                    return false;

                }

                $readComplete = ftell($file);
                if ($readComplete == $readMax) break;

                $mbStart = ($partNumber - 1) * $partChunkMB;
                $mbEnd = $mbStart + $partChunkMB;

                $log = sprintf('Uploading part %s/%s [%sMB-%sMB] of %s', $partNumber, $numParts, $mbStart, $mbEnd, $filename);

                StackMover_GlobalMsgQ::setStatus($log);

                $partTimeStart = time();

                $result = $s3Client->uploadPart(array(
                    'Bucket' => $bucket,
                    'Key' => $keyname,
                    'UploadId' => $uploadId,
                    'PartNumber' => $partNumber,
                    'Body' => fread($file, $partSize)
                ));

                $partTime = time() - $partTimeStart;

                /* This is a rough estimate */
                $progress_perc = 6 + (44*$partNumber/$numParts);

                $log = sprintf('Completed uploading part %s/%s of %s in %ds', $partNumber, $numParts, $filename, $partTime);

                StackMover_GlobalMsgQ::setStatus($log,$progress_perc);

                $parts[] = array(
                    'PartNumber' => $partNumber++,
                    'ETag' => $result['ETag'],
                );

            }
            fclose($file);

        }
        catch(S3Exception $e) {
            $result = $s3Client->abortMultipartUpload(array(
                'Bucket' => $bucket,
                'Key' => $keyname,
                'UploadId' => $uploadId
            ));

            $log = sprintf("Upload of %s failed", $filename);
            StackMover_GlobalMsgQ::setStatus($log);

            return false;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return false;

        }

        // 4. Complete multipart upload.
        $result = $s3Client->completeMultipartUpload(array(
            'Bucket' => $bucket,
            'Key' => $keyname,
            'UploadId' => $uploadId,
            'MultipartUpload' => Array(
                'Parts' => $parts,
            )
        ));

        $timeEnd = time();
        $totalTime = $timeEnd - $timeStart;
        $fMB = $readMax / (1024 * 1024);
        $url = $result['Location'];

        $log = sprintf("Multipart upload complete! %s bytes uploaded in %s seconds to %s", $readMax, $totalTime, $url);

        StackMover_GlobalMsgQ::setStatus($log);

        return true;

    }

    /*
     **
     * Put a local file to S3
     * Honor put options (sse, ACL, Storage Class etc)
     * Return only after the file is fully uploaded and available
     * Not opioniated. Will simply put without checking if file exists already
     * Input: $filename, Output $s3bucket/$s3keyname
     * TODO: Check Multipart upload
    */

    public function putFile($s3bucket, $filename, $s3keyname, $put_options) {

        try {

            if (file_exists($filename)) {

                $fsize = filesize($filename);

                if ($fsize > $this->multipart_threshold) {

                    StackMover_GlobalMsgQ::setStatus('Uploading to S3 via multipart upload ' . $filename);
                    try {

                        $s3Client = $this->s3Client;
                        $result = $this->putFileMultipart($s3Client, $filename, $s3bucket, $s3keyname);

                        return $result;

                    }
                    catch(AwsException $e) {

                        StackMover_GlobalMsgQ::setStatus('FAIL: S3 multipart upload did not succeed. ' . $filename);

                        $logger = new StackMoverLogger();
                        $logger->write_log($e->getMessage());

                        return false;

                    }

                }
                else {

                    StackMover_GlobalMsgQ::setStatus('Uploading to S3  ' . $filename);

                    if ($put_options->use_sse) {

                        // Upload an object by streaming the contents of a file
                        // $pathToFile should be absolute path to a file on disk
                        $result = $this
                            ->s3Client
                            ->putObject(array(
                            'Bucket' => $s3bucket,
                            'Key' => $s3keyname,
                            'SourceFile' => $filename,
                            'ACL' => $put_options->acl,
                            'ServerSideEncryption' => $put_options->sse,
                            'StorageClass' => $put_options->storageclass,
                            'Metadata' => array(
                                'filemtime' => filemtime($filename)
                            )
                        ));

                        // We can poll the object until it is accessible
                        $client->waitUntil('ObjectExists', array(
                            'Bucket' => $s3bucket,
                            'Key' => $s3keyname,
                        ));

                    }
                    else {

                        // Do Not Use SSE
                        $result = $this
                            ->s3Client
                            ->putObject(array(
                            'Bucket' => $s3bucket,
                            'Key' => $s3keyname,
                            'SourceFile' => $filename,
                            'ACL' => $put_options->acl,
                            'StorageClass' => $put_options->storageclass,
                            'Metadata' => array(
                                'filemtime' => filemtime($filename)
                            )
                        ));

                        // We can poll the object until it is accessible
                        $this
                            ->s3Client
                            ->waitUntil('ObjectExists', array(
                            'Bucket' => $s3bucket,
                            'Key' => $s3keyname,
                        ));

                    }

                    return true;

                }

            }
            else {
                return false;
            }

            return true;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return false;
        }

    }

    public function dryRun($s3Bucket) {

        try {

            /* Not implemented */

            return true;

        }
        catch(S3Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return false;
        }
    }

}

?>
