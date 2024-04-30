<?php
/**
 *
 * Plugin Name: MM Fake Sales
 * Description: A plugin to fake sales
 * Version: 1.0.0
 * Author: Budi Haryono
 * Author URI: https://budiharyono.id
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package fak
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Check CF Loaded
 */
function fak_call_carbon_fields() {
	if ( ! class_exists( '\Carbon_Fields\Carbon_Fields' ) ) {
		require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	} else {
		return;
	}
}

/**
 * MCS CF Loaded
 */
function fak_cf_loaded() {
	if ( ! function_exists( 'carbon_fields_boot_plugin' ) ) {
		fak_call_carbon_fields();
	} else {
		return;
	}
}
add_action( 'plugins_loaded', 'fak_cf_loaded' );


/**
 * Check if the current environment is development mode or on production
 * development mode is when the server is localhost
 * output: boolean
 */
function fakesakes_is_devmode() {
	if ( isset( $_SERVER['REMOTE_ADDR'] ) && in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ), true ) ) {
		return true;
	}
	return false;
}



// Define plugin path.
define( 'FAK_PATH', plugin_dir_path( __FILE__ ) );

// Define plugin URL.
define( 'FAK_URL', plugin_dir_url( __FILE__ ) );



// required files.
require_once FAK_PATH . 'components/components.php';
require_once FAK_PATH . 'assets/assets.php';
require_once FAK_PATH . 'fak-options.php';
