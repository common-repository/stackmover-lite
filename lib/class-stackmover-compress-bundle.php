<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';

/**
 * Class to handle creation of a local backup bundle.
 * Input includes list of all the files to be backed up (including mysqldump).
 * Output files containing a compressed zip of files and metadata is written out.
 */

class StackMover_CompressBundle {

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
            $compress_chunk = 4 * 4096;
        }

        if (isset($params['verbose'])) {
            $verbose = $params['verbose'];
        }
        else {
            $verbose = 1;
        }

        $this->verbose = $verbose;
        $this->compress_chunk = $compress_chunk;

    }

    public function writeMetadataFile($metadata, $header, $metafile) {

        $myfile = file_put_contents($metafile, $header . PHP_EOL, FILE_APPEND | LOCK_EX);

        foreach ($metadata as $info) {
            $log = implode(",", $info) . PHP_EOL;
            $myfile = file_put_contents($metafile, $log, FILE_APPEND | LOCK_EX);
        }

    }

    /**
     * Create the compressed bundle and metadata for backup.
     *
     * Input consists of allfiles, an array of all the files to be backedup.
     * outfile is the name of the local file to write the single zipped file.
     * metafile is the name of the local file containing metadata (csv).
     *
     * Input files are compressed in chunks to create ony master zip file.
     * Gzip decompression can handle concatenated zip file to uncompress.
     * Metadata file contains filename,uncompressed_len,compressed_len,lastmod,content_path,offset.
     * Metadata file is used during decompress to reconcile files (LightSail user-data script).
     * @param   array  $allfiles
     * @param   string $outfile
     * @param   string $metafile
     * @return  mixed
     */

    public function createZipBundle($allfiles, $outfile, $metafile) {

        try {

            StackMover_FileUtil::ensureDirExists($outfile);

            $mode = 'w';
            $fp_out = fopen($outfile, $mode);

            $metadata = array();
            $offset = 0;

            foreach ($allfiles as $src_file) {

                if (StackMover_GlobalMsgQ::HasInterruptSignal()) return NULL;

                $fp_in = fopen($src_file, 'r');
                $uncompressed_len = 0;
                $compressed_len = 0;
                $level = 9;

                try {
                    if ($fp_in != false) {
                        while (!feof($fp_in)) {

                            $fp_data = fread($fp_in, $this->compress_chunk);
                            $uncompressed_len = $uncompressed_len + strlen($fp_data);

                            if (strlen($fp_data) > 0) {
                                $compressed_bytes = gzencode($fp_data, $level);
                                $compressed_len = $compressed_len + strlen($compressed_bytes);
                                fwrite($fp_out, $compressed_bytes);

                            }
                        }
                    }
                }
                catch(Exception $e) {
                    $logger = new StackMoverLogger();
                    $logger->write_log($e->getMessage());
                }

                $lastmod = filemtime($src_file);
                $subindex = strpos($src_file, 'wp-content');
                $subpath = substr($src_file, $subindex);

                $info = array();
                $info['filename'] = $src_file;
                $info['uncompressed_len'] = $uncompressed_len;
                $info['compressed_len'] = $compressed_len;
                $info['lastmod'] = $lastmod;
                $info['content_path'] = $subpath;
                $info['offset'] = $offset;

                $offset = $offset + $compressed_len;

                array_push($metadata, $info);

                if ($fp_in != false) fclose($fp_in);

            }

            fclose($fp_out);

            $header = 'filename,uncompressed_len,compressed_len,lastmod,content_path,offset';

            $result = array();
            $result['header'] = $header;
            $result['metadata'] = $metadata;

            $this->writeMetadataFile($metadata, $header, $metafile);

            return $result;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }
    }
}

?>
