<?php
/**
 * Title: Call to Action
 * Slug: bloqra/cta
 * Categories: bloqra, call-to-action
 * Description: A full-width gradient call-to-action with heading, text and buttons.
 * Keywords: cta, call to action, banner, signup
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"align":"wide","gradient":"primary-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl","left":"var:preset|spacing|lg","right":"var:preset|spacing|lg"},"blockGap":"var:preset|spacing|sm"},"border":{"radius":"20px"}},"layout":{"type":"constrained","contentSize":"720px"}} -->
	<div class="wp-block-group alignwide has-primary-dark-gradient-background has-background" style="border-radius:20px;padding-top:var(--wp--preset--spacing--xl);padding-right:var(--wp--preset--spacing--lg);padding-bottom:var(--wp--preset--spacing--xl);padding-left:var(--wp--preset--spacing--lg)">
		<!-- wp:paragraph {"align":"center","className":"is-style-subheading","style":{"elements":{},"color":{"text":"#00d5be"}}} -->
		<p class="has-text-align-center is-style-subheading has-text-color" style="color:#00d5be"><?php echo esc_html__( 'Ready when you are', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-xx-large-font-size"><?php echo esc_html__( 'Launch your site with Bloqra today', 'bloqra' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","textColor":"primary-100"} -->
		<p class="has-text-align-center has-primary-100-color has-text-color"><?php echo esc_html__( 'Activate the theme, install the free Bloqra blocks plugin, and start building beautiful pages in minutes.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs)">
			<!-- wp:button {"backgroundColor":"white","textColor":"primary-700","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary-700"}}}},"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-primary-700-color has-white-background-color has-text-color has-background wp-element-button" href="/contact"><?php echo esc_html__( 'Get started free', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
			<!-- wp:button {"textColor":"white","style":{"border":{"color":"var:preset|color|white"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color has-border-color wp-element-button" style="border-color:var(--wp--preset--color--white)" href="https://wordpress.org/plugins/bloqra/"><?php echo esc_html__( 'Get the plugin', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
