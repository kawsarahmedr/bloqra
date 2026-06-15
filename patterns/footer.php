<?php
/**
 * Title: Footer
 * Slug: bloqra/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Site footer with branding, navigation columns and a copyright row.
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|2-xl","bottom":"var:preset|spacing|xl"}}},"backgroundColor":"neutral-900","textColor":"neutral-300","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-neutral-300-color has-neutral-900-background-color has-text-color has-background" style="padding-top:var(--wp--preset--spacing--2-xl);padding-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|lg"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"40%","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
		<div class="wp-block-column" style="flex-basis:40%">
			<!-- wp:site-title {"level":0,"style":{"typography":{"fontSize":"var:preset|font-size|large"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} /-->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p class="has-small-font-size"><?php echo esc_html__( 'A modern WordPress block theme and the free companion to the Bloqra Gutenberg blocks plugin. Build beautiful sites — no code required.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","size":"has-normal-icon-size","className":"is-style-logos-only","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|xs"}}}} -->
			<ul class="wp-block-social-links has-icon-color is-style-logos-only">
				<!-- wp:social-link {"url":"https://wordpress.org/plugins/bloqra/","service":"wordpress"} /-->
				<!-- wp:social-link {"url":"#","service":"x"} /-->
				<!-- wp:social-link {"url":"#","service":"facebook"} /-->
				<!-- wp:social-link {"url":"#","service":"instagram"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
		<div class="wp-block-column" style="flex-basis:20%">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|small","textTransform":"uppercase","letterSpacing":"0.06em"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
			<h3 class="wp-block-heading has-white-color has-text-color" style="font-size:var(--wp--preset--font-size--small);letter-spacing:0.06em;text-transform:uppercase"><?php echo esc_html__( 'Explore', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:navigation {"textColor":"neutral-300","overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"},"typography":{"fontSize":"var:preset|font-size|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Home', 'bloqra' ); ?>","url":"/","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Blog', 'bloqra' ); ?>","url":"/blog","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'About', 'bloqra' ); ?>","url":"/about","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Contact', 'bloqra' ); ?>","url":"/contact","kind":"custom"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
		<div class="wp-block-column" style="flex-basis:20%">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|small","textTransform":"uppercase","letterSpacing":"0.06em"}},"textColor":"white"} -->
			<h3 class="wp-block-heading has-white-color has-text-color" style="font-size:var(--wp--preset--font-size--small);letter-spacing:0.06em;text-transform:uppercase"><?php echo esc_html__( 'Resources', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:navigation {"textColor":"neutral-300","overlayMenu":"never","style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"},"typography":{"fontSize":"var:preset|font-size|small"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Bloqra Blocks', 'bloqra' ); ?>","url":"https://wordpress.org/plugins/bloqra/","kind":"custom","opensInNewTab":true} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Documentation', 'bloqra' ); ?>","url":"#","kind":"custom"} /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr__( 'Support', 'bloqra' ); ?>","url":"/contact","kind":"custom"} /-->
			<!-- /wp:navigation -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"20%","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}}} -->
		<div class="wp-block-column" style="flex-basis:20%">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"var:preset|font-size|small","textTransform":"uppercase","letterSpacing":"0.06em"}},"textColor":"white"} -->
			<h3 class="wp-block-heading has-white-color has-text-color" style="font-size:var(--wp--preset--font-size--small);letter-spacing:0.06em;text-transform:uppercase"><?php echo esc_html__( 'Stay in touch', 'bloqra' ); ?></h3>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
			<p class="has-small-font-size"><?php echo esc_html__( 'Get product updates and WordPress tips, straight to your inbox.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-fill"} -->
				<div class="wp-block-button is-style-fill"><a class="wp-block-button__link wp-element-button" href="/contact"><?php echo esc_html__( 'Subscribe', 'bloqra' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"align":"wide","style":{"color":{"background":"#374151"}}} -->
	<hr class="wp-block-separator alignwide has-text-color has-alpha-channel-opacity has-background" style="background-color:#374151;color:#374151"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
		<p class="has-small-font-size"><?php
			/* translators: %s: current year. */
			printf( esc_html__( '© %s Bloqra. All rights reserved.', 'bloqra' ), esc_html( gmdate( 'Y' ) ) );
		?></p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"var:preset|font-size|small"}}} -->
		<p class="has-small-font-size"><?php echo esc_html__( 'Built with the Bloqra block theme.', 'bloqra' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
