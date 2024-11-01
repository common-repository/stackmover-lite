<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://www.stackmover.com
 * @since             1.0.0
 * @package           StackMover
 *
 * @wordpress-plugin
 * Plugin Name:       StackMover Lite
 * Plugin URI:        https://www.stackmover.com
 * Description:       Clone your wordpress to Amazon LightSail with single click. StackMover migrates database and other assets to AWS S3, bootstraps and migrate assets to a LightSail instance and builds a clone setup with just one click.
 * Version:           1.0.1
 * Author:            Team StackMover
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       stackmover
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-stackmover-activator.php
 */
function activate_stackmover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stackmover-activator.php';

	if ( version_compare( PHP_VERSION, '5.3', '<' ) ) {
		wp_print_styles( 'open-sans' );
		echo "<style>body{margin: 0 2px;font-family: 'Open Sans',sans-serif;font-size: 13px;line-height: 1.5em;}</style>";
		echo wp_kses_post( __( '<b>StackMover requires PHP 5.3 or higher. Plugin activation did not complete successfully.</b>', 'StackMover' ) ) . '<br />' . esc_attr__( 'Please upgrade to version 5.3 or above of PHP.', 'StackMover' );
		exit();

	} else {
		StackMover_Activator::activate();
	}


}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-stackmover-deactivator.php
 */
function deactivate_stackmover() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-stackmover-deactivator.php';
	StackMover_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stackmover' );
register_deactivation_hook( __FILE__, 'deactivate_stackmover' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-stackmover.php';

require plugin_dir_path( __FILE__ ) . 'constants.php';


/**
 * Begins execution of the plugin.
 *
 *
 * @since    1.0.0
 */

	
function run_stackmover() {

	$plugin = new StackMover();
	$plugin->run();

}

run_stackmover();

