<?php
/**
 *
 * FAQ Container
 *
 * @package fak
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );


/**
 * FAK Container
 */
function fak_container() {
	$enable                = carbon_get_theme_option( 'fks_enable' );
	$fks_disable_on_screen = carbon_get_theme_option( 'fks_disable_on_screen' );
	if ( 767 === $fks_disable_on_screen ) {
		$disabled_on = '767';
	} elseif ( 480 === $fks_disable_on_screen ) {
		$disabled_on = '480';
	} else {
		$disabled_on = 'false';
	}

	$position = carbon_get_theme_option( 'fks_position' );
	if ( 'left' === $position ) {
		$position = 'left';
	} else {
		$position = 'right';
	}

	$fks = count( carbon_get_theme_option( 'fks' ) );
	if ( $fks > 1 ) {
		$load_sclick    = 'data-fak-slide=true';
		$duration_slick = 'data-fak-duration=' . carbon_get_theme_option( 'fks_duration' ) . '';
	} else {
		$load_sclick    = '';
		$duration_slick = '';
	}
	if ( true === $enable ) {
		?>
		<div id="fak" class="fak-position-<?php echo esc_html( $position ); ?>" data-fakdis="<?php echo esc_html( $disabled_on ); ?>">
			<div id="fak-wr" <?php echo esc_attr( $load_sclick ) . ' ' . esc_html( $duration_slick ); ?>>
				<?php
				fak_content();
				?>
			</div>
		</div>
		<?php
	}
}
add_action( 'wp_footer', 'fak_container' );


/**
 * FAK Content
 */
function fak_content() {
	$pass = fak_kses( array( 'div', 'span', 'p', 'a', 'b', 'strong', 'i', 'u', 'ul', 'ol', 'li', 'img' ) );
	$fks  = carbon_get_theme_option( 'fks' );
	if ( $fks ) {
		foreach ( $fks as $fk ) {
			$fakesales_head    = $fk['fakesales_head'];
			$fakesales_content = wpautop( $fk['fakesales_content'] );

			$fakesales_image = $fk['fakesales_image'];
			if ( $fakesales_image ) {
				$fakesales_content = '<div class="fak-content fak-has-image"><div class="fak-img-wr"><img class="fak-find-this" src="' . $fakesales_image . '" alt="' . $fakesales_head . '" title="' . $fakesales_head . '"></div><div class="fak-content-wr">' . $fakesales_content . '</div></div>';
			} else {
				$fakesales_content = '<div class="fak-content">' . $fakesales_content . '</div>';
			}

			?>
			<div class="fak-item">
				<h3 class="fak-head"><?php echo esc_html( $fakesales_head ); ?></h3>
				<?php echo wp_kses( $fakesales_content, $pass ); ?>
			</div>
			<?php
		}
	} else {
		fak_dummy_content();
	}
}



/**
 * FAK Dummy Content
 */
function fak_dummy_content() {
	?>
	<div class="fak-item fak-text">
		<h3 class="fak-head">Bakso Sapi Pak Mulyono</h3>
		<span class="fak-content">Kevin telah membeli Bakso Sapi Pak Mulyono sebanyak 10 mangkok pada 20 Oktober 1880.</span> <a href="#" class="fak-link">Detail</a>
	</div>
	<?php
}