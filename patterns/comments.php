<?php
/**
 * Title: Comments
 * Slug: bloqra/comments
 * Categories: bloqra
 * Description: Post comments area with list, pagination and a comment form.
 * Keywords: comments, discussion, replies
 * Viewport Width: 1280
 * Inserter: true
 *
 * @package Bloqra
 */

?>
<!-- wp:comments {"className":"wp-block-comments-query-loop","style":{"spacing":{"margin":{"top":"var:preset|spacing|xl"}}}} -->
<div class="wp-block-comments wp-block-comments-query-loop" style="margin-top:var(--wp--preset--spacing--xl)">
	<!-- wp:comments-title {"level":2,"fontSize":"x-large"} /-->

	<!-- wp:comment-template {"style":{"spacing":{"blockGap":"var:preset|spacing|md"}}} -->
		<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|sm","bottom":"var:preset|spacing|sm"}},"border":{"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"default"}} -->
		<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--sm);padding-bottom:var(--wp--preset--spacing--sm)">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|2-xs"}},"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"center"}} -->
			<div class="wp-block-group">
				<!-- wp:avatar {"size":40} /-->
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<!-- wp:comment-author-name {"fontSize":"medium"} /-->
					<!-- wp:comment-date {"fontSize":"small"} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- wp:comment-content /-->
			<!-- wp:comment-reply-link {"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"}} -->
		<!-- wp:comments-pagination-previous /-->
		<!-- wp:comments-pagination-numbers /-->
		<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->

	<!-- wp:post-comments-form {"style":{"spacing":{"margin":{"top":"var:preset|spacing|md"}}}} /-->
</div>
<!-- /wp:comments -->
