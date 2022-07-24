<?php
/**
 * inc/block-styles/block-styles.php
 * Register original block styles.
 *
 * @package simplifii
 * @author leogopal
 * @license GPL-2.0+
 */

if ( ! function_exists( 'simplifii_register_block_styles' ) ) {
	/**
	 * Register Block styles
	 */
	function simplifii_register_block_styles() {

		if ( ! function_exists( 'register_block_style' ) ) {
			return;
		}

		// No Gutters
		register_block_style(
			'core/columns',
			array(
				'name'  => 'simplifii-no-gutters',
				'label' => esc_html__( 'No Gutters', 'simplifii' ),
			)
		);

	}
	add_action( 'init', 'simplifii_register_block_styles' );
}
