<?php
if (!defined('ABSPATH')) {
	exit;
}

if (!function_exists('sim_fs')) {
	// Create a helper function for easy SDK access.
	function sim_fs()
	{
		global $sim_fs;

		if (!isset($sim_fs)) {
			// Include Freemius SDK.
			require_once dirname(__FILE__) . '/freemius/start.php';

			add_submenu_page(
				'themes.php',
				__('Simplifii', 'simplifii'),
				__('Simplifii', 'simplifii'),
				'themes.php',
				'simplifii',
				'simplifii_callback'
			);

			$sim_fs = fs_dynamic_init(array(
				'id'                  => '10999',
				'slug'                => 'simplifii',
				'type'                => 'theme',
				'public_key'          => 'pk_dcceb7c5540d2fb5c0ae4ff184bab',
				'is_premium'          => false,
				'has_addons'          => false,
				'has_paid_plans'      => false,
				'is_org_compliant'    => true,
				'menu'                => array(
					'slug'           => 'simplifii',
					'parent'         => array(
						'slug' => 'themes.php',
					),
				),
			));
		}

		return $sim_fs;
	}

	// Init Freemius.
	sim_fs();
	// Signal that SDK was initiated.
	do_action('sim_fs_loaded');

	function my_custom_is_submenu_visible($is_visible, $menu_id)
	{
		if ('contact' != $menu_id) {
			return $is_visible;
		}

		return sim_fs()->can_use_premium_code();
	}

	sim_fs()->add_filter(
		'is_submenu_visible',
		'my_custom_is_submenu_visible',
		10,
		2
	);
}

function sim_fs_custom_connect_message_on_update(
	$message,
	$user_first_name,
	$theme_title,
	$user_login,
	$site_link,
	$freemius_link
) {
	return sprintf(
		__('Hey %1$s') . ',<br>' .
			__('Please help us improve %2$s! If you opt-in, some data about your usage of %2$s will be sent to %5$s. If you skip this, that\'s okay! %2$s will still work just fine.', 'simplifii'),
		$user_first_name,
		'<b>' . $theme_title . '</b>',
		'<b>' . $user_login . '</b>',
		$site_link,
		$freemius_link
	);
}

sim_fs()->add_filter('connect_message_on_update', 'sim_fs_custom_connect_message_on_update', 10, 6);
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

		// WooCommerce support
		add_theme_support('woocommerce');

		// Add support for editor styles.
		add_theme_support('editor-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');

		// add optin wp block styles
		add_theme_support('wp-block-styles');
	}
	add_action('after_setup_theme', 'simplifii_setup');
}


if (!function_exists('simplifii_styles')) {

	/**
	 * It registers two stylesheets, then enqueues a third stylesheet that depends on the first two
	 */
	function simplifii_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;

		wp_register_style(
			'simplifii-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style('simplifii-style');
	}

	add_action('wp_enqueue_scripts', 'simplifii_styles');
}
