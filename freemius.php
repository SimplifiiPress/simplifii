<?php
/* This is a PHP function that checks if the function `sim_fs` already exists. If it does, then it will
not be defined again. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/* This is a PHP function that checks if the function `sim_fs` already exists. If it does, then it will
not be defined again. */
if ( ! function_exists( 'sim_fs' ) ) {
	// Create a helper function for easy SDK access.
	function sim_fs() {
		 global $sim_fs;

		if ( ! isset( $sim_fs ) ) {
			// Include Freemius SDK.
			require_once dirname( __FILE__ ) . '/freemius/start.php';

			$sim_fs = fs_dynamic_init(
				array(
					'id'             => '10999',
					'slug'           => 'simplifii',
					'type'           => 'theme',
					'public_key'     => 'pk_dcceb7c5540d2fb5c0ae4ff184bab',
					'is_premium'     => false,
					'has_addons'     => false,
					'has_paid_plans' => false,
					'menu'           => array(
						'slug'    => 'simplifii',
						'account' => false,
						'parent'  => array(
							'slug' => 'options-general.php',
						),
					),
				)
			);
		}

		return $sim_fs;
	}

	// Init Freemius.
	sim_fs();
	// Signal that SDK was initiated.
	do_action( 'sim_fs_loaded' );
}
