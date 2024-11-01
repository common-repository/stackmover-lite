<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';

/**
 * Main class to filter out files from transfer.
 */

class StackMover_FileFilter {
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
     * Remove plugin's temp files
     */

    public function isTempFile($ifile) {

        $backup_dir = STACKMOVER_LOCAL_BACKUP_DIR;
 
        if (strpos($ifile, $backup_dir) !== false) {

            return true;
        }

        return false;

    }

    /**
     * Remove if filename contains specific path (such as plugins or themes)
     */

    public function exclude_if_path_contains($all_files, $needle) {

        $filtered = array();
        foreach ($all_files as $ifile) {

            if (strpos($ifile, $needle) === false) {

                //$needle does not exist in $file
                array_push($filtered, $ifile);
            }

        }

        return $filtered;

    }

    /**
     * Remove files in do not transfer list.
     * Do not transfer list is comma separated file extensions or filenames
     */

    public function remove_do_not_transfer_files($all_files) {

        //do_not_transfer_files is comma separated
        $do_not_transfer_files = $this->params['do_not_transfer_files'];

        if (strlen(trim($do_not_transfer_files)) == 0) {

            return $all_files;

        }

        $filtered = array();
        $pieces = explode(",", $do_not_transfer_files);

        foreach ($all_files as $ifile) {

            $path_parts = pathinfo($ifile);

            $avoidFile = false;

            foreach ($pieces as $extn) {

                if (strpos($extn, "*.") != false) {

                    $trimmed_extn = str_replace("*.", "", $extn);

                    if ($trimmed_extn == $path_parts['extension']) {
                        $avoidFile = true;
                    }

                }
                else {

                    $filename = $path_parts['filename'];

                    if ($filename == $extn) {
                        $avoidFile = true;
                    }

                }

                if ($avoidFile == false) {

                    array_push($filtered, $ifile);

                }

            }
        }

        return $filtered;
    }

    public function remove_temp_files($all_files) {

        $filtered = array();
        foreach ($all_files as $ifile) {

            if (!$this->isTempFile($ifile)) {

                array_push($filtered, $ifile);
            }

        }

        return $filtered;

    }

    /**
     * From input array of all local files, remove files that need to be filtered.
     * @param   array  $all_files
     * @return  array
     */

    public function getFiltered($all_files) {


        $filtered = $this->remove_temp_files($all_files);
        $filtered = $this->remove_do_not_transfer_files($filtered);

        if ($this->params['transfer_plugins'] == 0) {

            $filtered = $this->exclude_if_path_contains($filtered, 'wp-content/plugins');

        }

        if ($this->params['transfer_themes'] == 0) {

            $filtered = $this->exclude_if_path_contains($filtered, 'wp-content/themes');

        }
        
        return $filtered;

    }

}

?>
