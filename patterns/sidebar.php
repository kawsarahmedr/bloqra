<?php
/**
 * Title: Sidebar
 * Slug: bloqra/sidebar
 * Inserter: no
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|lg"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group">

	<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'Sidebar search label', 'bloqra' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search…', 'Sidebar search placeholder', 'bloqra' ); ?>","width":100,"widthUnit":"%","buttonText":"<?php echo esc_attr_x( 'Search', 'Sidebar search button', 'bloqra' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true} /-->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3,"className":"is-style-subheading","fontSize":"small"} -->
		<h3 class="wp-block-heading is-style-subheading has-small-font-size"><?php echo esc_html__( 'Recent posts', 'bloqra' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:query {"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","inherit":false},"layout":{"type":"constrained"}} -->
		<div class="wp-block-query">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}}} -->
				<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group">
					<!-- wp:post-title {"isLink":true,"fontSize":"medium"} /-->
					<!-- wp:post-date {"isLink":false,"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->
			<!-- /wp:post-template -->

			<!-- wp:query-no-results -->
				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php echo esc_html__( 'No posts yet.', 'bloqra' ); ?></p>
				<!-- /wp:paragraph -->
			<!-- /wp:query-no-results -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":3,"className":"is-style-subheading","fontSize":"small"} -->
		<h3 class="wp-block-heading is-style-subheading has-small-font-size"><?php echo esc_html__( 'Categories', 'bloqra' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:categories {"showPostCounts":true,"showHierarchy":false,"fontSize":"medium"} /-->
	</div>
	<!-- /wp:group -->

</div>
<!-- /wp:group -->
