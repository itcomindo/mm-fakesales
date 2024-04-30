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

	$fks = count( carbon_get_theme_option( 'fks' ) );
	if ( $fks > 1 ) {
		// Load https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js.
		wp_enqueue_style( 'slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css', array(), '1.9.0', 'all' );

		wp_enqueue_script( 'slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js', array( 'jquery' ), '1.9.0', true );
	}

	wp_enqueue_style( 'fak-css', FAK_URL . 'assets/css/fak' . $suffix . '.css', array(), '1.0.0', 'all' );
	wp_enqueue_script( 'fak-js', FAK_URL . 'assets/js/fak' . $suffix . '.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'fakesales_assets' );
