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
	$enable = true;
	if ( true === $enable ) {
		?>
		<div id="fak">
			<div id="fak-wr">
				<div class="fak-item fak-text">
					<h3 class="fak-head">Bakso Sapi Pak Mulyono</h3>
					<span class="fak-content">Kevin telah membeli Bakso Sapi Pak Mulyono sebanyak 10 mangkok pada 20 Oktober 1880.</span>
					<a href="#" class="fak-link">Detail</a>
				</div>
			</div>
		</div>
		<?php
	}
}
add_action( 'wp_footer', 'fak_container' );