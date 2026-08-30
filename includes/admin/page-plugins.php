<?php
/**
 * Useful Plugins tab.
 *
 * A curated card grid of free plugins that pair well with a block theme. The
 * list is a static array -- no wordpress.org API call is made on page load, so
 * the tab renders instantly and works offline. Installation is delegated to
 * core's updater script; activation goes through the theme's own endpoint.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\Plugins;

use function Bloqra\Admin\PluginActions\get_status;

defined( 'ABSPATH' ) || exit;

/**
 * Get the curated plugin list.
 *
 * Each entry accepts:
 *
 *     name        string Plugin name, shown as the card title.
 *     slug        string wordpress.org plugin slug (also used as the card id).
 *     file        string Plugin file relative to the plugins directory.
 *     description string Two or three lines explaining why it is here.
 *     source      string 'wporg' to install in place, or 'external' to link out.
 *     url         string Required for the 'external' source.
 *
 * @since 1.0.4
 * @return array<int, array<string, string>> Plugin definitions.
 */
function get_recommended(): array {
	$plugins = array(
		array(
			'name'        => __( 'Bloqra Blocks', 'bloqra' ),
			'slug'        => 'bloqra',
			'file'        => 'bloqra/bloqra.php',
			'description' => __( 'Advanced Gutenberg blocks for building modern, eye-catching pages directly in the block editor.', 'bloqra' ),
		),
		array(
			'name'        => __( 'AI Content Writer', 'bloqra' ),
			'slug'        => 'ai-content-writer',
			'file'        => 'ai-content-writer/ai-content-writer.php',
			'description' => __( 'Generate SEO-friendly posts and pages in minutes using ChatGPT, Gemini and other AI models.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Yoast SEO', 'bloqra' ),
			'slug'        => 'wordpress-seo',
			'file'        => 'wordpress-seo/wp-seo.php',
			'description' => __( 'Control your SEO titles, meta descriptions, XML sitemaps and schema output.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Contact Form 7', 'bloqra' ),
			'slug'        => 'contact-form-7',
			'file'        => 'contact-form-7/wp-contact-form-7.php',
			'description' => __( 'Simple, flexible contact forms. Pairs with the Contact page pattern that ships with the theme.', 'bloqra' ),
		),
		array(
			'name'        => __( 'WooCommerce', 'bloqra' ),
			'slug'        => 'woocommerce',
			'file'        => 'woocommerce/woocommerce.php',
			'description' => __( 'Sell anything online. Bloqra ships styled shop, product, cart and checkout templates out of the box.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Jetpack Boost', 'bloqra' ),
			'slug'        => 'jetpack-boost',
			'file'        => 'jetpack-boost/jetpack-boost.php',
			'description' => __( 'Critical CSS, deferred JavaScript and lazy loading for a faster block theme.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Wordfence Security', 'bloqra' ),
			'slug'        => 'wordfence',
			'file'        => 'wordfence/wordfence.php',
			'description' => __( 'A firewall and malware scanner that keeps your site protected from known threats.', 'bloqra' ),
		),
		array(
			'name'        => __( 'UpdraftPlus', 'bloqra' ),
			'slug'        => 'updraftplus',
			'file'        => 'updraftplus/updraftplus.php',
			'description' => __( 'Scheduled backups to the cloud, and one-click restores when you need them.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Redirection', 'bloqra' ),
			'slug'        => 'redirection',
			'file'        => 'redirection/redirection.php',
			'description' => __( 'Manage 301 redirects and track 404 errors after you redesign your site.', 'bloqra' ),
		),
		array(
			'name'        => __( 'Loco Translate', 'bloqra' ),
			'slug'        => 'loco-translate',
			'file'        => 'loco-translate/loco.php',
			'description' => __( 'Bloqra is translation ready. Loco Translate lets you edit those translations inside WordPress.', 'bloqra' ),
		),
	);

	/**
	 * Filter the plugins listed on the Useful Plugins tab.
	 *
	 * The list doubles as the allow-list for the activation endpoint, so any
	 * plugin added here becomes activatable from the dashboard.
	 *
	 * @since 1.0.4
	 * @param array $plugins Plugin definitions.
	 */
	$plugins = (array) apply_filters( 'bloqra_admin_useful_plugins', $plugins );

	return array_values(
		array_filter(
			$plugins,
			function ( $plugin ) {
				return ! empty( $plugin['slug'] ) && ! empty( $plugin['file'] ) && ! empty( $plugin['name'] );
			}
		)
	);
}

/**
 * Look up a curated plugin by its slug.
 *
 * @since 1.0.4
 * @param string $slug Plugin slug.
 * @return array<string, string> Plugin definition, or an empty array when not listed.
 */
function get_plugin_by_slug( string $slug ): array {
	if ( '' === $slug ) {
		return array();
	}

	foreach ( get_recommended() as $plugin ) {
		if ( $slug === $plugin['slug'] ) {
			return $plugin;
		}
	}

	return array();
}

/**
 * Render the Useful Plugins tab.
 *
 * @since 1.0.4
 * @return void
 */
function render(): void {
	$plugins      = get_recommended();
	$can_install  = current_user_can( 'install_plugins' );
	$can_activate = current_user_can( 'activate_plugins' );
	?>
	<div class="bloqra-admin-section">
		<h2 class="bloqra-admin-section__title"><?php esc_html_e( 'Useful plugins', 'bloqra' ); ?></h2>
		<p class="bloqra-admin-section__intro">
			<?php esc_html_e( 'Bloqra works on its own, with no required plugins. These free plugins simply pair well with it.', 'bloqra' ); ?>
		</p>

		<?php if ( ! $can_install && ! $can_activate ) : ?>
			<p class="bloqra-admin-notice">
				<?php esc_html_e( 'Ask an administrator to install these plugins for you.', 'bloqra' ); ?>
			</p>
		<?php endif; ?>

		<div class="bloqra-admin-grid bloqra-admin-grid--3">
			<?php foreach ( $plugins as $plugin ) : ?>
				<?php render_plugin_card( $plugin, $can_install, $can_activate ); ?>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
	// Needed by core's updater when the filesystem requires FTP credentials.
	if ( $can_install && function_exists( 'wp_print_request_filesystem_credentials_modal' ) ) {
		wp_print_request_filesystem_credentials_modal();
	}
}

/**
 * Render one plugin card.
 *
 * @since 1.0.4
 * @param array<string, string> $plugin       Plugin definition.
 * @param bool                  $can_install  Whether the user may install plugins.
 * @param bool                  $can_activate Whether the user may activate plugins.
 * @return void
 */
function render_plugin_card( array $plugin, bool $can_install, bool $can_activate ): void {
	$status   = get_status( $plugin['file'] );
	$source   = isset( $plugin['source'] ) ? $plugin['source'] : 'wporg';
	$external = ( 'external' === $source ) && ! empty( $plugin['url'] );
	?>
	<div class="bloqra-plugin-card plugin-card-<?php echo esc_attr( $plugin['slug'] ); ?>">
		<div class="bloqra-plugin-card__body">
			<h3 class="bloqra-plugin-card__title"><?php echo esc_html( $plugin['name'] ); ?></h3>
			<p class="bloqra-plugin-card__desc"><?php echo esc_html( $plugin['description'] ); ?></p>
		</div>
		<div class="bloqra-plugin-card__footer">
			<?php if ( 'active' === $status ) : ?>
				<button type="button" class="button bloqra-plugin-card__action is-active" disabled>
					<?php esc_html_e( 'Active', 'bloqra' ); ?>
				</button>

			<?php elseif ( 'inactive' === $status && $can_activate ) : ?>
				<button type="button"
					class="button button-primary bloqra-plugin-card__action bloqra-activate"
					data-slug="<?php echo esc_attr( $plugin['slug'] ); ?>"
					data-name="<?php echo esc_attr( $plugin['name'] ); ?>">
					<?php esc_html_e( 'Activate', 'bloqra' ); ?>
				</button>

			<?php elseif ( $external && $can_install ) : ?>
				<a class="button bloqra-plugin-card__action"
					href="<?php echo esc_url( $plugin['url'] ); ?>"
					target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Get the plugin', 'bloqra' ); ?>
					<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'bloqra' ); ?></span>
				</a>

			<?php elseif ( 'uninstalled' === $status && $can_install ) : ?>
				<button type="button"
					class="button bloqra-plugin-card__action install-now"
					data-slug="<?php echo esc_attr( $plugin['slug'] ); ?>"
					data-name="<?php echo esc_attr( $plugin['name'] ); ?>">
					<?php esc_html_e( 'Install', 'bloqra' ); ?>
				</button>

			<?php else : ?>
				<button type="button" class="button bloqra-plugin-card__action" disabled>
					<?php esc_html_e( 'Install', 'bloqra' ); ?>
				</button>
				<span class="bloqra-plugin-card__hint">
					<?php esc_html_e( 'Ask an administrator', 'bloqra' ); ?>
				</span>
			<?php endif; ?>
		</div>
	</div>
	<?php
}
