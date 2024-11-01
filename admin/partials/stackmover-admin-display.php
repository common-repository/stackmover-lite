<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.stackmover.com
 * @since      1.0.0
 *
 * @package    StackMover
 * @subpackage StackMover/admin/partials
 */
?>


<div class="wrap">

    <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>

    <hr>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 'show-doc-link.php' ;?>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 'create-aws-keys.php' ;?>
	<br>
	<hr/>

	<br>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 'check-aws-keys.php' ;?>
	<br>
	<hr/>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 's3-bucket-options.php' ;?>
	<br>
	<hr/>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 's3-transfer-options.php' ;?>
	<br>
	<hr/>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 'aws-lightsail-options.php' ;?>
	<br>
	<hr/>

    <?php include  STACKMOVER_PLUGIN_VIEWSDIR . DIRECTORY_SEPARATOR . 'migrate-to-aws.php' ;?>
	<br>
	<hr/>



</div>

