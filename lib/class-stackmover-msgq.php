<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

/**
 * We use a simple file to serve as a msgq.
 * There isn't a way to handle state of the migration after an AJAX call.
 * So we keep a file to write status into and return it back to admin page.
 * Process to interrupt too happen here since AJAX will write a stop marker to the status file.
 */

class StackMover_GlobalMsgQ {

    static private $tmplocalMsgq = STACKMOVER_LOCALTMPDIR . '/' . 'wp2-cloud-status' . '.msgq';

    static private $tmpLightsailLog = STACKMOVER_LOCALTMPDIR . '/' . 'wp2-lightsail-status' . '.msgq';

    static private $tmpInterruptFile = STACKMOVER_LOCALTMPDIR . '/' . 'wp2-interrupt' . '.msgq';

    static private $tmpStartTimer;

    public function __construct($params = array()) {

    }

    static public function setContext($Tag) {

        $tmpFiles = array(
            StackMover_GlobalMsgQ::$tmplocalMsgq,
            StackMover_GlobalMsgQ::$tmpLightsailLog,
            StackMover_GlobalMsgQ::$tmpInterruptFile
        );

        foreach ($tmpFiles as $oFile) {
            if (file_exists($oFile)) file_put_contents($oFile, '', LOCK_EX);
        }

        StackMover_GlobalMsgQ::$tmpStartTimer = time();

    }

    public static function writeInterruptMsg() {

        $oFile = StackMover_GlobalMsgQ::$tmpInterruptFile;

        $msg = 'Getting an interrupt signal!';
        file_put_contents($oFile, $msg, FILE_APPEND | LOCK_EX);

        StackMover_GlobalMsgQ::setStatus('Interrupting...');

    }

    public static function HasInterruptSignal() {

        $oFile = StackMover_GlobalMsgQ::$tmpInterruptFile;

        if (!file_exists($oFile)) return false;

        $size = filesize($oFile);

        return $size > 0;

    }

    public static function writeLightsailLog($logmsg) {

        try {

            $oFile = StackMover_GlobalMsgQ::$tmpLightsailLog;
            $myfile = file_put_contents($oFile, $logmsg, FILE_APPEND | LOCK_EX);

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

        }

    }

    public static function getLightsailLog() {

        $oFile = StackMover_GlobalMsgQ::$tmpLightsailLog;

        try {

            return file_get_contents($oFile);

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return NULL;

        }

    }

    public static function setStatus($logMsg, $progress_val = - 1, $stop = false) {

        $oFile = StackMover_GlobalMsgQ::$tmplocalMsgq;

        if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

            //$logMsg = 'Interrupting...';
            
        }

        try {

            $currentTime = time();

            StackMover_FileUtil::ensureDirExists($oFile);

            $line = join(',', array(
                $logMsg,
                $progress_val,
                $stop,
                $currentTime
            ));
            $myfile = file_put_contents($oFile, $line . PHP_EOL, FILE_APPEND | LOCK_EX);

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

        }

    }

    public static function getStatus() {

        $oFile = StackMover_GlobalMsgQ::$tmplocalMsgq;

        if (!file_exists($oFile) || filesize($oFile) == 0) {

            $result = array();
            $result['val'] = '';
            return $result;

        }

        try {

            $csv = array_map('str_getcsv', file($oFile));

            //file_put_contents($oFile, '');
            $result = array();
            $result['val'] = $csv;

            return $result;

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            $result = array();
            $result['val'] = 'Working,-1,false';

            return $result;

        }

    }

}

?>
