<?php
/**
 * Title: Post navigation
 * Slug: bloqra/post-navigation
 * Inserter: no
 * Description: Previous and next post links, separated from the content by top and bottom borders.
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|md","bottom":"var:preset|spacing|md"}},"border":{"top":{"color":"var:preset|color|neutral-200","width":"1px"},"bottom":{"color":"var:preset|color|neutral-200","width":"1px"}}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-top-color:var(--wp--preset--color--neutral-200);border-top-width:1px;border-bottom-color:var(--wp--preset--color--neutral-200);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--md);padding-bottom:var(--wp--preset--spacing--md)">
	<!-- wp:post-navigation-link {"type":"previous","label":"<?php echo esc_attr_x( 'Previous', 'Post navigation link label', 'bloqra' ); ?>","showTitle":true,"arrow":"arrow"} /-->
	<!-- wp:post-navigation-link {"textAlign":"right","label":"<?php echo esc_attr_x( 'Next', 'Post navigation link label', 'bloqra' ); ?>","showTitle":true,"arrow":"arrow"} /-->
</div>
<!-- /wp:group -->
