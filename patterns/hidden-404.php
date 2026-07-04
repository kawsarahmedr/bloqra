<?php
/**
 * Title: 404 content
 * Slug: bloqra/hidden-404
 * Inserter: no
 * Description: Heading, message, search form and homepage link for the 404 template.
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"huge"} -->
	<h1 class="wp-block-heading has-text-align-center has-huge-font-size"><?php echo esc_html_x( '404', 'Error code on the 404 template', 'bloqra' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:heading {"textAlign":"center","level":2} -->
	<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Page not found', 'bloqra' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center"} -->
	<p class="has-text-align-center"><?php echo esc_html__( 'The page you are looking for doesn’t exist or has been moved. Try a search, or head back home.', 'bloqra' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'Search form label', 'bloqra' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search…', 'Search form placeholder', 'bloqra' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'Search form button', 'bloqra' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"align":"center"} /-->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/"><?php echo esc_html__( 'Back to homepage', 'bloqra' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->
