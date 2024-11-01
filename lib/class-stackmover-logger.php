<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

class StackMoverLogger {

    private $params;

    public function __construct($params = array()) {

        $this->params = $params;

        if (isset($params['logFile'])) {
            $logFile = $params['logFile'];
        }
        else {
            $logFile = NULL;
        }

        if (is_admin() && defined('STACKMOVER_LOGFILE') && STACKMOVER_LOGFILE) {
            $logFile = STACKMOVER_LOGFILE;
        }

        $this->logFile = $logFile;

    }

    public function write_log($log) {

        if ($this->logFile != NULL) {

            $file = $this->logFile;

            StackMover_FileUtil::ensureDirExists($file);

            try {
                if (is_array($log) || is_object($log)) {
                    file_put_contents($file, print_r($log, true) , FILE_APPEND);
                }
                else {
                    file_put_contents($file, $log, FILE_APPEND);
                }
            }
            catch(Exception $e) {

                $msg = $e->getMessage();
                error_log($msg);

            }

        }
        else {
            if (is_array($log) || is_object($log)) {
                error_log(print_r($log, true));
            }
            else {
                error_log($log);
            }
        }

    }

}

?>
