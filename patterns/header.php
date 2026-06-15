<?php
/**
 * Title: Header
 * Slug: bloqra/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Site header with logo, navigation and a call-to-action button.
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs"}},"background":{"backgroundImage":""}},"backgroundColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--xs);padding-bottom:var(--wp--preset--spacing--xs)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:site-logo {"width":40} /-->
			<!-- wp:site-title {"level":0} /-->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right","flexWrap":"wrap"}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Home', 'Navigation link label', 'bloqra' ); ?>","url":"/","kind":"custom","isTopLevelLink":true} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Blog', 'Navigation link label', 'bloqra' ); ?>","url":"/blog","kind":"custom","isTopLevelLink":true} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'About', 'Navigation link label', 'bloqra' ); ?>","url":"/about","kind":"custom","isTopLevelLink":true} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Contact', 'Navigation link label', 'bloqra' ); ?>","url":"/contact","kind":"custom","isTopLevelLink":true} /-->
			<!-- /wp:navigation -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/contact"><?php echo esc_html_x( 'Get Started', 'Header button', 'bloqra' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
