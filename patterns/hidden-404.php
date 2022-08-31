<?php

/**
 * Title: Hidden 404
 * Slug: simplifii/hidden-404
 * Inserter: no
 */
?>

<!-- wp:heading {"className":"has-text-align-center","fontSize":"xx-large"} -->
<h2 class="has-text-align-center has-xx-large-font-size"><?php echo esc_html_x( '404', 'Error code for a webpage that is not found.', 'simplifii' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
<p class="has-text-align-center"><?php echo esc_html_x( 'This page could not be found.', 'Message to convey that a webpage could not be found', 'simplifii' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"var(--wp--preset--spacing--100)"} -->
<div style="height:var(--wp--preset--spacing--100)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:search {"label":"<?php echo esc_html_x( 'Search', 'label', 'simplifii' ); ?>","placeholder":"<?php echo esc_html_x( 'Search...', 'placeholder for search field', 'simplifii' ); ?>","showLabel":false,"width":70,"widthUnit":"%","buttonText":"<?php esc_html_e( 'Search', 'simplifii' ); ?>","buttonUseIcon":true,"align":"center"} /-->
