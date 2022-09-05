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
if (!function_exists('simplifii_setup')) {


	/**
	 * It adds support for the theme to use HTML5 markup, post thumbnails, and automatic feed links
	 */
	function simplifii_setup()
	{
		load_theme_textdomain('simplifii', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		add_theme_support('woocommerce');

		// Add support for editor styles.
		add_theme_support('editor-styles');
		add_theme_support('block-nav-menus');


		// Add support for post thumbnails.
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size(1800, 9999);

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
add_action('after_setup_theme', 'simplifii_setup');

if (!function_exists('simplifii_styles')) {

	/**
	 * It registers two stylesheets, then enqueues a third stylesheet that depends on the first two
	 */
	function simplifii_styles()
	{
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
				'simplifii-styles-blocks',
				'simplifii-styles-commons',
			)
		);

		wp_enqueue_style(
			'simplifii-styles-front-end',
			get_template_directory_uri() . '/assets/css/front-end.css',
			false, //$dependencies,
			wp_get_theme('simplifii')->get('Version')
		);
	}

	// add_action('wp_enqueue_scripts', 'simplifii_styles');
}

if (!function_exists('simplifii_editor_styles')) {

	/**
	 * It registers two stylesheets, then enqueues a third stylesheet that depends on the first two
	 */
	function simplifii_editor_styles()
	{
		add_editor_style(
			array(
				'./assets/css/editor.css',
				// './assets/css/blocks.css',
				// './assets/css/commons.css',
			)
		);
	}

	add_action('admin_init', 'simplifii_editor_styles');
}


/* It's checking if the function `register_block_pattern` exists. If it does, it will require the file
`block-patterns.php` from the `inc/block-patterns` directory. */
if (function_exists('register_block_pattern')) {
	require get_template_directory() . '/inc/block-patterns/block-patterns.php';
}


/* It's checking if the function `register_block_style` exists. If it does, it will require the file
`block-styles.php` from the `inc/block-styles` directory. */
if (function_exists('register_block_style')) {
	require get_template_directory() . '/inc/block-styles/block-styles.php';
}
