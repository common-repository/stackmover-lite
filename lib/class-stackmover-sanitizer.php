<?php
if (!defined('STACKMOVER_PLUGIN_BASEDIR')) die('Error: Cannot access files directly.');

class StackMoverSanitizer {


/**
 * Recursive sanitation for text or array
 * 
 * @param $array_or_string (array|string)
 * @since  0.1
 * @return mixed
 */
	public static function sanitize_text_or_array_field($array_or_string) {
	    if( is_string($array_or_string) ){
	        $array_or_string = sanitize_text_field($array_or_string);
	    }elseif( is_array($array_or_string) ){
	        foreach ( $array_or_string as $key => &$value ) {
	            if ( is_array( $value ) ) {
	                $value = StackMoverSanitizer::sanitize_text_or_array_field($value);
	            }
	            else {
	                $value = sanitize_text_field( $value );
	            }
	        }
	    }

	    return $array_or_string;
	}

	public static function Sanitize($key,$value) {

		switch ($key) {
		
			case 'aws_access_key_id_val':
				return sanitize_text_field($value);
				break;

			case 'aws_secret_access_key_val':
				return sanitize_text_field($value);
				break;

			case 'bucketname':
				return sanitize_text_field($value);
				break;

			case 'region':
				return sanitize_text_field($value);
				break;

			case 'tag':
				return sanitize_text_field($value);
				break;

			case 'use_incremental_backup':
				return intval($value);
				break;

			case 'transfer_database':
				return intval($value);
				break;

			case 'transfer_plugins':
				return intval($value);
				break;

			case 'transfer_themes':
				return intval($value);
				break;

			case 'do_not_transfer_files':
				return sanitize_text_field($value);
				break;

			case 'db_search_string_val':
				return sanitize_text_field($value);
				break;

			case 'db_replace_string_val':
				return sanitize_text_field($value);
				break;

			case 'availabilityZone':
				return sanitize_text_field($value);
				break;


			case 'blueprintId':
				return sanitize_text_field($value);
				break;


			case 'bundleId':
				return sanitize_text_field($value);
				break;


			case 'instanceNames':
				return sanitize_text_field($value);
				break;

			case 'aws_s3_region':
				return sanitize_text_field($value);
				break;

			case 'customFiles':
				return StackMoverSanitizer::sanitize_text_or_array_field($value);
				break;

			default:
				return StackMoverSanitizer::sanitize_text_or_array_field($value);
				break;

		}
	}
}


?>
