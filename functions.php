<?php

/**
 * Simplifii functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Simplifii
 * @since Simplifii 1.0
 */
if ( ! function_exists( 'simplifii_setup' ) ) {


	/**
	 * It adds support for the theme to use HTML5 markup, post thumbnails, and automatic feed links
	 */
	function simplifii_setup() {
		load_theme_textdomain( 'simplifii', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// WooCommerce support
		add_theme_support( 'woocommerce' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// add optin wp block styles
		add_theme_support( 'wp-block-styles' );
	}
	add_action( 'after_setup_theme', 'simplifii_setup' );
}


if ( ! function_exists( 'simplifii_styles' ) ) {

	/**
	 * It registers two stylesheets, then enqueues a third stylesheet that depends on the first two
	 */
	function simplifii_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;

		wp_register_style(
			'simplifii-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'simplifii-style' );
	}

	add_action( 'wp_enqueue_scripts', 'simplifii_styles' );
}
