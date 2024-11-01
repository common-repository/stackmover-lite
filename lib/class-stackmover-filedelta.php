<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;

/**
 * Main class to support incremental delta.
 * Incremental update works by isolating files that have changed since last s3 upload.
 * First most recent successful backup object from S3 is found.
 * The metadata file from recent S3 backup is downloaded to a $local_metadata_file.
 * Local dir is scanned and compared with what already exists in the S3 backup.
 * File sameness is done by comparing last_mod, filesize of each file.
 * Note filenames are evaluated from wp-content/{$path}.
 * Net new files are established and results sent back to invoker.
 */

class StackMover_FileDelta {
    /**
     * Global parameters
     *
     * @var array
     */

    private $params;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 0;
        }

        $this->verbose = $verbose;

    }

    /**
     * Split csv row into pieces.
     */
    public function get_index2colname($header) {

        $index2col = array();
        $pieces = explode(",", $header);

        return $pieces;

    }

    /**
     * Generate name to index map from csv header.
     */

    public function get_colname2index($header) {

        $colname2index = array();
        $pieces = explode(",", $header);

        $index = 0;
        foreach ($pieces as $colname) {

            $colname2index[$colname] = $index;
            $index = $index + 1;

        }

        return $colname2index;

    }

    public function parse_line($line, $index2col) {

        $data = array();
        $pieces = explode(",", $line);

        return $pieces;

    }

    /**
     * Parse the metadata of most recent backup in S3.
     *
     * $local_metadata_file is the metadata of most recent backup downloaded locally.
     * Metadata file is in the folowing format:
     * filename,uncompressed_len,compressed_len,lastmod,content_path,offset
     * /home/wordpress/wp-content/wp-content/plugins/index.php,10244,1224,1505105829,wp-content/plugins/index.php,919
     *
     *
     * $parsed is the output of metadata file parser.
     * $parsed[$content_path] = {'filename' => '/home/wordpress/wp-content/wp-content/plugins/index.php', 'uncompressed_len' => 10244,...}
     *
     * @param   string  $local_metadata_file
     * @return  array
     */

    public function parse_metadata_file($local_metadata_file) {

        $file = fopen($local_metadata_file, "r");

        $parsed = array();

        if ($file != NULL) {

            $header = fgets($file);

            /* When reading a file using fgets() it will include the newline at the end. */

            $header = trim($header);

            $index2col = $this->get_index2colname($header);
            $colname2index = $this->get_colname2index($header);

            while (!feof($file)) {

                $line = fgets($file);
                $data = $this->parse_line($line, $index2col);

                if (sizeof($data) > 4) {
                    $cpindex = $colname2index['content_path'];
                    $content_path = $data[$cpindex];

                    $named_data = array();

                    foreach ($colname2index as $colname => $index) {
                        $named_data[$colname] = $data[$index];
                    }

                    $parsed[$content_path] = $named_data;

                }

            }
            fclose($file);

        }

        return $parsed;

    }

    /**
     * Check if a given local file already exists in the most recent backup or not.
     *
     * $s3_cache_metadata is the output of metadata parser above.
     * Parse is a map of $wpcontent-path to $data from corresponding row
     * First extract the subpath of wp-content from local file.
     * The compare filesize and filemode data of what's already cached in S3.
     * If they are different, then file isn't cached.
     *
     * NOTE: One drawback with this approach is that, if the most recent backup does not
     * contain a file, but a previous backup did - We will claim it is NOT in the cache.
     * @param   string  $local_file_full_path
     * @param   array  $s3_cache_metadata
     * @return  bool
     */

    public function is_file_cached($local_file_full_path, $s3_cache_metadata) {

        try {

            $local_file_partial_path = StackMover_ParseBackupS3Names::str_replace_once(WP_CONTENT_DIR, 'wp-content', $local_file_full_path);

            if (array_key_exists($local_file_partial_path, $s3_cache_metadata) == false) {

                //error_log(print_r($local_file_partial_path . ' UNCACHED_NEWFILE',true));
                return false;
            }

            $s3_file_cache_data = $s3_cache_metadata[$local_file_partial_path];

            $cache_lastmod = $s3_file_cache_data['lastmod'];
            $current_lastmod = filemtime($local_file_full_path);
            if ($cache_lastmod != $current_lastmod) {

                //error_log(print_r($local_file_partial_path . ' UNCACHED_LASTMOD!!',true));
                return false;

            }

            $cache_filesize = $s3_file_cache_data['uncompressed_len'];
            $current_filesize = filesize($local_file_full_path);
            if ($cache_filesize != $current_filesize) {

                //error_log(print_r($local_file_partial_path . ' UNCACHED_FILESIZE!!',true));
                return false;
            }

            //error_log(print_r($local_file_partial_path . ' ALREADY CACHED!!',true));
            return true;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return false;

        }
    }

    public function findTotalSize($files_not_in_cache) {

        $ntotal = 0;
        foreach ($files_not_in_cache as $f) {
            try {

                if (file_exists($f)) {
                    $ntotal = $ntotal + filesize($f);
                }

            }
            catch(Exception $e) {

                $logger = new StackMoverLogger();
                $logger->write_log($e->getMessage());

            }
        }

        return $ntotal;
    }

    /**
     * Find list of all files that are different that what's in the S3 backup bucket.
     *
     * If transfer_database flag is set, a new dump file is created here.
     * Output is an array {'files_not_in_cache' => [$files],'mysql_dump_file' => $mysql_dump_localfile}
     * $files_not_in_cache contains newly created mysql dump also.
     * @param   string  $local_metadata_file
     * @return  array
     */

    public function findFilesChanged($local_metadata_file) {

        if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

        $migrator = new StackMover_Migrator($this->params);

        $epoch = time();
        $ts_tag = date("Y-m-d") . '-' . $epoch;
        $srcdir = WP_CONTENT_DIR;

        /* all files excluding mysql */
        $files2backup = $migrator->get_files2backup($srcdir);

        if ($this->params['transfer_database']) {

            StackMover_GlobalMsgQ::setStatus('Creating mysql dump file...');

            $odir = STACKMOVER_LOCAL_BACKUP_DIR . $ts_tag . '/';
            $mysql_dump_file = $odir . 'sql-backup-' . $ts_tag . '.sql';
            $migrator->create_database_dump($mysql_dump_file);
            array_push($files2backup, $mysql_dump_file);

            StackMover_GlobalMsgQ::setStatus('Created ' . $mysql_dump_file);

        }

        if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

        StackMover_GlobalMsgQ::setStatus('Parsing ' . $local_metadata_file . ' for existing files in s3..');
        $s3_cache_metadata = $this->parse_metadata_file($local_metadata_file);

        $files_not_in_cache = array();

        foreach ($files2backup as $local_file_full_path) {

            //WP_CONTENT_DIR has no trailing slash, full paths only
            $file_cache_valid = $this->is_file_cached($local_file_full_path, $s3_cache_metadata);

            if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

            if ($file_cache_valid == false) {

                array_push($files_not_in_cache, $local_file_full_path);

            }

        }

        $ntotal = $this->findTotalSize($files_not_in_cache);
        $nMB = $ntotal / (1024 * 1024);
        StackMover_GlobalMsgQ::setStatus(sizeof($files_not_in_cache) . ' Files changed. ' . ceil($nMB) . 'MB total');

        $output = array();
        if ($this->params['transfer_database']) {

            $output['mysql_dump_file'] = $mysql_dump_file;
            $output['files_not_in_cache'] = $files_not_in_cache;
        }
        else {

            $output['files_not_in_cache'] = $files_not_in_cache;

        }

        //return $files_not_in_cache;
        return $output;

    }

}

?>
