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
	Container::make( 'theme_options', 'FKS Options' )
	->add_fields(
		array(

			// checkbox to enable.
			Field::make( 'checkbox', 'fks_enable', 'Enable' )
			->set_option_value( 'yes' )
			->set_default_value( true )
			->set_help_text( 'Enable Fakesales' ),

			// select to choose position bottom left or bottom right.
			Field::make( 'select', 'fks_position', 'Position' )
			->add_options(
				array(
					'left'  => 'Left',
					'right' => 'Right',
				)
			)
			->set_default_value( 'left' )
			->set_help_text( 'Choose position' ),

			// slide duration.
			Field::make( 'text', 'fks_duration', 'Slide Duration' )
			->set_attribute( 'type', 'number' )
			->set_default_value( '5000' )
			->set_help_text( 'contoh: 5000' ),

			// content.
			Field::make( 'complex', 'fks', 'Fakesales' )
			->add_fields(
				array(

					// text_fks.
					Field::make( 'text', 'fakesales_head', 'Head' )
					->set_default_value( 'Budi Telah Membeli Bakso Sapi Urat' )
					->set_help_text( 'contoh: Budi Telah Membeli Lamborgini' ),

					// content_text_fks.
					Field::make( 'rich_text', 'fakesales_content', 'Content' )
					->set_default_value( 'Budi dari Ciledug Telah Membeli 10 unit lamborgini cash tanpa kredit <a href="#">Lihat Disini</a>' )
					->set_help_text( 'contoh: Budi dari Ciledug Telah Membeli 10 unit lamborgini cash tanpa kredit' ),

					// image_fks.
					Field::make( 'image', 'fakesales_image', 'Image' )
					->set_value_type( 'url' )
					->set_help_text( 'upload image jika ingin menampilkan image, NOte: ukuran image  adalah 80x80px' ),

				)
			),

			// select disable below screen width 767, 480.
			Field::make( 'select', 'fks_disable_on_screen', 'Disable on Screen Width' )
			->add_options(
				array(
					'767'  => '767px',
					'480'  => '480px',
					'none' => 'None',
				)
			)
			->set_default_value( '767' )
			->set_help_text( 'Disable on screen width below' ),
		)
	);
}
add_action( 'carbon_fields_register_fields', 'fak_options_fields' );
