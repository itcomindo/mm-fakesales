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


// Define plugin path.
define( 'FAK_PATH', plugin_dir_path( __FILE__ ) );

// Define plugin URL.
define( 'FAK_URL', plugin_dir_url( __FILE__ ) );

/**
 * Check CF Loaded
 */
function fak_call_carbon_fields() {
	if ( ! class_exists( '\Carbon_Fields\Carbon_Fields' ) ) {
		require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}
}

/**
 * MCS CF Loaded
 */
function fak_cf_loaded() {
	if ( ! function_exists( 'carbon_fields_boot_plugin' ) ) {
		fak_call_carbon_fields();
	}
}
add_action( 'plugins_loaded', 'fak_cf_loaded' );

// required files.
require_once FAK_PATH . 'components/components.php';
require_once FAK_PATH . 'assets/assets.php';
require_once FAK_PATH . 'fak-options.php';
