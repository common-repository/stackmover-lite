<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

class StackMover_FileUtil {

    private $params;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 1;
        }

        $this->verbose = $verbose;

    }

    public static function makeDir($path) {

        return is_dir($path) || mkdir($path, 0775, $recursive = true);

    }

    /**
     * Check if the parent dir for $ifile exists.
     * If it doesn't exist, create the parent dir.
     * @param   string  $ifile
     */

    public static function ensureDirExists($ifile) {

        $path_parts = pathinfo($ifile);
        $ifile_dir = $path_parts['dirname'];
        StackMover_FileUtil::makeDir($ifile_dir);

    }

}

?>
