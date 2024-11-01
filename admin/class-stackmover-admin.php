<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.stackmover.com
 * @since      1.0.0
 *
 * @package    StackMover
 * @subpackage StackMover/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    StackMover
 * @subpackage StackMover/admin
 * @author     StackMover Team <support@stackmover.com>
 */

class StackMover_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}


	/**
	 * Show the plugin in settings page
	 * Top level function
	 *
	 * @since    1.0.0
	 */

	public function display_plugin_setup_page() {
		$display_file = 'partials/' . $this->plugin_name .'-admin-display.php';
	    include_once( $display_file );
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/stackmover-admin.css', array(), $this->version, 'all' );

	}

	/* Add plugin to menu */

	public function add_plugin_admin_menu() {

    /*
     * Add a settings page for this plugin to the Settings menu.
     *
     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
     *
     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
     *
     */

    	//add_options_page( 'AWS Cloud Mover', 'CloudMover', 'manage_options', 
    	//				  $this->plugin_name, 
    	//				  array($this, 'display_plugin_setup_page'));    



    	add_menu_page('AWS StackMover', 'StackMover', 'manage_options', $this->plugin_name, 
    					  array($this, 'display_plugin_setup_page'), plugins_url( 'stackmover-lite/images/icon.svg' ) );
	}




	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/stackmover-admin.js', array( 'jquery' ), $this->version, false );
	
		wp_enqueue_script( 'check-aws-keys', plugin_dir_url( __FILE__ ) . 'js/check-aws-keys.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 's3-create-buckets.js', plugin_dir_url( __FILE__ ) . 'js/s3-create-buckets.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( 's3-show-buckets.js', plugin_dir_url( __FILE__ ) . 'js/s3-show-buckets.js', array( 'jquery' ), $this->version, false );


		wp_enqueue_script( 'aws-migrator-preprocess.js', plugin_dir_url( __FILE__ ) . 'js/aws-migrator-preprocess.js', array( 'jquery' ), $this->version, false );


		wp_enqueue_script( 'stackmover-ls-options.js', plugin_dir_url( __FILE__ ) . 'js/stackmover-ls-options.js', array( 'jquery' ), $this->version, false );
		
		wp_enqueue_script( 'display-dir-tree.js', plugin_dir_url( __FILE__ ) . 'js/display-dir-tree.js', array( 'jquery' ), $this->version, false );

		/**
		 * Add nonce to be used in AJAX calls
		 * By default, a nonce has a lifetime of one day. 
		 * After that, the nonce is no longer valid even if it matches the action string
		 * https://codex.wordpress.org/WordPress_Nonces
		 */

		/* Create one nonce for all AJAX as they are all chained together.
		*
		*/

		$glob_nonce = wp_create_nonce('aws-migrator-preprocess-nonce');

		wp_localize_script('check-aws-keys', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));

		wp_localize_script('s3-create-buckets.js', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));

		wp_localize_script('s3-show-buckets.js', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));

		wp_localize_script('aws-migrator-preprocess.js', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));

		wp_localize_script('stackmover-ls-options.js', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));


		wp_localize_script('display-dir-tree.js', 'migratorAjax', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'security' => $glob_nonce
		));



	}

}
