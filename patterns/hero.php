<?php
/**
 * Title: Hero
 * Slug: bloqra/hero
 * Categories: bloqra, banner
 * Description: Centered hero with eyebrow, large heading, intro text, buttons and a decorative preview panel.
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
		<!-- wp:paragraph {"align":"center","className":"is-style-pill"} -->
		<p class="has-text-align-center is-style-pill"><?php echo esc_html__( '✦ Powered by Bloqra Blocks', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"huge"} -->
		<h1 class="wp-block-heading has-text-align-center has-huge-font-size"><?php echo wp_kses_post( __( 'Build beautiful WordPress sites, <mark style="background-color:rgba(0,0,0,0);color:#5511f8" class="has-inline-color">block by block</mark>', 'bloqra' ) ); ?></h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"color":{"text":"#4b5563"}}} -->
		<p class="has-text-align-center has-text-color has-large-font-size" style="color:#4b5563"><?php echo esc_html__( 'Bloqra is a modern, professional block theme that looks polished the moment you activate it. Pair it with the free Bloqra blocks plugin to design every page visually — no code required.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|xs"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--xs)">
			<!-- wp:button {"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/contact"><?php echo esc_html__( 'Get started free', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
			<!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="https://wordpress.org/plugins/bloqra/"><?php echo esc_html__( 'Explore Bloqra blocks', 'bloqra' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"},"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"}},"border":{"radius":"16px"},"shadow":"var:preset|shadow|primary-glow"},"gradient":"primary","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignwide has-primary-gradient-background has-background" style="border-radius:16px;margin-top:var(--wp--preset--spacing--xl);padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md);box-shadow:var(--wp--preset--shadow--primary-glow)">
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|sm"},"border":{"radius":"12px"}},"backgroundColor":"white","layout":{"type":"default"}} -->
		<div class="wp-block-group has-white-background-color has-background" style="border-radius:12px;padding-top:var(--wp--preset--spacing--md);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md);padding-left:var(--wp--preset--spacing--md)">
			<!-- wp:columns -->
			<div class="wp-block-columns">
				<!-- wp:column {"width":"60%"} -->
				<div class="wp-block-column" style="flex-basis:60%">
					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
					<div class="wp-block-group">
						<!-- wp:group {"style":{"spacing":{"padding":{"top":"6px","bottom":"6px","left":"6px","right":"6px"}},"border":{"radius":"6px"}},"backgroundColor":"primary-100","layout":{"type":"default"}} -->
						<div class="wp-block-group has-primary-100-background-color has-background" style="border-radius:6px;padding:6px"></div>
						<!-- /wp:group -->
						<!-- wp:heading {"level":3,"fontSize":"large"} -->
						<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Your homepage, already designed', 'bloqra' ); ?></h3>
						<!-- /wp:heading -->
					</div>
					<!-- /wp:group -->
					<!-- wp:paragraph -->
					<p><?php echo esc_html__( 'Hero sections, feature grids, testimonials and calls to action come ready to edit in the Site Editor.', 'bloqra' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:column -->
				<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}}} -->
				<div class="wp-block-column" style="flex-basis:40%">
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|xs","bottom":"var:preset|spacing|xs","left":"var:preset|spacing|xs","right":"var:preset|spacing|xs"},"blockGap":"4px"},"border":{"radius":"10px"}},"backgroundColor":"neutral-50","layout":{"type":"default"}} -->
					<div class="wp-block-group has-neutral-50-background-color has-background" style="border-radius:10px;padding:var(--wp--preset--spacing--xs)">
						<!-- wp:paragraph {"style":{"typography":{"fontSize":"32px","fontWeight":"700"},"color":{"text":"#5511f8"}}} -->
						<p class="has-text-color" style="color:#5511f8;font-size:32px;font-weight:700"><?php echo esc_html__( '40+', 'bloqra' ); ?></p>
						<!-- /wp:paragraph -->
						<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
						<p class="has-small-font-size"><?php echo esc_html__( 'Ready-made block patterns', 'bloqra' ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
