<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

/**
 * Class to handle backup of all wordpress data.
 * Files to be backedup are evaluated and filtered.
 * No incremental update supported in this class.
 * Includes function to create local backup and create mysqldump.
 * Local backup is then moved to S3.
 *
 */

class StackMover_AbsoluteBackup {
    /**
     * Global parameters
     *
     * @var array
     */

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

        if (isset($params['secret_key'])) {
            $secret_key = $params['secret_key'];
        }

        if (isset($params['dst_bucket'])) {
            $dst_bucket = $params['dst_bucket'];
        }
        else {
            $dst_bucket = '/';
        }

        if (isset($params['db_name'])) {
            $db_name = $params['db_name'];
        }
        else {
            $db_name = DB_NAME;
        }

        if (isset($params['db_user'])) {
            $db_user = $params['db_user'];
        }
        else {
            $db_user = DB_USER;
        }

        if (isset($params['db_password'])) {
            $db_password = $params['db_password'];
        }
        else {
            $db_password = DB_PASSWORD;
        }

        if (isset($params['db_host'])) {
            $db_host = $params['db_host'];
        }
        else {
            $db_host = DB_HOST;
        }

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 1;
        }

        if (isset($params['tag'])) {
            $tag = $params['tag'];
        }
        else {
            $tag = '';
        }
        $this->tag = $tag;

        if (isset($params['transfer_database'])) {
            $transfer_database = $params['transfer_database'];
        }
        else {
            $transfer_database = true;
        }
        $this->transfer_database = $transfer_database;

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
        $this->verbose = $verbose;
        $this->dst_bucket = $dst_bucket;

        $s3param = array(
            'version' => $version,
            'region' => $region,
            'access_key' => $access_key,
            'secret_key' => $secret_key,
            'dst_bucket' => $dst_bucket
        );

    }

    /**
     * Move files created locally to S3
     *
     * Input consists of backup_metadata_file which contains metadata associated with backup.
     * A single zipped bundle backup_file contains all the files correlated to metadata file.
     * Parameters related to S3 (bucketname, keys etc) are set during initialization of class.
     * Backup process is interruptible and it can be interrupted during multipart upload.
     *
     * $local_backup['backup_metadata_file'] = csv file containing zip file metadata
     * $local_backup['backup_file'] = zip file concatenated with all files compressed
     *
     * If successful, returns the s3 key of moved files in $output.
     * $output['absolute_metadata_s3key'] = $s3_metafile;
     * $output['absolute_zip_s3key']      = $s3_backupfile;
     *
     * @param   array  $local_backup
     * @return  mixed
     */

    public function create_s3_backup($local_backup) {

        if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

        try {

            $put_options = new StackMover_S3PutOptions();
            $s3mover = new StackMover_S3Mover($this->params);

            $dst_bucket = $this->dst_bucket;

            $s3_cached_key = 'stackmover/' . $this->tag . '/backup/' . $local_backup['ts_tag'];

            $s3_metafile = $s3_cached_key . '/' . basename($local_backup['backup_metadata_file']);
            $s3_backupfile = $s3_cached_key . '/' . basename($local_backup['backup_file']);

            StackMover_GlobalMsgQ::setStatus('Uploading ' . $local_backup['backup_metadata_file'] . 'to S3 key' . $s3_metafile);

            /* putFile is interruptible and does multipart upload automatically as needed */

            $success = $s3mover->putFile($dst_bucket, $local_backup['backup_metadata_file'], $s3_metafile, $put_options);

            if (!$success) {
                return NULL;
            }

            StackMover_GlobalMsgQ::setStatus('Uploading ' . $local_backup['backup_file'] . 'to S3 key' . $s3_backupfile);

            /* putFile is interruptible and does multipart upload automatically as needed */

            $success = $s3mover->putFile($dst_bucket, $local_backup['backup_file'], $s3_backupfile, $put_options);

            if (!$success) {
                return NULL;
            }

            $output = array();
            $output['absolute_metadata_s3key'] = $s3_metafile;
            $output['absolute_zip_s3key'] = $s3_backupfile;

            return $output;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }

    }

    /**
     * Find Total Size of files to be moved
     *
     * Used to create log of how much data to be moved to S3.
     *
     * @param   array  $filelist
     * @return  int
     */

    public function findTotalSize($filelist) {

        $ntotal = 0;
        foreach ($filelist as $f) {
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
     * Creates a local backup of all the files.
     *
     * Local dir is scanned and files listed for backup, after applying input filters.
     * Mysql dump of the datbase is created and added to the file list.
     * Result is a has of metadata and the zipped filed along with local backup dir.
     *
     * If successful, returns the map of files created locally. Else NULL.
     * $result['backup_metadata_file'] = csv file containing zip file metadata
     * $result['backup_file'] = zip file concatenated with all files compressed
     * $result['ts_tag'] = backup dir name [NOT full path, format 2017-09-23-1506171502]
     *
     *
     * @return  mixed
     */

    public function create_local_backup() {

        try {

            $params = $this->params;
            $migrator = new StackMover_Migrator($params);

            $epoch = time();
            $ts_tag = date("Y-m-d") . '-' . $epoch;
            $srcdir = WP_CONTENT_DIR;

            /* all files excluding mysql */
            $files2backup = $migrator->get_files2backup($srcdir);
            $odir = STACKMOVER_LOCAL_BACKUP_DIR . $ts_tag . '/';

            $ntotal = $this->findTotalSize($files2backup);
            $nMB = ceil($ntotal / (1024 * 1024));

            StackMover_GlobalMsgQ::setStatus('Found ' . sizeof($files2backup) . ' files ' . $nMB . 'MB');

            if ($this->transfer_database) {

                StackMover_GlobalMsgQ::setStatus('Creating mysql dump file...');

                if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

                $mysql_dump_file = $odir . 'sql-backup-' . $ts_tag . '.sql';
                $migrator->create_database_dump($mysql_dump_file);
                array_push($files2backup, $mysql_dump_file);

                StackMover_GlobalMsgQ::setStatus('Created ' . $mysql_dump_file);

            }

            $outbundle = $odir . 'files-backup-' . $ts_tag . '.gz';
            $metafile = $odir . 'metadata-' . $ts_tag . '.csv';

            $bundler = new StackMover_CompressBundle($params);

            StackMover_GlobalMsgQ::setStatus('Creating Zip of all files...');

            if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

            $zipper = $bundler->createZipBundle($files2backup, $outbundle, $metafile);

            if ($this->transfer_database) {

                if (file_exists($mysql_dump_file)) {

                    unlink($mysql_dump_file);

                }
            }

            StackMover_GlobalMsgQ::setStatus('Creating metadata of zip file:' . $metafile);

            StackMover_GlobalMsgQ::setStatus('Final zip file created:' . $outbundle);

            $local_backup = array();
            $local_backup['backup_metadata_file'] = $metafile;
            $local_backup['backup_file'] = $outbundle;
            $local_backup['ts_tag'] = $ts_tag;

            if ($this->transfer_database) {

                $local_backup['mysql_dump_file'] = $mysql_dump_file;

            }

            return $local_backup;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }

    }

    /**
     * Main invoke to create local backup and move them to S3.
     *
     * Local backup of all the files is created first.
     * Mysql dump of the datbase is added to the dump as default.
     * Local back up (metadata file and zip bundle) are moved to S3.
     *
     *
     * If successful, returns the s3 key of moved files in $output, else NULL.
     * $output['absolute_metadata_s3key'] = $s3_metafile;
     * $output['absolute_zip_s3key']      = $s3_backupfile;
     * $output['mysql_dump_file']         = $mysql_dump_file;
     * $output['ts_tag']  = backup dir name [NOT full path, format 2017-09-23-1506171502]
     *
     *
     * @return  mixed
     */

    public function create() {

        $local_backup = $this->create_local_backup();

        $mysql_dump_file = $local_backup['mysql_dump_file'];

        if ($local_backup != NULL) {

            $output = $this->create_s3_backup($local_backup);

            if ($output == NULL) {

                return NULL;

            }

            $output['mysql_dump_file'] = $mysql_dump_file;
            $output['ts_tag'] = $local_backup['ts_tag'];
            return $output;

        }
        else {

            return NULL;
        }

    }

}

?>
