<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';

/**
 * Class to scan and return full pathname of all files in a dir.
 * No filters are applied during scan.
 */

class StackMover_DirScanner {
    /**
     * Global parameters
     *
     * @var array
     */

    private $params;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['compress_chunk'])) {
            $compress_chunk = $params['compress_chunk'];
        }
        else {
            $compress_chunk = 4096;
        }

        if (isset($params['use_gzip'])) {
            $use_gzip = $params['use_gzip'];
        }
        else {
            $use_gzip = true;
        }

        if (isset($params['use_cache'])) {
            $use_cache = $params['use_cache'];
        }
        else {
            $use_cache = true;
        }

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 0;
        }

        if (isset($params['tag'])) {
            $tag = $params['tag'];
        }
        else {
            $tag = '';
        }
        $this->tag = $tag;

        $this->compress_chunk = $compress_chunk;
        $this->use_gzip = $use_gzip;
        $this->verbose = $verbose;
        $this->use_cache = $use_cache;

    }

    /*
     **
     * Recursively get all the files in sub dir
     * Retuns full path name
    */

    public function getAllFiles($srcdir) {

        $rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($srcdir));
        $files = array();

        foreach ($rii as $file) {

            if ($file->isDir()) {
                continue;
            }

            array_push($files, $file->getPathname());


        }

        return $files;

    }

}

?>
