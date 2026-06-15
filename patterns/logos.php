<?php
/**
 * Title: Logo Strip
 * Slug: bloqra/logos
 * Categories: bloqra
 * Description: A simple social-proof strip of text logos.
 * Keywords: logos, trusted, social proof
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"var:preset|font-size|small","textTransform":"uppercase","letterSpacing":"0.08em"}},"textColor":"neutral-500"} -->
	<p class="has-text-align-center has-neutral-500-color has-text-color" style="font-size:var(--wp--preset--font-size--small);letter-spacing:0.08em;text-transform:uppercase"><?php echo esc_html__( 'Trusted by makers and teams worldwide', 'bloqra' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|lg","margin":{"top":"var:preset|spacing|sm"}},"typography":{"fontSize":"var:preset|font-size|large","fontWeight":"700","letterSpacing":"-0.02em"}},"textColor":"neutral-400","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide has-neutral-400-color has-text-color" style="margin-top:var(--wp--preset--spacing--sm);font-size:var(--wp--preset--font-size--large);font-weight:700;letter-spacing:-0.02em">
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0">Northwind</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0">Lumen</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0">Quartz</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0">Evergreen</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
		<p style="margin-top:0;margin-bottom:0">Helio</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
