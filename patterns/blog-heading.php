<?php
/**
 * Title: Blog Heading
 * Slug: bloqra/blog-heading
 * Categories: bloqra
 * Description: A centered heading and intro for the blog index.
 * Keywords: blog, heading, intro
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|xs","margin":{"bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained","contentSize":"680px"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--xl)">
	<!-- wp:paragraph {"align":"center","className":"is-style-subheading"} -->
	<p class="has-text-align-center is-style-subheading"><?php echo esc_html__( 'Our blog', 'bloqra' ); ?></p>
	<!-- /wp:paragraph -->
	<!-- wp:heading {"textAlign":"center","level":1} -->
	<h1 class="wp-block-heading has-text-align-center"><?php echo esc_html__( 'Insights, guides & updates', 'bloqra' ); ?></h1>
	<!-- /wp:heading -->
	<!-- wp:paragraph {"align":"center","style":{"color":{"text":"#4b5563"}}} -->
	<p class="has-text-align-center has-text-color" style="color:#4b5563"><?php echo esc_html__( 'Tips on building with WordPress blocks, product news and stories from the Bloqra community.', 'bloqra' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
