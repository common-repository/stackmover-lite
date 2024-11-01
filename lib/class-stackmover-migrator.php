<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-fileutil.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-mysqldump.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-dirscan.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-s3mover.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-compress-bundle.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-filefilter.php';

class StackMover_Migrator {

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

        if (isset($params['dst_bucket'])) {
            $dst_bucket = $params['dst_bucket'];
        }
        else {
            $dst_bucket = '/';
        }

        if (isset($params['tag'])) {
            $tag = $params['tag'];
        }
        else {
            $tag = '';
        }
        $this->tag = $tag;

        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;
        $this->verbose = $verbose;

        $s3param = array(
            'version' => $version,
            'region' => $region,
            'access_key' => $access_key,
            'secret_key' => $secret_key,
            'dst_bucket' => $dst_bucket
        );

        if (isset($params['local_cache_dir'])) {
            $local_cache_dir = $params['local_cache_dir'];
        }
        else {
            $local_cache_dir = STACKMOVER_LOCAL_BACKUP_DIR;
        }

        $this->s3moverparams = $s3param;
        $this->local_cache_dir = $local_cache_dir;

        if (isset($params['transfer_database'])) {
            $transfer_database = $params['transfer_database'];
        }
        else {
            $transfer_database = true;
        }
        $this->transfer_database = $transfer_database;

        if (isset($params['db_search_string_val'])) {
            $this->db_search_string_val = $params['db_search_string_val'];
        } else {
            $this->db_search_string_val = '';            
        }

        if (isset($params['db_replace_string_val'])) {
            $this->db_replace_string_val = $params['db_replace_string_val'];
        } else {
            $this->db_replace_string_val = '';
        }


    }


    public function get_customfiles() {

        $parent_to_wpcontent = dirname(WP_CONTENT_DIR);
        $customFiles = $this->params['customFiles'];

        $custompaths = array();

        /* $customFiles includes full path */

        foreach($customFiles as $ifile) {

            if (is_file($ifile)) {    

                array_push($custompaths,$ifile);
               
            }
 
        }

        return $custompaths;

    }

    /**
     *  This function is called during both incremental backup and absolute backup.
     */

    public function get_files2backup($srcdir) {

        $dirdump = new StackMover_DirScanner($this->params);
        $filter = new StackMover_FileFilter($this->params);

        $allfiles = $dirdump->getAllFiles($srcdir);
        $customfile = $this->get_customfiles();
        $allfiles = array_merge($allfiles,$customfile);

        $allfiles = array_values(array_unique($allfiles));;


        $filtered = $filter->getFiltered($allfiles);

        if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

        return $filtered;

    }

    public function create_database_dump($ofile = NULL) {

        try {

            $mysql = new StackMover_MysqlDumper($this->params);

            $date = date('Y-m-d-H-i-s');

            if ($ofile == NULL) {

                /* default is unzipped */
                $ofile = STACKMOVER_LOCAL_BACKUP_DIR . $date . '.sql';

            }

            $mysql->dump($ofile);

            $filevstime = array();

            $file_size = filesize($ofile);
            $filevstime = array();
            $filevstime[$ofile] = $file_size;

            return $filevstime;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;
        }

    }

    public function preCheck($s3Bucket) {

        try {

            $s3mover = new StackMover_S3Mover($this->params);

            if ($s3mover->dryRun($s3Bucket)) {
                $pass = true;                
            } else {

                $output = array();
                $output['val'] = 'Migrator Initialization Failed. Unable to verify S3 access.';
                $output['status'] = STACKMOVER_FAILURE;

                return $output;

            }

            $dump_cmd = StackMover_MysqlDumper::FindMysqlDump_ExePath();

            if ($dump_cmd == NULL) {

                $output = array();
                $output['val'] = 'Migrator Initialization Failed. Unable to find mysqldump. Please set STACKMOVER_MYSQLDUMP_PATH in wp-config.php';
                $output['status'] = STACKMOVER_FAILURE;

                return $output;

            }


            $output = array();
            $output['val'] = 'Verified S3 access and mysqldump location.';
            $output['status'] = STACKMOVER_SUCCESS;

            return $output;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            $output = array();
            $output['val'] = $e->getMessage();
            $output['status'] = STACKMOVER_FAILURE;

            return $output;


        }

    }

}

?>
