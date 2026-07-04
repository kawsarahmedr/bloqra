<?php
/**
 * Title: Hero
 * Slug: bloqra/hero
 * Categories: bloqra, banner
 * Description: Centered hero with a large heading, intro text and buttons.
 * Keywords: hero, banner, heading, cta
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","gradient":"soft-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-soft-light-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained","contentSize":"820px"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"huge"} -->
		<h1 class="wp-block-heading has-text-align-center has-huge-font-size"><?php
		printf(
			/* translators: %s: the highlighted part of the heading, e.g. "block by block". */
			esc_html__( 'Build beautiful WordPress sites, %s', 'bloqra' ),
			'<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-500-color">' . esc_html__( 'block by block', 'bloqra' ) . '</mark>'
		);
	?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","textColor":"neutral-600","fontSize":"large"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color has-large-font-size"><?php echo esc_html__( 'Bloqra is a modern, professional block theme that looks polished the moment you activate it. Design every page visually in the Site Editor — no code required.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs)">
			<!-- wp:button {"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Get started free', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="#"><?php echo esc_html__( 'Learn more', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:separator {"align":"center","className":"is-style-gradient","style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} -->
		<hr class="wp-block-separator aligncenter has-alpha-channel-opacity is-style-gradient" style="margin-top:var(--wp--preset--spacing--md)"/>
		<!-- /wp:separator -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
