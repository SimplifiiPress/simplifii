<?php
/**
 * functions.php
 *
 * @package simplifii
 * @author leogopal
 * @license GPL-2.0+
 */
if ( ! function_exists( 'simplifii_setup' ) ) {
	/**
	 * Setup theme
	 */
	function simplifii_setup() {

		load_theme_textdomain( 'simplifii', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Add support for post thumbnails.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1800, 9999 );

		// HTML5 semantic markup.
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
			)
		);
	}
}
add_action( 'after_setup_theme', 'simplifii_setup' );

if ( ! function_exists( 'simplifii_styles' ) ) {
	/**
	 * Enqueue styles
	 */
	function simplifii_styles() {

		wp_register_style(
			'simplifii-styles-google-fonts',
			simplifii_get_google_fonts_url()
		);

		wp_register_style(
			'simplifii-styles-blocks',
			get_template_directory_uri() . '/assets/css/blocks.css'
		);

		wp_register_style(
			'simplifii-styles-commons',
			get_template_directory_uri() . '/assets/css/commons.css'
		);

		$dependencies = apply_filters(
			'simplifii_style_dependencies',
			array(
				'simplifii-styles-google-fonts',
				'simplifii-styles-blocks',
				'simplifii-styles-commons',
			)
		);

		wp_enqueue_style(
			'simplifii-styles-front-end',
			get_template_directory_uri() . '/assets/css/front-end.css',
			$dependencies,
			wp_get_theme( 'simplifii' )->get( 'Version' )
		);
	}

	add_action( 'wp_enqueue_scripts', 'simplifii_styles' );
}

if ( ! function_exists( 'simplifii_editor_styles' ) ) {
	/**
	 * Enqueue editor styles
	 */
	function simplifii_editor_styles() {

		add_editor_style(
			array(
				'./assets/css/editor.css',
				'./assets/css/blocks.css',
				'./assets/css/commons.css',
				simplifii_get_google_fonts_url(),
			)
		);

	}

	add_action( 'admin_init', 'simplifii_editor_styles' );
}

if ( ! function_exists( 'simplifii_get_google_fonts_url' ) ) {
	/**
	 * Get Google Fonts URL
	 *
	 * Builds a Google Fonts request URL from the Google Fonts families used in theme.json.
	 * Based on a solution in the Blockbase and Tove theme (see readme.txt for licensing info).
	 *
	 * @return $simplifii_google_fonts_url
	 */
	function simplifii_get_google_fonts_url() {

		if ( ! class_exists( 'WP_Theme_JSON_Resolver_Gutenberg' ) ) {
			return '';
		}

		$theme_data = WP_Theme_JSON_Resolver_Gutenberg::get_merged_data()->get_settings();

		if ( empty( $theme_data['typography']['fontFamilies'] ) ) {
			return '';
		}

		$theme_families = ! empty( $theme_data['typography']['fontFamilies']['theme'] ) ? $theme_data['typography']['fontFamilies']['theme'] : array();

		$user_families = ! empty( $theme_data['typography']['fontFamilies']['user'] ) ? $theme_data['typography']['fontFamilies']['user'] : array();

		$font_families = array_merge( $theme_families, $user_families );

		if ( ! $font_families ) {
			return '';
		}

		$font_family_urls = array();

		foreach ( $font_families as $font_family ) {
			if ( ! empty( $font_family['google'] ) ) {
				$font_family_urls[] = $font_family['google'];
			}
		}

		if ( ! $font_family_urls ) {
			return '';
		}

		// Return a single request URL for all of the font families.
		return apply_filters(
			'simplifii_google_fonts_url',
			esc_url_raw( 'https://fonts.googleapis.com/css2?' . implode( '&', $font_family_urls ) . '&display=swap' )
		);
	}
}

/**
 * Block patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	require get_template_directory() . '/inc/block-patterns/block-patterns.php';
}

/**
 * Block styles..
 */
if ( function_exists( 'register_block_style' ) ) {
	require get_template_directory() . '/inc/block-styles/block-styles.php';
}
