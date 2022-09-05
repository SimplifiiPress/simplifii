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
		/*
		The above code is registering a new block style called "simplifii-no-gutters" with a label of "No Gutters".

		Args:
		  : The name of the block style. This is the name that will be used to refer to the block style in the Block Style Control.
		  : The label of the block style. This is what will be shown in the editor.
		Returns:
		  An array of block styles.
		*/
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
