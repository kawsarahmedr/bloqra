<?php
/**
 * Title: Highlight
 * Slug: bloqra/highlight
 * Categories: bloqra
 * Description: A two-column highlight section with a decorative panel and a checklist of benefits.
 * Keywords: highlight, benefits, checklist, feature
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","backgroundColor":"neutral-50","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-50-background-color has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:columns {"verticalAlignment":"center","align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xl"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|lg","bottom":"var:preset|spacing|lg","left":"var:preset|spacing|md","right":"var:preset|spacing|md"},"blockGap":"var:preset|spacing|xs"},"border":{"radius":"16px"},"shadow":"var:preset|shadow|large"},"gradient":"primary-accent","layout":{"type":"default"}} -->
			<div class="wp-block-group has-primary-accent-gradient-background has-background" style="border-radius:16px;padding-top:var(--wp--preset--spacing--lg);padding-right:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--lg);padding-left:var(--wp--preset--spacing--md);box-shadow:var(--wp--preset--shadow--large)">
				<!-- wp:heading {"level":3,"textColor":"white","fontSize":"x-large"} -->
				<h3 class="wp-block-heading has-white-color has-text-color has-x-large-font-size"><?php echo esc_html__( 'Design visually. Ship confidently.', 'bloqra' ); ?></h3>
				<!-- /wp:heading -->
				<!-- wp:paragraph {"textColor":"white"} -->
				<p class="has-white-color has-text-color"><?php echo esc_html__( 'Everything you place in the editor is exactly what your visitors see — pixel for pixel.', 'bloqra' ); ?></p>
				<!-- /wp:paragraph -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs","margin":{"top":"var:preset|spacing|sm"}}},"layout":{"type":"flex","flexWrap":"wrap"}} -->
				<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--sm)">
					<!-- wp:paragraph {"className":"is-style-pill","style":{"elements":{}}} -->
					<p class="is-style-pill"><?php echo esc_html__( 'theme.json', 'bloqra' ); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"is-style-pill"} -->
					<p class="is-style-pill"><?php echo esc_html__( 'Site Editor', 'bloqra' ); ?></p>
					<!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"is-style-pill"} -->
					<p class="is-style-pill"><?php echo esc_html__( 'Patterns', 'bloqra' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph {"className":"is-style-subheading"} -->
			<p class="is-style-subheading"><?php echo esc_html__( 'Built for the block editor', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:heading -->
			<h2 class="wp-block-heading"><?php echo esc_html__( 'A theme that gets out of your way', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"style":{"color":{"text":"#4b5563"}}} -->
			<p class="has-text-color" style="color:#4b5563"><?php echo esc_html__( 'Bloqra embraces native WordPress blocks so you are never locked into a proprietary builder. Edit globally, reuse patterns and keep full ownership of your content.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:list {"className":"is-style-checklist"} -->
			<ul class="wp-block-list is-style-checklist">
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Global styles for instant rebranding', 'bloqra' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Reusable, editable block patterns', 'bloqra' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Clean, standards-compliant markup', 'bloqra' ); ?></li>
				<!-- /wp:list-item -->
				<!-- wp:list-item -->
				<li><?php echo esc_html__( 'Works with your favorite plugins', 'bloqra' ); ?></li>
				<!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|sm"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--sm)">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/about"><?php echo esc_html__( 'Learn more', 'bloqra' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
