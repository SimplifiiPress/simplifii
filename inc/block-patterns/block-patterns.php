<?php
/**
 * inc/block-patterns/block-patterns.php
 * Register original block patterns.
 *
 * @package simplifii
 * @author leogopal
 * @license GPL-2.0+
 */

if ( ! function_exists( 'simplifii_register_block_patterns' ) ) {
	/**
	 * Register block patterns
	 */
	function simplifii_register_block_patterns() {

		if ( ! function_exists( 'register_block_pattern_category' ) && function_exists( 'register_block_pattern' ) ) {
			return;
		}

		// Block patterns categories in Simplifii
		$simplifii_block_pattern_categories = apply_filters(
			'simplifii_block_pattern_categories',
			array(
				'simplifii-cta'        => array(
					'label' => esc_html( 'Simplifii Call to Action', 'simplifii' ),
				),
				'simplifii-cta-simple' => array(
					'label' => esc_html( 'Simplifii Simple Call to Action', 'simplifii' ),
				),
			)
		);

		// Sort the block pattern categories
		uasort(
			$simplifii_block_pattern_categories,
			function ( $a, $b ) {
				return strcmp( $a['label'], $b['label'] );
			}
		);

		// Register block pattern categories
		foreach ( $simplifii_block_pattern_categories as $slug => $settings ) {
			register_block_pattern_category( $slug, $settings );
		}

		// viewportWidth values
		$viewport = apply_filters(
			'simplifii_block_patterns_viewport',
			array(
				'full'         => 1440,
				'wide'         => 1312,
				'wide_grouped' => 1180,
				'content'      => 640,
			)
		);

		// Block patterns in Simplifii
		$simplifii_block_patterns = apply_filters(
			'simplifii_block_patterns',
			array(

				/*
				 * cta/text-button
				 */
				'simplifii/cta-text-button'            => array(
					'title'         => esc_html( 'Text and Button', 'simplifii' ),
					'categories'    => array( 'simplifii-cta' ),
					'viewportWidth' => $viewport['wide'],
					'content'       => simplifii_get_block_pattern_markup( 'cta/text-button' ),
				),

				/*
				 * cta/left-text-right-button
				 */
				'simplifii/cta-left-text-right-button' => array(
					'title'         => esc_html( 'Left Text and Right Button', 'simplifii' ),
					'categories'    => array( 'simplifii-cta' ),
					'viewportWidth' => $viewport['wide'],
					'content'       => simplifii_get_block_pattern_markup( 'cta/left-text-right-button' ),
				),

				/*
				 * cta/left-button-right-text
				 */
				'simplifii/cta-left-button-right-text' => array(
					'title'         => esc_html( 'Left Button and Right Text', 'simplifii' ),
					'categories'    => array( 'simplifii-cta' ),
					'viewportWidth' => $viewport['wide'],
					'content'       => simplifii_get_block_pattern_markup( 'cta/left-button-right-text' ),
				),

				/*
				 * cta/left-button-right-text
				 */
				'simplifii/cta-simple'                 => array(
					'title'         => esc_html( 'Simple Simple Call to Action', 'simplifii' ),
					'categories'    => array( 'simplifii-cta-simple' ),
					'viewportWidth' => $viewport['wide'],
					'content'       => simplifii_get_block_pattern_markup( 'cta-simple/simple' ),
				),

			)
		);

		// Register block patterns
		foreach ( $simplifii_block_patterns as $slug => $settings ) {
			register_block_pattern( $slug, $settings );
		}

	}

	add_action( 'init', 'simplifii_register_block_patterns' );
}

if ( ! function_exists( 'simplifii_get_block_pattern_markup' ) ) {
	/**
	 * Get Block Pattern Markup
	 *
	 * @param string $pattern_name like `cta/cta-horizontal`.
	 */
	function simplifii_get_block_pattern_markup( $pattern_name ) {

		$path = 'inc/block-patterns/' . $pattern_name . '.php';

		if ( ! locate_template( $path ) ) {
			return;
		}

		ob_start();
		include( locate_template( $path ) );

		return ob_get_clean();
	}
}
