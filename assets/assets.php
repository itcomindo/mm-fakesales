<?php
/**
 *
 * Assets
 *
 * @package fak
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

/**
 * Load Assets CSS and JS
 */
function fakesales_assets() {

	// Load animate.css library from CDN.
	wp_enqueue_style( 'animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1', 'all' );

	$suffix = fakesakes_is_devmode() ? '' : '.min';

	wp_enqueue_style( 'fak-css', FAK_URL . 'assets/css/fak' . $suffix . '.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'fak-js', FAK_URL . 'assets/js/fak' . $suffix . '.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fakesales_assets' );
