<?php
/**
 * Shared render helpers for the theme dashboard.
 *
 * Small, reusable pieces used by more than one tab: URL builders, the branded
 * page header, the tab strip, cards and the help sidebar. Keeping every Site
 * Editor deep link in one place means the paths only ever have to be updated
 * here when WordPress moves them.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\Helpers;

use function Bloqra\Admin\get_tabs;

defined( 'ABSPATH' ) || exit;

/**
 * Build a URL to the theme dashboard, optionally to a specific tab.
 *
 * @since 1.0.4
 * @param string $tab Optional. Tab slug. Default '' for the first tab.
 * @return string Dashboard admin URL.
 */
function page_url( string $tab = '' ): string {
	$args = array( 'page' => BLOQRA_THEME_ADMIN_SLUG );

	if ( '' !== $tab ) {
		$args['tab'] = $tab;
	}

	return add_query_arg( $args, admin_url( 'themes.php' ) );
}

/**
 * Build a Site Editor URL.
 *
 * The legacy `postType` / `path` query args are used on purpose: they are the
 * form understood by WordPress 6.7 (the minimum this theme supports) and
 * current versions transparently redirect them to the newer `p` routes, so a
 * single set of links works across every supported release.
 *
 * @since 1.0.4
 * @param array<string, string> $args Optional. Query args for site-editor.php.
 * @return string Site Editor URL.
 */
function site_editor_url( array $args = array() ): string {
	$url = admin_url( 'site-editor.php' );

	return empty( $args ) ? $url : add_query_arg( array_map( 'rawurlencode', $args ), $url );
}

/**
 * Get the theme description from style.css.
 *
 * Reading the header keeps the dashboard copy and the WordPress.org listing in
 * sync with a single source of truth.
 *
 * @since 1.0.4
 * @return string Theme description.
 */
function theme_description(): string {
	return (string) wp_get_theme( get_template() )->get( 'Description' );
}

/**
 * Render the branded page header and the tab strip.
 *
 * The tabs are real links, so navigation works with JavaScript disabled; the
 * admin script only layers arrow-key support on top.
 *
 * @since 1.0.4
 * @param string $current Slug of the active tab.
 * @return void
 */
function render_header( string $current ): void {
	?>
	<div class="bloqra-admin__header">
		<div class="bloqra-admin__brand">
			<img class="bloqra-admin__logo"
				src="<?php echo esc_url( BLOQRA_THEME_URI . 'assets/images/admin/logo.svg' ); ?>"
				alt="" width="40" height="40" />
			<div class="bloqra-admin__brand-text">
				<span class="bloqra-admin__name"><?php esc_html_e( 'Bloqra', 'bloqra' ); ?></span>
				<span class="bloqra-admin__tagline">
					<?php esc_html_e( 'A modern block theme for the Site Editor.', 'bloqra' ); ?>
				</span>
			</div>
		</div>
		<span class="bloqra-admin__version">
			<?php
			printf(
				/* translators: %s: theme version number. */
				esc_html__( 'Version %s', 'bloqra' ),
				esc_html( BLOQRA_THEME_VERSION )
			);
			?>
		</span>
	</div>

	<?php
	$tabs = get_tabs();

	if ( count( $tabs ) < 2 ) {
		return;
	}
	?>
	<nav class="bloqra-admin__tabs" role="tablist" aria-label="<?php esc_attr_e( 'Bloqra dashboard sections', 'bloqra' ); ?>">
		<?php foreach ( $tabs as $slug => $tab ) : ?>
			<?php $is_current = ( $slug === $current ); ?>
			<a class="bloqra-admin__tab<?php echo $is_current ? ' is-active' : ''; ?>"
				role="tab"
				id="bloqra-tab-<?php echo esc_attr( $slug ); ?>"
				href="<?php echo esc_url( page_url( $slug ) ); ?>"
				aria-selected="<?php echo $is_current ? 'true' : 'false'; ?>"
				aria-controls="bloqra-admin-panel"
				tabindex="<?php echo $is_current ? '0' : '-1'; ?>">
				<?php echo esc_html( $tab['label'] ); ?>
			</a>
		<?php endforeach; ?>
	</nav>
	<?php
}

/**
 * Render a single link card.
 *
 * @since 1.0.4
 * @param array<string, mixed> $card Card data: title, description, url, link_text, external.
 * @return void
 */
function render_card( array $card ): void {
	$card = wp_parse_args(
		$card,
		array(
			'title'       => '',
			'description' => '',
			'url'         => '',
			'link_text'   => __( 'Open', 'bloqra' ),
			'external'    => false,
		)
	);

	if ( '' === $card['title'] || '' === $card['url'] ) {
		return;
	}
	?>
	<div class="bloqra-admin-card">
		<h3 class="bloqra-admin-card__title"><?php echo esc_html( $card['title'] ); ?></h3>
		<p class="bloqra-admin-card__desc"><?php echo esc_html( $card['description'] ); ?></p>
		<a class="bloqra-admin-card__link" href="<?php echo esc_url( $card['url'] ); ?>"
			<?php echo $card['external'] ? 'target="_blank" rel="noopener noreferrer"' : ''; ?>>
			<?php echo esc_html( $card['link_text'] ); ?>
			<?php if ( $card['external'] ) : ?>
				<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'bloqra' ); ?></span>
			<?php endif; ?>
		</a>
	</div>
	<?php
}

/**
 * Get the help boxes shown in the dashboard sidebar.
 *
 * @since 1.0.4
 * @return array<int, array<string, mixed>> Sidebar box definitions.
 */
function get_sidebar_boxes(): array {
	$boxes = array(
		array(
			'title'       => __( 'Documentation', 'bloqra' ),
			'description' => __( 'Step-by-step guides for every part of the theme, from templates to style variations.', 'bloqra' ),
			'url'         => 'https://beautifulplugins.com/docs/bloqra/',
			'link_text'   => __( 'Browse documentation', 'bloqra' ),
			'external'    => true,
		),
		array(
			'title'       => __( 'Support', 'bloqra' ),
			'description' => __( 'Stuck on something? Ask a question on the WordPress.org support forum and we will help.', 'bloqra' ),
			'url'         => 'https://wordpress.org/support/theme/bloqra/',
			'link_text'   => __( 'Get support', 'bloqra' ),
			'external'    => true,
		),
		array(
			'title'       => __( 'Style variations', 'bloqra' ),
			'description' => __( 'Bloqra ships with Midnight, Emerald, Sunset and Editorial. Switch the whole site in one click.', 'bloqra' ),
			'url'         => site_editor_url( array( 'path' => '/wp_global_styles' ) ),
			'link_text'   => __( 'Try a variation', 'bloqra' ),
			'external'    => false,
		),
		array(
			'title'       => __( 'Rate Bloqra', 'bloqra' ),
			'description' => __( 'Enjoying the theme? A five-star review on WordPress.org helps more people find it.', 'bloqra' ),
			'url'         => 'https://wordpress.org/support/theme/bloqra/reviews/#new-post',
			'link_text'   => __( 'Leave a review', 'bloqra' ),
			'external'    => true,
		),
	);

	/**
	 * Filter the help boxes rendered in the dashboard sidebar.
	 *
	 * @since 1.0.4
	 * @param array $boxes Sidebar box definitions.
	 */
	return (array) apply_filters( 'bloqra_admin_sidebar_boxes', $boxes );
}

/**
 * Render the dashboard help sidebar.
 *
 * @since 1.0.4
 * @return void
 */
function render_sidebar(): void {
	$boxes = get_sidebar_boxes();

	if ( empty( $boxes ) ) {
		return;
	}
	?>
	<aside class="bloqra-admin__sidebar" aria-label="<?php esc_attr_e( 'Help and resources', 'bloqra' ); ?>">
		<?php foreach ( $boxes as $box ) : ?>
			<?php render_card( $box ); ?>
		<?php endforeach; ?>
	</aside>
	<?php
}
