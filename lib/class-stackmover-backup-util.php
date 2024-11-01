<?php

if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

use WP2Aws\S3\S3Client;
use WP2Aws\Exception\AwsException;
use WP2Aws\S3\Exception\S3Exception;
use WP2Aws\Lightsail\LightsailClient;
use WP2Aws\Lightsail\Exception;

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-filedelta.php';

/**
 * Utility functions to find backup mode and parse S3 backup dir.
 *
 */

class StackMover_BackupMode {

    const BACKUPTYPE_ABSOLUTE = 1;
    const BACKUPTYPE_INCREMENTAL = 2;

    public static function findBackupMode($param) {

        //for lite version, always do absolute backup
        if (STACKMOVER_VERSION == 'STACKMOVER-LITE') {

            return StackMover_BackupMode::BACKUPTYPE_ABSOLUTE;

        }

        $incremental = new StackMover_IncrementalBackup($param);

        try {

            $most_recent_backup = $incremental->find_most_recent_backup();

            if ($most_recent_backup == NULL) {

                return StackMover_BackupMode::BACKUPTYPE_ABSOLUTE;

            }
            else {

                return StackMover_BackupMode::BACKUPTYPE_INCREMENTAL;

            }

        }
        catch(Exception $e) {

            $logger = new StackMoverLogger();
            $logger->write_log($e->getMessage());

            return StackMover_BackupMode::BACKUPTYPE_ABSOLUTE;

        }

    }

}

class StackMover_ParseBackupS3Names {

    const BACKUPTYPE_METADATA = 1;
    const BACKUPTYPE_ZIP = 2;
    const BACKUPTYPE_INVALID = - 1;

    public static function getEpoch_From_Dirname($s3key, $tag) {

        if (StackMover_ParseBackupS3Names::isStackMover_BackupDir($s3key, $tag) !== true) {

            return -1;

        }
        else {

            $backup_dir = StackMover_ParseBackupS3Names::getBackupName($tag);
            $backup_dir = StackMover_ParseBackupS3Names::str_replace_once($backup_dir, '', $s3key);
            $backup_dir = dirname($backup_dir);

            //2017-08-19-1503156205/metadata-2017-08-19-1503156205.csv
            $pieces = explode('-', $backup_dir);

            if (sizeof($pieces) == 4) return $pieces[3];
            else return -1;

        }

    }

    public static function getBackupName($tag) {

        return 'stackmover/' . $tag . '/backup/';

    }

    /**
     * Find whether s3key is a backup dir or not.
     * Done primarily to handle cases when customers might have dumped other stuff in the bucket.
     *
     * backup dir pattern is s3://bucket/stackmover/TAG/backup/YYYY-MM-DD-$epoch
     * @param   string  $s3key
     * @param   string  $tag
     * @return  bool
     */

    public static function isStackMover_BackupDir($s3key, $tag) {
        $backup_dir = StackMover_ParseBackupS3Names::getBackupName($tag);

        if (strpos($s3key, $backup_dir) !== false) {

            /* also check for pattern */
            $backup_dir = StackMover_ParseBackupS3Names::str_replace_once($backup_dir, '', $s3key);
            $backup_dir = dirname($backup_dir);

            //$backup_dir should have pattern 2017-08-20-1503239395
            if (preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{6,10}$/", $backup_dir)) {

                return true;

            }
            else {

                return false;
            }

        }
        else {

            return false;
        }

    }

    /**
     * Find whether s3key is a backup zip file or metadata file
     * @param   string  $s3key
     * @param   string  $tag
     * @return  BACKUPTYPE_ZIP || BACKUPTYPE_METADATA || BACKUPTYPE_INVALID
     */

    public static function findBackupType($s3key, $tag) {

        if (StackMover_ParseBackupS3Names::isStackMover_BackupDir($s3key, $tag)) {

            $path_parts = pathinfo($s3key);
            $filename = $path_parts['filename'];
            $extn = $path_parts['extension'];

            if (preg_match("/^files-backup-[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{6,10}.*$/", $filename)) {
                if ($extn == 'gz') {
                    return self::BACKUPTYPE_ZIP;
                }
                return self::BACKUPTYPE_INVALID;
            }
            else {

                if (preg_match("/^metadata-[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{6,10}.*$/", $filename)) {
                    if ($extn == 'csv') {
                        return self::BACKUPTYPE_METADATA;
                    }
                    return self::BACKUPTYPE_INVALID;;
                }
                return self::BACKUPTYPE_INVALID;;
            }
        }
        else {
            return self::BACKUPTYPE_INVALID;;
        }
    }

    public static function str_replace_once($search, $replace, $subject) {

        $pos = strpos($subject, $search);
        if ($pos === false) {
            return $subject;
        }

        return substr($subject, 0, $pos) . $replace . substr($subject, $pos + strlen($search));
    }

}

?>
