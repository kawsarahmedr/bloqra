<?php
/**
 * Title: Features Grid
 * Slug: bloqra/features
 * Categories: bloqra, featured
 * Description: A section heading followed by a responsive grid of feature cards.
 * Keywords: features, services, grid, cards
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

$bloqra_features = array(
	array(
		'icon'  => 'icon-speed.svg',
		'title' => __( 'Fast by default', 'bloqra' ),
		'text'  => __( 'Lightweight, block-based markup with no jQuery or page-builder bloat — your pages load fast out of the box.', 'bloqra' ),
	),
	array(
		'icon'  => 'icon-design.svg',
		'title' => __( 'Full design control', 'bloqra' ),
		'text'  => __( 'Colors, typography and spacing are driven by theme.json, so global changes take seconds in the Site Editor.', 'bloqra' ),
	),
	array(
		'icon'  => 'icon-patterns.svg',
		'title' => __( 'Pattern library', 'bloqra' ),
		'text'  => __( 'Drop in ready-made hero, feature, pricing and testimonial sections, then make them yours.', 'bloqra' ),
	),
	array(
		'icon'  => 'icon-shop.svg',
		'title' => __( 'WooCommerce ready', 'bloqra' ),
		'text'  => __( 'Shop, cart, checkout and account pages are styled to match the theme the moment you install WooCommerce.', 'bloqra' ),
	),
	array(
		'icon'  => 'icon-responsive.svg',
		'title' => __( 'Responsive everywhere', 'bloqra' ),
		'text'  => __( 'Fluid typography and flexible layouts keep your site looking sharp on phones, tablets and desktops.', 'bloqra' ),
	),
	array(
		'icon'  => 'icon-access.svg',
		'title' => __( 'Accessible & ready', 'bloqra' ),
		'text'  => __( 'Sensible focus styles, semantic markup and translation-ready strings — built for everyone.', 'bloqra' ),
	),
);
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|2-xl"},"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--2-xl)">
	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"constrained","contentSize":"680px"}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"align":"center","className":"is-style-subheading"} -->
		<p class="has-text-align-center is-style-subheading"><?php echo esc_html__( 'Why Bloqra', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
		<!-- wp:heading {"textAlign":"center"} -->
		<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Everything you need to launch a great site', 'bloqra' ); ?></h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"align":"center","textColor":"neutral-600"} -->
		<p class="has-text-align-center has-neutral-600-color has-text-color"><?php echo esc_html__( 'A thoughtful set of building blocks that work together — from your homepage to your shop.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","minimumColumnWidth":"18rem"}} -->
	<div class="wp-block-group alignwide">
		<?php foreach ( $bloqra_features as $bloqra_feature ) : ?>
		<!-- wp:group {"className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<div class="wp-block-group is-style-card">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"12px","bottom":"12px","left":"12px","right":"12px"}},"border":{"radius":"10px"}},"backgroundColor":"primary-50","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
			<div class="wp-block-group has-primary-50-background-color has-background" style="border-radius:10px;padding-top:12px;padding-right:12px;padding-bottom:12px;padding-left:12px">
				<!-- wp:image {"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/' . $bloqra_feature['icon'] ) ); ?>" alt=""/></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
			<!-- wp:heading {"level":3,"fontSize":"large"} -->
			<h3 class="wp-block-heading has-large-font-size"><?php echo esc_html( $bloqra_feature['title'] ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"medium"} -->
			<p class="has-medium-font-size"><?php echo esc_html( $bloqra_feature['text'] ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
