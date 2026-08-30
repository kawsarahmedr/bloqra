<?php
/**
 * Starter Templates tab.
 *
 * Built ahead of the companion plugin and registered with `enabled => false`
 * in the tab registry, so publishing the plugin is a one-flag change here
 * rather than a new feature.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\StarterTemplates;

use function Bloqra\Admin\PluginActions\get_status;

defined( 'ABSPATH' ) || exit;

/**
 * Plugin file of the Starter Templates companion plugin.
 */
const PLUGIN_FILE = 'bloqra-starter-templates/bloqra-starter-templates.php';

/**
 * WordPress.org slug of the Starter Templates companion plugin.
 */
const PLUGIN_SLUG = 'bloqra-starter-templates';

/**
 * Resolve the call to action for the current plugin state.
 *
 * @since 1.0.4
 * @return array<string, string> Keys: status, label, url, classes.
 */
function get_cta(): array {
	$status = get_status( PLUGIN_FILE );

	if ( 'active' === $status ) {
		return array(
			'status'  => 'active',
			'label'   => __( 'Launch Starter Templates', 'bloqra' ),
			'url'     => admin_url( 'themes.php?page=' . PLUGIN_SLUG ),
			'classes' => 'button button-primary button-hero',
		);
	}

	if ( 'inactive' === $status ) {
		return array(
			'status'  => 'inactive',
			'label'   => __( 'Activate Starter Templates', 'bloqra' ),
			'url'     => '',
			'classes' => 'button button-primary button-hero bloqra-activate',
		);
	}

	return array(
		'status'  => 'uninstalled',
		'label'   => __( 'Install Starter Templates', 'bloqra' ),
		'url'     => '',
		'classes' => 'button button-primary button-hero install-now',
	);
}

/**
 * Get the feature tiles shown under the hero.
 *
 * Each tile reuses an icon that already ships with the theme.
 *
 * @since 1.0.4
 * @return array<int, array<string, string>> Tile definitions.
 */
function get_features(): array {
	return array(
		array(
			'icon'        => 'icon-design.svg',
			'title'       => __( 'Designed sites', 'bloqra' ),
			'description' => __( 'Complete, ready-to-edit websites rather than a pile of loose sections.', 'bloqra' ),
		),
		array(
			'icon'        => 'icon-speed.svg',
			'title'       => __( 'One-click import', 'bloqra' ),
			'description' => __( 'Pages, menus and settings land in place, so you can start editing straight away.', 'bloqra' ),
		),
		array(
			'icon'        => 'icon-patterns.svg',
			'title'       => __( 'Core blocks only', 'bloqra' ),
			'description' => __( 'Every template is built from core blocks, exactly like the rest of Bloqra.', 'bloqra' ),
		),
		array(
			'icon'        => 'icon-responsive.svg',
			'title'       => __( 'Responsive by default', 'bloqra' ),
			'description' => __( 'Layouts are checked on phones, tablets and wide desktop screens.', 'bloqra' ),
		),
		array(
			'icon'        => 'icon-access.svg',
			'title'       => __( 'Accessible markup', 'bloqra' ),
			'description' => __( 'Sensible heading order, readable contrast and keyboard-friendly navigation.', 'bloqra' ),
		),
		array(
			'icon'        => 'icon-shop.svg',
			'title'       => __( 'Store ready', 'bloqra' ),
			'description' => __( 'WooCommerce templates included for the sites that need to sell something.', 'bloqra' ),
		),
	);
}

/**
 * Render the Starter Templates tab.
 *
 * @since 1.0.4
 * @return void
 */
function render(): void {
	$cta = get_cta();
	?>
	<div class="bloqra-admin-section bloqra-admin-starter">
		<div class="bloqra-admin-starter__hero">
			<h2 class="bloqra-admin-starter__title"><?php esc_html_e( 'Start from a finished website', 'bloqra' ); ?></h2>
			<p class="bloqra-admin-starter__desc">
				<?php esc_html_e( 'Import a complete, professionally designed site in one click, then swap the words and images for your own. Every template is built with core blocks, so nothing locks you in.', 'bloqra' ); ?>
			</p>
			<p class="bloqra-admin-starter__cta">
				<?php render_cta( $cta ); ?>
			</p>
		</div>

		<div class="bloqra-admin-grid bloqra-admin-grid--3">
			<?php foreach ( get_features() as $feature ) : ?>
				<div class="bloqra-admin-feature">
					<img class="bloqra-admin-feature__icon"
						src="<?php echo esc_url( BLOQRA_THEME_URI . 'assets/images/' . $feature['icon'] ); ?>"
						alt="" width="32" height="32" />
					<h3 class="bloqra-admin-feature__title"><?php echo esc_html( $feature['title'] ); ?></h3>
					<p class="bloqra-admin-feature__desc"><?php echo esc_html( $feature['description'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>

		<p class="bloqra-admin-starter__cta bloqra-admin-starter__cta--footer">
			<?php render_cta( $cta ); ?>
		</p>
	</div>
	<?php
}

/**
 * Render the call-to-action button for the current plugin state.
 *
 * @since 1.0.4
 * @param array<string, string> $cta Call to action data from get_cta().
 * @return void
 */
function render_cta( array $cta ): void {
	if ( '' !== $cta['url'] ) {
		?>
		<a class="<?php echo esc_attr( $cta['classes'] ); ?>" href="<?php echo esc_url( $cta['url'] ); ?>">
			<?php echo esc_html( $cta['label'] ); ?>
		</a>
		<?php
		return;
	}

	if ( ! current_user_can( 'install_plugins' ) ) {
		?>
		<button type="button" class="button button-hero" disabled><?php echo esc_html( $cta['label'] ); ?></button>
		<span class="bloqra-plugin-card__hint"><?php esc_html_e( 'Ask an administrator', 'bloqra' ); ?></span>
		<?php
		return;
	}
	?>
	<span class="plugin-card-<?php echo esc_attr( PLUGIN_SLUG ); ?>">
		<button type="button"
			class="<?php echo esc_attr( $cta['classes'] ); ?>"
			data-slug="<?php echo esc_attr( PLUGIN_SLUG ); ?>"
			data-name="<?php echo esc_attr__( 'Starter Templates', 'bloqra' ); ?>">
			<?php echo esc_html( $cta['label'] ); ?>
		</button>
	</span>
	<?php
}
