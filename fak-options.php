<?php
/**
 *
 * Fak Options
 *
 * @package fak
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 *  Load Options Fields
 */
function fak_options_fields() {
	Container::make( 'theme_options', 'FAK Options' )
	->add_fields(
		array(
			Field::make( 'text', 'fak_title', 'Title' ),
			Field::make( 'textarea', 'fak_description', 'Description' ),
			Field::make( 'text', 'fak_button_text', 'Button Text' ),
			Field::make( 'text', 'fak_button_url', 'Button URL' ),
		)
	);
}
add_action( 'carbon_fields_register_fields', 'fak_options_fields' );
