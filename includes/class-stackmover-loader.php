<?php


use WP2Aws\S3\S3Client;
use WP2Aws\Exception\WP2CAwsException;
use WP2Aws\S3\Exception\WP2CS3Exception;

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-check-keys.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-create-s3.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-logger.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-migrator.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-backup-util.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-absolute-backup.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-sanitizer.php';


if ( STACKMOVER_VERSION == 'STACKMOVER-PRO')
	require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'pro/class-stackmover-incremental-backup.php';

require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-ec2.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-lightsail.php';
require_once STACKMOVER_PLUGIN_LIB . DIRECTORY_SEPARATOR . 'class-stackmover-msgq.php';

/**
 * Register all actions and filters for the plugin
 *
 * @link       https://www.stackmover.com
 * @since      1.0.0
 *
 * @package    StackMover
 * @subpackage StackMover/includes
 */

/**
 * Register all actions and filters for the plugin.
 *
 * Maintain a list of all hooks that are registered throughout
 * the plugin, and register them with the WordPress API. Call the
 * run function to execute the list of actions and filters.
 *
 * @package    StackMover
 * @subpackage StackMover/includes
 * @author     StackMover Team <support@stackmover.com>
 */
class StackMover_Loader {

	/**
	 * The array of actions registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $actions    The actions registered with WordPress to fire when the plugin loads.
	 */
	protected $actions;

	/**
	 * The array of filters registered with WordPress.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      array    $filters    The filters registered with WordPress to fire when the plugin loads.
	 */
	protected $filters;



	/**
	 * Initialize the collections used to maintain the actions and filters.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->actions = array();
		$this->filters = array();

	}

   

	/**
	 * Add a new action to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress action that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the action is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. he priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1.
	 */
	public function add_action( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->actions = $this->add( $this->actions, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * Add a new filter to the collection to be registered with WordPress.
	 *
	 * @since    1.0.0
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         Optional. he priority at which the function should be fired. Default is 10.
	 * @param    int                  $accepted_args    Optional. The number of arguments that should be passed to the $callback. Default is 1
	 */
	public function add_filter( $hook, $component, $callback, $priority = 10, $accepted_args = 1 ) {
		$this->filters = $this->add( $this->filters, $hook, $component, $callback, $priority, $accepted_args );
	}

	/**
	 * A utility function that is used to register the actions and hooks into a single
	 * collection.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @param    array                $hooks            The collection of hooks that is being registered (that is, actions or filters).
	 * @param    string               $hook             The name of the WordPress filter that is being registered.
	 * @param    object               $component        A reference to the instance of the object on which the filter is defined.
	 * @param    string               $callback         The name of the function definition on the $component.
	 * @param    int                  $priority         The priority at which the function should be fired.
	 * @param    int                  $accepted_args    The number of arguments that should be passed to the $callback.
	 * @return   array                                  The collection of actions and filters registered with WordPress.
	 */
	private function add( $hooks, $hook, $component, $callback, $priority, $accepted_args ) {

		$hooks[] = array(
			'hook'          => $hook,
			'component'     => $component,
			'callback'      => $callback,
			'priority'      => $priority,
			'accepted_args' => $accepted_args
		);

		return $hooks;

	}



	public function stackmover_keys_checker() {
	

		try {

			$this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_keys_checker');

			$access_key = StackMoverSanitizer::Sanitize('aws_access_key_id_val',$_POST['aws_access_key_id_val']);
			$secret_key = StackMoverSanitizer::Sanitize('aws_secret_access_key_val',$_POST['aws_secret_access_key_val']);	
			$aws_preset_s3_bucket = StackMoverSanitizer::Sanitize('aws_preset_s3_bucket',$_POST['aws_preset_s3_bucket']);

			$aws_s3_region = StackMoverSanitizer::Sanitize('aws_s3_region',$_POST['aws_s3_region']);

			$s3Checker = new StackMover_KeysChecker([
				'version'     => 'latest',
			    'access_key'    => $access_key,
			    'secret_key' => $secret_key,
			    'aws_s3_region' => $aws_s3_region,
			    'aws_preset_s3_bucket' => $aws_preset_s3_bucket
			]);

			$isListable = $s3Checker->canAccessS3();


			if ($isListable['status'] == STACKMOVER_FAILURE) {

				if (strlen($aws_preset_s3_bucket) > 0) {

					$isListable = $s3Checker->canListPresetS3Obj();

				}


			}

			wp_send_json($isListable);
			wp_die();

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);

			wp_die();

		}

	}

	public function stackmover_create_s3() {

		try {

			 $this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_create_s3');

			$access_key = StackMoverSanitizer::Sanitize('aws_access_key_id_val',$_POST['aws_access_key_id_val']);
			$secret_key = StackMoverSanitizer::Sanitize('aws_secret_access_key_val',$_POST['aws_secret_access_key_val']);	
			$bucketname = StackMoverSanitizer::Sanitize('bucketname',$_POST['bucketname']);	
			$region = StackMoverSanitizer::Sanitize('region',$_POST['region']);	

			$s3Checker = new StackMover_S3Creator([
				'version'     => 'latest',
			    'access_key'    => $access_key,
			    'secret_key' => $secret_key,
			    'region' => $region
			]);

			$creator = $s3Checker->createS3($bucketname,$region);

			wp_send_json($creator);

			wp_die();

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);

			wp_die();

		}

	}

	public function stackmover_migrator_params() {


		$access_key = StackMoverSanitizer::Sanitize('aws_access_key_id_val',$_POST['aws_access_key_id_val']);
		$secret_key = StackMoverSanitizer::Sanitize('aws_secret_access_key_val',$_POST['aws_secret_access_key_val']);	

		if (isset($_POST['bucketname'])) {
			$bucketname = StackMoverSanitizer::Sanitize('bucketname',$_POST['bucketname']);	
		} else {
			$bucketname = '/';
		}

		if (isset($_POST['region'])) {
			$region = StackMoverSanitizer::Sanitize('region',$_POST['region']);	
		} else {
			$region = 'us-east-1';
		}

		if (isset($_POST['tag'])) {
			$tag = StackMoverSanitizer::Sanitize('tag',$_POST['tag']);	
		} else {
			$tag = '';
		}

		if (isset($_POST['availabilityZone'])) {
			$availabilityZone = StackMoverSanitizer::Sanitize('availabilityZone',$_POST['availabilityZone']);	
		} else {
			$availabilityZone = '';
		}

		if (isset($_POST['blueprintId'])) {
			$blueprintId = StackMoverSanitizer::Sanitize('blueprintId',$_POST['blueprintId']);	
		} else {
			$blueprintId = '';
		}

		if (isset($_POST['bundleId'])) {
			$bundleId = StackMoverSanitizer::Sanitize('bundleId',$_POST['bundleId']);	
		} else {
			$bundleId = '';
		}

		if (isset($_POST['instanceNames'])) {
			$instanceNames = StackMoverSanitizer::Sanitize('instanceNames',$_POST['instanceNames']);	
		} else {
			$instanceNames = '';
		}

		$userData = '';
		
		if (isset($_POST['use_incremental_backup'])) {
			$use_incremental_backup = StackMoverSanitizer::Sanitize('use_incremental_backup',$_POST['use_incremental_backup']);	
		} else {
			$use_incremental_backup = 0;
		}

		if (isset($_POST['transfer_database'])) {
			$transfer_database = StackMoverSanitizer::Sanitize('transfer_database',$_POST['transfer_database']);	
		} else {
			$transfer_database = 1;
		}

		if (isset($_POST['transfer_plugins'])) {
			$transfer_plugins = StackMoverSanitizer::Sanitize('transfer_plugins',$_POST['transfer_plugins']);	
		} else {
			$transfer_plugins = 1;
		}

		if (isset($_POST['transfer_themes'])) {
			$transfer_themes = StackMoverSanitizer::Sanitize('transfer_themes',$_POST['transfer_themes']);	
		} else {
			$transfer_themes = 1;
		}

		if (isset($_POST['do_not_transfer_files'])) {
			$do_not_transfer_files = StackMoverSanitizer::Sanitize('do_not_transfer_files',$_POST['do_not_transfer_files']);	
		} else {
			$do_not_transfer_files = '';
		}

		if (isset($_POST['db_search_string_val'])) {
			$db_search_string_val = StackMoverSanitizer::Sanitize('db_search_string_val',$_POST['db_search_string_val']);	
		} else {
			$db_search_string_val = '';
		}

		if (isset($_POST['db_replace_string_val'])) {
			$db_replace_string_val = StackMoverSanitizer::Sanitize('db_replace_string_val',$_POST['db_replace_string_val']);	
		} else {
			$db_replace_string_val = '';
		}

		if (isset($_POST['customFiles'])) {
			$customFiles = StackMoverSanitizer::Sanitize('customFiles',$_POST['customFiles']);	
		} else {
			$customFiles = array();
		}

		if (isset($_POST['aws_s3_region'])) {
			$aws_s3_region = StackMoverSanitizer::Sanitize('aws_s3_region',$_POST['aws_s3_region']);	
		} else {
			$aws_s3_region = 'us-east-1';
		}

		


		$params = array (
		    'db_name' => DB_NAME,
		    'db_user' => DB_USER,
		    'db_password' => DB_PASSWORD,
		    'db_host' => DB_HOST,
		    'compress_chunk' => 4096,
		    'version'     => 'latest',
		    'region'      => $region,
		    'access_key' => $access_key,
		    'secret_key' => $secret_key,
		    'dst_bucket' => $bucketname,
		    'transfer_database' => true,
		    'tag' => $tag,

		    'use_incremental_backup' => $use_incremental_backup,
		    'transfer_database' => $transfer_database,
		    'transfer_plugins' => $transfer_plugins,
		    'transfer_themes' => $transfer_themes,
		    'do_not_transfer_files' => $do_not_transfer_files,
		    'db_search_string_val' => $db_search_string_val,
		    'db_replace_string_val' => $db_replace_string_val,

		    'customFiles' => $customFiles,
		    'aws_s3_region' => $aws_s3_region,

		   	'availabilityZone' => $availabilityZone,
			 'blueprintId' => $blueprintId,
			 'bundleId' => $bundleId,
			 'instanceNames' => $instanceNames,
			 'userData' => $userData
		    );

		return $params;

	}

	public function stackmover_aws_migrator_get_status() {


		try {

			$queue = StackMover_GlobalMsgQ::getStatus();

			$output = array();
			$output['val'] = json_encode($queue['val']);
			$output['status'] = STACKMOVER_SUCCESS;

			wp_send_json($output);
			wp_die();


		} catch (Exception $e) {

			$output = array();
			$output['val'] = NULL;;
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);
			wp_die();

		}

	}

	public function stackmover_aws_migrator_interrupt_migration() {

		$this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_aws_migrator_interrupt_migration');

		StackMover_GlobalMsgQ::writeInterruptMsg();

		$output = array();
		$output['status'] = STACKMOVER_SUCCESS;

		wp_send_json($output);
		wp_die();

	}



	public function stackmover_aws_migrator_get_lightsail_log() {

		 $this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_aws_migrator_get_lightsail_log');


		if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

			StackMover_GlobalMsgQ::setStatus("Interrupted (Lightsail may be running).",-1,true);

			$output = array();
			$output['val'] = "Interrupted";
			$output['status'] = STACKMOVER_INTERRUPTED;

			wp_send_json($output);
			wp_die();

			return;


		}



		try {

			$log = StackMover_GlobalMsgQ::getLightsailLog();

			$output = array();
			$output['val'] = $log;
			$output['status'] = STACKMOVER_SUCCESS;

			wp_send_json($output);
			wp_die();


		} catch (Exception $e) {

			$output = array();
			$output['val'] = NULL;;
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);
			wp_die();

		}

	}

	/**
	 * During launch, LightSail will push final log to S3.
	 * We use the completeness of file in S3 as proxy to successful LightSail migration.
	 * Input: overall $context array
	 * Output: FALSE or local file with status log
	 */


	public function get_migration_log($context) {


		$dst_bucket 		= $context['dst_bucket'];
		$s3key      		= $context['s3key'];
		$timeout    		= $context['timeout'];
		$params     		= $context['params'];
		$current_counter    = $context['current_counter'];
		$max_counter    	= $context['max_counter'];

		try {

			$s3Client = new S3Client(array(
				'version'     =>  $params['version'],
				'region'      => $params['region'],
				'credentials' => array(
					'key'    => $params['access_key'],
					'secret' => $params['secret_key']
					)
				));

			$local_file = STACKMOVER_LOCALTMPDIR . basename($s3key);


			try {
				$result = $s3Client->getObject(array(
						'Bucket' => $dst_bucket,
						'Key'    => $s3key,
						'SaveAs' => $local_file
					));

				return $local_file;
			
			} catch (Exception $e) {
			
				return false;
			
			}


		} catch (Exception $e) {

			return false;

		}

		return false;

	}

	/* Output: FALSE or local file with status log */

	public function isMigrationComplete($context) {

		try {

			$complete_file = $this->get_migration_log($context);
			return $complete_file;

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			return false;

		}

	}

	/* LightSail status checks are chained.
	*  Context is an array with parameters $dst_bucket,$s3key,$timeout,$params.
	** We will chain until success of time out.
	*/

	public function stackmover_trigger_lightsail_statuscheck($context) {

		$dst_bucket 		= $context['dst_bucket'];
		$s3key      		= $context['s3key'];
		$timeout    		= $context['timeout'];
		$params     		= $context['params'];
		$current_counter    = $context['current_counter'];
		$max_counter    	= $context['max_counter'];


		if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

			StackMover_GlobalMsgQ::setStatus("Interrupted",-1,true);
			return;
		}


		$lightsail_log_file = $this->isMigrationComplete($context);

		if ($lightsail_log_file != FALSE && file_exists($lightsail_log_file) == TRUE) {

			/* We have received final LightSail status file from S3.
			 * Hopefully LightSail migration is successful.
			 * We only validate launching an instance and getting final status file.
			 */

			try {
				$final_log_msg = file_get_contents($lightsail_log_file);
				StackMover_GlobalMsgQ::writeLightsailLog($final_log_msg);

				$lightSail = new StackMover_LightSail($params);
				$publicIpAddress = $lightSail->getInstancepublicIpAddress(
												$params['instanceNames']);

				$stop = true;
				$msg = 'Lightsail migration succesful. Current wordpress Lightsail clone at http://' . $publicIpAddress;
				StackMover_GlobalMsgQ::setStatus($msg,100,$stop);

			} catch (Exception $e) {

				$logger = new StackMoverLogger();
				$logger->write_log($e->getMessage());
				StackMover_GlobalMsgQ::setStatus($e->getMessage(),51,true);


			}



		} else {

			try {

				$loop_counter = '[' . $current_counter . '/' . $max_counter . ']';

				$msg = 'Waiting for LightSail deployment. ' . $loop_counter;
				$perc_progress = $current_counter*30.0/$max_counter;
				$perc_progress = 51.07526882 + 1 + $perc_progress;

				$stop = false;
				StackMover_GlobalMsgQ::setStatus($msg,$perc_progress,$stop);


				if ($current_counter < $max_counter) {

					$context['current_counter'] = $current_counter + 1;
					$sleeptime = $context['sleeptime'];

					/* Schedule another check with new context */
					wp_schedule_single_event(time() + $sleeptime, 
											'stackmover_lightsail_status_check_action',
											array($context));							

				} else {

					/* We are timing out
					*/

					$msg = 'Timed out waiting for LightSail deployment. Check AWS Console for LightSail instance.';

					$stop = true;
					$perc_progress = 80;
					StackMover_GlobalMsgQ::setStatus($msg,$perc_progress,$stop);

				}

			} catch (Exception $e) {

				$logger = new StackMoverLogger();
				$logger->write_log($e->getMessage());
				StackMover_GlobalMsgQ::setStatus($e->getMessage(),51,true);

			}


		}



	}


	public function stackmover_aws_migrator_cleanup($local_dir_with_zipfiles) {


		try {
	
			$files = glob($local_dir_with_zipfiles . '/*'); 
			foreach($files as $file) { 

				if (strpos($file,'stackmover-lite/backup') !== FALSE) {
					if(is_file($file)) {

						unlink($file); // delete file

					} 					
				}
			}

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['status'] = STACKMOVER_FAILURE;
            return STACKMOVER_FAILURE;

		}
	}


	public function stackmover_migrate($params) {

		$backup_results = $this->stackmover_create_backup($params);

		if (isset($backup_results['mysql_dump_file'])) {

			$mysql_dump_file = $backup_results['mysql_dump_file'];

		}

		if ($backup_results != NULL) {


			$output = $this->createUserdata($backup_results,$params);
			$input_s3params_file = $output['s3params_file'];
			$userData = $output['userData'];


			#Lightsail instance will write final status as below
			$s3key_finalstatus = $output['s3key_params'] . '-status.txt';
			$dst_bucket = $params['dst_bucket'];

			# wait for LightSail to finish installing
			# 
			$output = $this->stackmover_create_lightsail($params,$userData);

			if ($output['status'] == STACKMOVER_FAILURE) {

				$stop = true;
				StackMover_GlobalMsgQ::setStatus("Couldn't complete launching lightsail. Please check log file",-1,$stop);

			}



			$stop = false;
			StackMover_GlobalMsgQ::setStatus("Waiting for LightSail deployment completion...",51.07526882,$stop);

			$timeout = STACKMOVER_LIGHTSAIL_WAITSECONDS;
			$sleeptime = 5;
			$max_counter = $timeout/$sleeptime;

			$context = array();
			$context['dst_bucket'] = $dst_bucket;
			$context['s3key'] = $s3key_finalstatus;
			$context['timeout'] = $timeout;
			$context['params'] = $params;
			$context['current_counter'] = 0;
			$context['max_counter'] = $max_counter;
			$context['sleeptime'] = $sleeptime;
			$context['local_dir_with_zipfiles'] = $backup_results['local_dir_with_zipfiles'];


			//$this->stackmover_trigger_lightsail_statuscheck($context);

			/* Schedule another check with new context */
			wp_schedule_single_event(time() + $sleeptime, 
									'stackmover_lightsail_status_check_action',
									array($context));							


		} else {

			if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

				StackMover_GlobalMsgQ::setStatus("Interrupted",-1,true);

			} else {
				$stop = true;
				StackMover_GlobalMsgQ::setStatus("Error during backup. Please check log file",-1,$stop);

			}

		}

		//cleanup local zip files
	
		if (isset($backup_results['local_dir_with_zipfiles'])) {
	
			$this->stackmover_aws_migrator_cleanup($backup_results['local_dir_with_zipfiles']);

		}


	}

	public function validate_nonce($source,$whoami) {

		if ( ! check_ajax_referer( $source, 'security', false ) ) {

				$epoch = time();
				StackMover_GlobalMsgQ::setContext($epoch);				
				StackMover_GlobalMsgQ::setStatus("Invalid security token sent.",0.01);

				$output = array();
				$output['val'] = 'Invalid security token sent';
				$output['status'] = STACKMOVER_FAILURE;
				wp_send_json($output);
				wp_die();
			
			} 
	}



	public function stackmover_aws_migrator_init() {


		try {

			$this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_aws_migrator_init');

			$params = $this->stackmover_migrator_params();
			$migrator = new StackMover_Migrator($params);
			$dst_bucket = $params['dst_bucket'];

			$precheck = $migrator->preCheck($dst_bucket);

			$lightsail = new StackMover_LightSail($params);

			$result = $lightsail->findCurrentInstances();
			$current_instances = $result['val'];
			$already_existing = in_array($params['instanceNames'], $current_instances);

			$pass = $precheck['status'] == STACKMOVER_SUCCESS && !$already_existing;
				
			$errormsg = '';
			if ($precheck['status']  != STACKMOVER_SUCCESS) {
				$errormsg = $precheck['val'];
			}
			if ($already_existing) {

				$errormsg = 'LightSail instance name ' . $params['instanceNames'] . ' already exists. Enter unique name';
			}


			if ($pass) {

				$epoch = time();
				StackMover_GlobalMsgQ::setContext($epoch);				
				StackMover_GlobalMsgQ::setStatus("Migrator Initialization Success.",0.01);
				$status = StackMover_GlobalMsgQ::getStatus();


				wp_schedule_single_event(time() + 3, 
										 'stackmover_migration_process_action',
										 array($params));


				$output = array();
				$output['val'] = json_encode($status);
				$output['status'] = STACKMOVER_SUCCESS;

				wp_send_json($output);
				wp_die();

			} else {

				$epoch = time();
				StackMover_GlobalMsgQ::setContext($epoch);				
				StackMover_GlobalMsgQ::setStatus($precheck['val']);
				$status = StackMover_GlobalMsgQ::getStatus();

				$output = array();
				$output['val'] = $errormsg;
				$output['status'] = STACKMOVER_FAILURE;
				wp_send_json($output);
				wp_die();

			}



		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);

			wp_die();

		}

	}



	public function stackmover_getlightsailAZs($params) {

		try {

			$this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_getlightsailAZs');


			$access_key = StackMoverSanitizer::Sanitize('aws_access_key_id_val',$_POST['aws_access_key_id_val']);
			$secret_key = StackMoverSanitizer::Sanitize('aws_secret_access_key_val',$_POST['aws_secret_access_key_val']);	


			$params = array();
			$params['access_key'] = $access_key;
			$params['secret_key'] = $secret_key;
			//$params = $this->stackmover_migrator_params();

			$ec2 = new StackMover_EC2($params);
			$region2AZs = $ec2->getLightSailAZs();

			if ($region2AZs == NULL) {

				$output = array();
				$output['val'] = NULL;
				$output['status'] = STACKMOVER_FAILURE;

			} else {

				$output = array();
				$output['val'] = $region2AZs;
				$output['status'] = STACKMOVER_SUCCESS;

			}


			wp_send_json($output);

			wp_die();

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);

			wp_die();

		}

	}

	public function stackmover_create_lightsail($params,$userData) {

		if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

			StackMover_GlobalMsgQ::setStatus("Interrupting...",-1,true);

			$output = array();
			$output['val'] = NULL;
			$output['status'] = STACKMOVER_FAILURE;

			return $output;

		}


		try {

			//$params = $this->stackmover_migrator_params();

			$lightSail = new StackMover_LightSail($params);
			

			$result = $lightSail->createInstances($userData);

			if ($result == NULL || $result['status'] == STACKMOVER_FAILURE) {

				$output = array();
				$output['val'] = $e->getMessage();
				$output['status'] = STACKMOVER_FAILURE;

			}

			return $result;

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			return $output;


		}
	}

	public function writeParameters2S3($backup_output,$params) {


		///file_put_contents('/tmp/sm.log', print_r($params, true));

		$epoch = time();
		$ts_tag = date("Y-m-d") . '-' . $epoch;

		$outfile = STACKMOVER_LOCALTMPDIR . '/parameters-' . $ts_tag;
		StackMover_FileUtil::ensureDirExists($outfile);

		$which_mode = $backup_output['backup_mode'];

		$evar = 'export BUCKETNAME=' . $params['dst_bucket'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );


		$evar = 'export TRANSFER_DATABASE=' . $params['transfer_database'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		$evar = 'export TRANSFER_PLUGINS=' . $params['transfer_plugins'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		$evar = 'export TRANSFER_THEMES=' . $params['transfer_themes'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		$evar = 'export DONOT_TRANSFER_FILES=' . $params['do_not_transfer_files'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		$evar = 'export SEARCH_DB_STRING=' . $params['db_search_string_val'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		$evar = 'export REPLACE_DB_STRING=' . $params['db_replace_string_val'];
		file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		if (isset($backup_output['mysql_dump_file']))  {

			$mysql_dump_file = basename($backup_output['mysql_dump_file']);
			$evar = 'export MYSQLDUMP=' . $mysql_dump_file;
			file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		}

		if ($which_mode == StackMover_BackupMode::BACKUPTYPE_ABSOLUTE) {

			file_put_contents($outfile, 'export BACKUP_TYPE=1' . PHP_EOL, FILE_APPEND );


			$main_cmd = 'RMETA:RZIP';
			$main_cmd = str_replace('RMETA',
									$backup_output['absolute_metadata_s3key'],$main_cmd);
			$main_cmd = str_replace('RZIP',
									$backup_output['absolute_zip_s3key'],$main_cmd);
			$evar = 'export MOSTRECENT_FILES=' . $main_cmd;
			file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );


		} else {

			file_put_contents($outfile, 'export BACKUP_TYPE=0' . PHP_EOL, FILE_APPEND );

			$main_cmd = 'IMETA:IZIP';
			$main_cmd = str_replace('IMETA',
								$backup_output['incremental_metadata_s3key'],$main_cmd);
			$main_cmd = str_replace('IZIP',
								$backup_output['incremental_zip_s3key'],$main_cmd);

			$evar = 'export INCREMENTAL_FILES=' . $main_cmd;
			file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );


			$main_cmd = 'RMETA:RZIP';
			$main_cmd = str_replace('RMETA',
								$backup_output['most_recent_metadata_s3key'],$main_cmd);
			$main_cmd = str_replace('RZIP',
								$backup_output['most_recent_zip_s3key'],$main_cmd);
			$evar = 'export MOSTRECENT_FILES=' . $main_cmd;
			file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );


			$main_cmd = 'DMETA:DZIP';
			$main_cmd = str_replace('DMETA',
								$backup_output['reconciled_metadata_s3key'],$main_cmd);
			$main_cmd = str_replace('DZIP',
								$backup_output['reconciled_zip_s3key'],$main_cmd);

			$evar = 'export FINAL_OUTPUT_FILES=' . $main_cmd;
			file_put_contents($outfile, $evar . PHP_EOL, FILE_APPEND );

		}


		$put_options = new StackMover_S3PutOptions();
		$s3mover = new StackMover_S3Mover($params);
		$dst_bucket = $params['dst_bucket'];

		$s3_key = 'stackmover/' . $params['tag'] . '/temp/' . basename($outfile);
		$success = $s3mover->putFile($dst_bucket,$outfile,$s3_key,$put_options);

		unlink($outfile);

		if ($success) {

			return $s3_key;

		} else {

			return false;
		}



	}


	public function createUserdata($backup_output,$params) {

		$s3key_params  = $this->writeParameters2S3($backup_output,$params);

		if ($s3key_params  == false) {

			error_log(print_r('Unknown error @createUserdata: Unable to write parameter file',true));
			return;
		} 

		$s3params_file = 's3://' . $params['dst_bucket'] . '/' . $s3key_params;

		$dbinput = DB_NAME . ':' . DB_USER  . ':' . DB_PASSWORD;

		$cmd = 'wget https://s3.amazonaws.com/stackmover/lightsailer/scripts/1.0.0/download.sh -O /tmp/download.sh';

		$main_cmd = '/bin/bash  -x /tmp/download.sh -k ACCESSKEY:SECRETKEY -w DBINPUT -p S3PARAMSFILE -b S3BUCKETNAME > /home/ubuntu/.wp2cloud';

		$main_cmd = str_replace('ACCESSKEY',$params['access_key'],$main_cmd);
		$main_cmd = str_replace('SECRETKEY',$params['secret_key'],$main_cmd);
		$main_cmd = str_replace('DBINPUT',$dbinput,$main_cmd);
		$main_cmd = str_replace('S3PARAMSFILE',$s3params_file,$main_cmd);
		$main_cmd = str_replace('S3BUCKETNAME',$params['dst_bucket'],$main_cmd);


		# don't add more separators during concat. Causes issues with scrit
		$cmd = $cmd  . ' && ' . $main_cmd;

		$output = array();
		$output['userData'] = $cmd;
		$output['s3params_file'] = $s3params_file;
		$output['s3key_params'] = $s3key_params;

		return $output;



	}


	public function stackmover_create_backup($params) {

		try {

			$backup_output = array();

			StackMover_GlobalMsgQ::setStatus('Initializing for backup to S3...',2.956989247);

			if ($params['use_incremental_backup'] == 1) {

				$which_mode = StackMover_BackupMode::findBackupMode($params);

			} else {

				$which_mode = StackMover_BackupMode::BACKUPTYPE_ABSOLUTE;
				StackMover_GlobalMsgQ::setStatus('Incremental backup disabled. Forcing absolute backup..',2.956989247);
			}

			
			$backup_output['backup_mode'] = $which_mode;

			if ($which_mode == StackMover_BackupMode::BACKUPTYPE_ABSOLUTE) {

				StackMover_GlobalMsgQ::setStatus('Ready to do full backup of local files...',-1);

				$absolute_backup = new StackMover_AbsoluteBackup($params);
				$s3keys = $absolute_backup->create();


				$local_dir_with_zipfiles = STACKMOVER_LOCAL_BACKUP_DIR . $s3keys['ts_tag'] . '/';

				$backup_output['local_dir_with_zipfiles'] = $local_dir_with_zipfiles;

				$backup_output['absolute_metadata_s3key'] = 
								$s3keys['absolute_metadata_s3key'];
				$backup_output['absolute_zip_s3key'] = $s3keys['absolute_zip_s3key'];

				if (isset($s3keys['mysql_dump_file']))
				{
					$backup_output['mysql_dump_file'] = $s3keys['mysql_dump_file'];
				}


				return $backup_output;


			} else {

				$incremental_backup = new StackMover_IncrementalBackup($params);

				StackMover_GlobalMsgQ::setStatus('Ready to do incremental backup of local files...',2.9956989);

				$delta_results = $incremental_backup->find_modified_files();

				$modified_files = $delta_results['modified_files'];
				$most_recent_metadata_s3key = $delta_results['most_recent_metadata_s3key'];
				$most_recent_zip_s3key = $delta_results['most_recent_zip_s3key'];

				if (isset($delta_results['mysql_dump_file']))
					$mysql_dump_file = $delta_results['mysql_dump_file'];


				$local_modified_files = 
						$incremental_backup->createModZipBundle($modified_files);

				$local_dir_with_zipfiles = STACKMOVER_LOCAL_BACKUP_DIR . $local_modified_files['ts_tag'] . '/';

				$backup_output['local_dir_with_zipfiles'] = $local_dir_with_zipfiles;


				$incremental_s3keys = 
					$incremental_backup->create_s3_incremental_backup($local_modified_files);

				if ($incremental_s3keys != NULL) {

					$backup_output['incremental_metadata_s3key'] = 
										$incremental_s3keys['incremental_metadata_s3key'];
					$backup_output['incremental_zip_s3key'] = 
										$incremental_s3keys['incremental_zip_s3key'];

					// This is not filled yet. Will be reconciled via user-data
					$backup_output['reconciled_metadata_s3key'] = 
										$incremental_s3keys['reconciled_metadata_s3key'];
					$backup_output['reconciled_zip_s3key'] = 
										$incremental_s3keys['reconciled_zip_s3key'];

					$backup_output['most_recent_metadata_s3key'] = 
										$most_recent_metadata_s3key;
					$backup_output['most_recent_zip_s3key'] = 
										$most_recent_zip_s3key;


				}

				if (isset($delta_results['mysql_dump_file']))
					$backup_output['mysql_dump_file'] = $mysql_dump_file;
							 

				return $backup_output;

			}


		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			if (StackMover_GlobalMsgQ::HasInterruptSignal()) {

				StackMover_GlobalMsgQ::setStatus("Interrupted",-1,true);

			}
					

			return NULL;

		}
	}

		
	public function stackmover_show_s3buckets() {

		try {

			 $this->validate_nonce('aws-migrator-preprocess-nonce','stackmover_show_s3buckets');


			$access_key = StackMoverSanitizer::Sanitize('aws_access_key_id_val',$_POST['aws_access_key_id_val']);
			$secret_key = StackMoverSanitizer::Sanitize('aws_secret_access_key_val',$_POST['aws_secret_access_key_val']);		
			$aws_preset_s3_bucket = StackMoverSanitizer::Sanitize('aws_preset_s3_bucket',$_POST['aws_preset_s3_bucket']);

			$s3Checker = new StackMover_KeysChecker([
				'version'     => 'latest',
			    'access_key'    => $access_key,
			    'secret_key' => $secret_key,
			    'aws_preset_s3_bucket' => $aws_preset_s3_bucket,


			]);

			$bucketList = $s3Checker->getBuckets();

			wp_send_json($bucketList);
			wp_die();

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);

			wp_die();

		}

	}


	public function dirlist_for_Fancytree($dir, $order = "a", $ext = array()) {

	    $rootDir = array(
	        'title' => basename($dir),
	        "key" => $dir,
	        "folder" => true,
	        'children' => array()
	    );

	    $listDir = [];
	    array_push($listDir,$rootDir);

	    $files = array();
	    $dirs = array();

	    if($handler = opendir($dir))
	    {
	        while (($sub = readdir($handler)) !== FALSE)
	        {
	            if ($sub != "." && $sub != "..")
	            {
	                if(is_file($dir."/".$sub))
	                {
	                    $extension = pathinfo($dir."/".$sub, PATHINFO_EXTENSION);

	                   	$child = array();
	        			$child['folder'] = false;
	        			$child['title'] = $sub;
	        			$child['key'] = $dir."/".$sub;

						array_push($listDir[0]['children'],$child);

	                    //if(in_array($extension, $ext)) {
	                     $files []= $sub;
	                    //}
	                }elseif(is_dir($dir."/".$sub))
	                {
	                    $dirs []= $dir."/".$sub;
	                }
	            }
	        }

	        if($order === "a") {
	            asort($dirs);
	        } else {
	            arsort($dirs);
	        }

	        foreach($dirs as $d) {
	           $dir_child = $this->dirlist_for_Fancytree($d);
	           array_push($listDir[0]['children'],$dir_child[0]);

	        }

	      	closedir($handler);
	    }
	    return $listDir;
	}




	public function stackmover_get_dir_tree() {

		try {

			$srcdir = WP_CONTENT_DIR;
			$listDir = $this->dirlist_for_Fancytree($srcdir, $order = "a");

			$output = array();
			$output['val'] = $listDir;
			$output['status'] = STACKMOVER_SUCCESS;

			wp_send_json($output);
			wp_die();

		} catch (Exception $e) {

			$logger = new StackMoverLogger();
			$logger->write_log($e->getMessage());

			$output = array();
			$output['val'] = $e->getMessage();
			$output['status'] = STACKMOVER_FAILURE;

			wp_send_json($output);
			wp_die();

		}


	}

	/**
	 * Register the filters and actions with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {

		foreach ( $this->filters as $hook ) {
			add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		foreach ( $this->actions as $hook ) {
			add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ), $hook['priority'], $hook['accepted_args'] );
		}

		/* Add Misc Actions */
		add_action( 'wp_ajax_stackmover_check_aws_keys', 
					array( $this, 'stackmover_keys_checker' ) );


		add_action( 'wp_ajax_stackmover_show_s3buckets', 
					 array( $this,'stackmover_show_s3buckets' ) );
		add_action( 'wp_ajax_stackmover_create_s3', 
			         array( $this, 'stackmover_create_s3' ) );

		/* migration pre processors */
		add_action( 'wp_ajax_stackmover_aws_migrator_init', 
					 array( $this, 'stackmover_aws_migrator_init' ) );

		add_action( 'wp_ajax_stackmover_aws_migrator_get_status', 
					 array( $this, 'stackmover_aws_migrator_get_status' ) );


		add_action( 'wp_ajax_stackmover_aws_migrator_get_lightsail_log', 
					 array( $this, 'stackmover_aws_migrator_get_lightsail_log' ) );

		add_action( 'wp_ajax_stackmover_aws_migrator_interrupt_migration', 
					 array( $this, 'stackmover_aws_migrator_interrupt_migration' ) );


		add_action( 'wp_ajax_stackmover_getlightsailAZs', 
					 array( $this, 'stackmover_getlightsailAZs' ) );

		/* priority 10, accepted arg 1
		** https://developer.wordpress.org/reference/functions/add_action/
		*/
		add_action( 'stackmover_migration_process_action', 
					 array( $this, 'stackmover_migrate'),10,1);
		add_action( 'stackmover_lightsail_status_check_action', 
					 array( $this, 'stackmover_trigger_lightsail_statuscheck'),10,1);


		add_action( 'wp_ajax_stackmover_get_dir_tree', 
					 array( $this, 'stackmover_get_dir_tree' ));
		


	
	}

}
