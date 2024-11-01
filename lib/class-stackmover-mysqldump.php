<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

/**
 * Class to create mysql dump.
 * The location of exe can be overwritten in config file.
 * If customer doesn't want to search for mysql dump, he could set STACKMOVER_MYSQLDUMP_PATH
 */

class StackMover_MysqlDumper {

    private $params;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['db_host'])) {
            $db_host = $params['db_host'];
        }
        else {
            $db_host = 'localhost';
        }

        if (isset($params['db_user'])) {
            $db_user = $params['db_user'];
        }
        else {
            $db_user = 'root';
        }

        if (isset($params['db_password'])) {
            $db_password = $params['db_password'];
        }
        else {
            $db_password = NULL;
        }

        if (isset($params['db_name'])) {
            $db_name = $params['db_name'];
        }
        else {
            $db_name = 'wordpress';
        }

        if (isset($params['compress_chunk'])) {
            $compress_chunk = $params['compress_chunk'];
        }
        else {
            $compress_chunk = 4096;
        }

        if (isset($params['usegzip'])) {
            $usegzip = $params['usegzip'];
        }
        else {
            $usegzip = false;;
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

        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_name = $db_name;
        $this->compress_chunk = $compress_chunk;
        $this->usegzip = $usegzip;
        $this->verbose = $verbose;

    }


    /**
     * https://stackoverflow.com/questions/20671735/mysqldump-common-install-locations-for-mac-linux
     *
     */

    
    public function detect_mysqldump_location() {

        // 1st: use mysqldump location from `which` command.
        $mysqldump = `which mysqldump`;
        if (is_executable($mysqldump)) return $mysqldump;

        // 2nd: try to detect the path using `which` for `mysql` command.
        $mysqldump = dirname(`which mysql`) . "/mysqldump";
        if (is_executable($mysqldump)) return $mysqldump;

        // 3rd: detect the path from the available paths.
        // you can add additional paths you come across, in future, here.
        $available = array(
            '/usr/bin/mysqldump', // Linux
            '/usr/local/mysql/bin/mysqldump', //Mac OS X
            '/usr/local/bin/mysqldump', //Linux
            '/usr/mysql/bin/mysqldump' //Linux
        );
        foreach($available as $apath) {
            if (is_executable($apath)) return $apath;
        }

        return NULL;

    }

    //TODO: remove first line mysqldump
    
    /**
     * Find mysqldump exe path location.
     *
     * If path needs to be overwritten, it could be set as STACKMOVER_MYSQLDUMP_PATH
     */

    public static function FindMysqlDump_ExePath() {

        if (defined('STACKMOVER_MYSQLDUMP_PATH')) {

            return STACKMOVER_MYSQLDUMP_PATH;

        }

        $paths = array(
            "/Applications/MAMP/Library/bin/mysqldump",
            "/usr/bin/mysqldump",
            "/bin/mysqldump",
            "/usr/local/bin/mysqldump",
            "/usr/sfw/bin/mysqldump",
            "/usr/xdg4/bin/mysqldump",
            "/opt/bin/mysqldump",
            "/usr/bin/mysqldump",
            "/usr/local/mysql/bin/mysqldump"
        );
        foreach ($paths as $exefile) {
            if (is_executable($exefile)) {
                return $exefile;
            }
        }

        $next_try = $this->detect_mysqldump_location();

        return $next_try;
    }

    /**
     * Create mysqldump and write it to $ofile
     * The command line arguments to mysqldump have been derived from Updraftplus plugin [https://updraftplus.com/]
     */

    public function dump($ofile) {

        try {

            $dump_cmd = StackMover_MysqlDumper::FindMysqlDump_ExePath();
            $localtmp = STACKMOVER_LOCALTMPDIR;
            if (isset($this->tempdir)) {
                $tmpfname = tempnam($this->tempdir, "wp2sql");
            }
            else {
                $tmpfname = tempnam($localtmp, "wp2sql");
            }

            StackMover_FileUtil::ensureDirExists($ofile);

            file_put_contents($tmpfname, "[mysqldump]\npassword=" . $this->db_password . "\n");

            $exec = "$dump_cmd --defaults-file=$tmpfname --max_allowed_packet=1M --quote-names --add-drop-table --skip-comments --skip-set-charset --allow-keywords --dump-date --extended-insert --user=" . escapeshellarg($this->db_user) . " --host=" . escapeshellarg($this->db_host) . " " . $this->db_name . " ";

            $file_handle = popen($exec, "r");
            if ($this->usegzip) {
                $ofile_handle = gzopen($ofile, 'w');
            }
            else {
                $ofile_handle = fopen($ofile, 'w');
            }

            while (!feof($file_handle)) {
                $line = fread($file_handle, $this->compress_chunk);
                if ($this->usegzip) {
                    gzwrite($ofile_handle, $line, strlen($line));
                }
                else {
                    fwrite($ofile_handle, $line, strlen($line));
                }
            }
            pclose($file_handle);
            if ($this->usegzip) {
                gzclose($ofile_handle);
            }
            else {
                fclose($ofile_handle);
            }

            unlink($tmpfname);

            return true;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return false;

        }

    }
}

?>
