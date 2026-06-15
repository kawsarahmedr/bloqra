<?php
/**
 * Title: About Page
 * Slug: bloqra/page-about
 * Categories: bloqra, about
 * Description: A complete About page with hero, story, stats and values.
 * Keywords: about, company, story, team, mission
 * Block Types: core/post-content
 * Post Types: page, wp_template
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","gradient":"soft-light","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-soft-light-gradient-background has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained","contentSize":"760px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-subheading"} -->
		<p class="has-text-align-center is-style-subheading"><?php echo esc_html__( 'About us', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"xxx-large"} -->
		<h1 class="wp-block-heading has-text-align-center has-xxx-large-font-size"><?php echo esc_html__( 'We believe great sites should be easy to build', 'bloqra' ); ?></h1>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","fontSize":"large","style":{"color":{"text":"#4b5563"}}} -->
		<p class="has-text-align-center has-text-color has-large-font-size" style="color:#4b5563"><?php echo esc_html__( 'Bloqra started with a simple idea: give everyone the tools to design a professional WordPress site without writing code or paying for a bloated page builder.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html__( 'Our mission', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"60%","style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
		<div class="wp-block-column" style="flex-basis:60%">
			<!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size"><?php echo esc_html__( 'We build open, standards-based tools for the block editor. No lock-in, no proprietary formats — just clean WordPress that you fully own.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"style":{"color":{"text":"#4b5563"}}} -->
			<p class="has-text-color" style="color:#4b5563"><?php echo esc_html__( 'Our theme and companion blocks plugin are free and GPL-licensed, because we think a beautiful, fast website shouldn’t be a luxury. Every pattern is crafted to be accessible, responsive and easy to make your own.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"primary-900","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-primary-900-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"xxx-large"} -->
			<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-xxx-large-font-size"><?php echo esc_html__( '40+', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","textColor":"primary-200"} -->
			<p class="has-text-align-center has-primary-200-color has-text-color"><?php echo esc_html__( 'Block patterns', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"xxx-large"} -->
			<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-xxx-large-font-size"><?php echo esc_html__( '100%', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","textColor":"primary-200"} -->
			<p class="has-text-align-center has-primary-200-color has-text-color"><?php echo esc_html__( 'Free & GPL', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"textAlign":"center","textColor":"white","fontSize":"xxx-large"} -->
			<h2 class="wp-block-heading has-text-align-center has-white-color has-text-color has-xxx-large-font-size"><?php echo esc_html__( '0', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center","textColor":"primary-200"} -->
			<p class="has-text-align-center has-primary-200-color has-text-color"><?php echo esc_html__( 'Lines of code required', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"},"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-subheading"} -->
		<p class="has-text-align-center is-style-subheading"><?php echo esc_html__( 'What we value', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'The principles behind Bloqra', 'bloqra' ); ?></h2>
		<!-- /wp:heading -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Open by default', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'We build on native WordPress so your content and design are always portable.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Performance first', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'Minimal CSS and zero render-blocking scripts keep your site quick and lean.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html__( 'Designed for everyone', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p><?php echo esc_html__( 'Accessibility and clear, translatable copy are part of every pattern we ship.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"bloqra/cta"} /-->
