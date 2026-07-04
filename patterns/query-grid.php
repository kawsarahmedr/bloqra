<?php
/**
 * Title: Posts Grid
 * Slug: bloqra/query-grid
 * Categories: bloqra, query
 * Description: A three-column grid of posts with featured images, meta and excerpts.
 * Keywords: posts, grid, query, blog, archive
 * Block Types: core/query
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:query {"queryId":0,"query":{"perPage":9,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"align":"wide"} -->
<div class="wp-block-query alignwide">
	<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"tagName":"article","className":"is-style-card","style":{"spacing":{"blockGap":"var:preset|spacing|xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
		<article class="wp-block-group is-style-card">
			<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","style":{"border":{"radius":"10px"}}} /-->
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:post-terms {"term":"category"} /-->
				<!-- wp:post-date {"format":"M j, Y"} /-->
			</div>
			<!-- /wp:group -->
			<!-- wp:post-title {"level":2,"isLink":true,"fontSize":"large"} /-->
			<!-- wp:post-excerpt {"moreText":"<?php echo esc_attr_x( 'Read more →', 'Post excerpt more link', 'bloqra' ); ?>","excerptLength":18} /-->
		</article>
		<!-- /wp:group -->
	<!-- /wp:post-template -->

	<!-- wp:spacer {"height":"var:preset|spacing|lg"} -->
	<div style="height:var(--wp--preset--spacing--lg)" aria-hidden="true" class="wp-block-spacer"></div>
	<!-- /wp:spacer -->

	<!-- wp:query-pagination {"paginationArrow":"arrow","align":"center","layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:query-pagination-previous /-->
		<!-- wp:query-pagination-numbers /-->
		<!-- wp:query-pagination-next /-->
	<!-- /wp:query-pagination -->

	<!-- wp:query-no-results -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm","padding":{"top":"var:preset|spacing|xl","bottom":"var:preset|spacing|xl"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--xl);padding-bottom:var(--wp--preset--spacing--xl)">
			<!-- wp:heading {"textAlign":"center","level":2,"fontSize":"large"} -->
			<h2 class="wp-block-heading has-text-align-center has-large-font-size"><?php echo esc_html__( 'Nothing here yet', 'bloqra' ); ?></h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center"><?php echo esc_html__( 'We couldn’t find any posts. Try a different search or check back soon.', 'bloqra' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'Search form label', 'bloqra' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search…', 'Search form placeholder', 'bloqra' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'Search form button', 'bloqra' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"align":"center"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:query-no-results -->
</div>
<!-- /wp:query -->
