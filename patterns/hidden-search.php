<?php
/**
 * Title: Search results heading
 * Slug: bloqra/hidden-search
 * Inserter: no
 * Description: Query title and search form for the search results template.
 *
 * @package Bloqra
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|sm","margin":{"bottom":"var:preset|spacing|lg"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--lg)">
	<!-- wp:query-title {"type":"search","textAlign":"center","showPrefix":false} /-->
	<!-- wp:search {"label":"<?php echo esc_attr_x( 'Search', 'Search form label', 'bloqra' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr_x( 'Search again…', 'Search form placeholder', 'bloqra' ); ?>","buttonText":"<?php echo esc_attr_x( 'Search', 'Search form button', 'bloqra' ); ?>","buttonPosition":"button-inside","buttonUseIcon":true,"align":"center"} /-->
</div>
<!-- /wp:group -->
