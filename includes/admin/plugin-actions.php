<?php
/**
 * Plugin status detection and the activation AJAX endpoint.
 *
 * Installation is handled entirely by core's own updater script, so the theme
 * ships no download code and bundles no plugin ZIPs. Only activation needs a
 * handler of its own, and it is locked to the curated allow-list.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\PluginActions;

use function Bloqra\Admin\Plugins\get_plugin_by_slug;

use const Bloqra\Admin\StarterTemplates\PLUGIN_FILE as STARTER_TEMPLATES_FILE;
use const Bloqra\Admin\StarterTemplates\PLUGIN_SLUG as STARTER_TEMPLATES_SLUG;

defined( 'ABSPATH' ) || exit;

// Register action and filter hooks.
add_action( 'wp_ajax_bloqra_activate_plugin', __NAMESPACE__ . '\\ajax_activate_plugin' );

/**
 * Resolve a slug against everything the dashboard is allowed to act on.
 *
 * The curated Useful Plugins list plus the Starter Templates companion. Any
 * slug that does not resolve here is refused by the activation endpoint.
 *
 * @since 1.0.4
 * @param string $slug Plugin slug.
 * @return array<string, string> Plugin definition, or an empty array when not allowed.
 */
function get_allowed_plugin( string $slug ): array {
	if ( STARTER_TEMPLATES_SLUG === $slug ) {
		return array(
			'name' => __( 'Starter Templates', 'bloqra' ),
			'slug' => STARTER_TEMPLATES_SLUG,
			'file' => STARTER_TEMPLATES_FILE,
		);
	}

	return get_plugin_by_slug( $slug );
}

/**
 * Get the installation state of a plugin.
 *
 * @since 1.0.4
 * @param string $file Plugin file relative to the plugins directory, e.g. "bloqra/bloqra.php".
 * @return string One of 'active', 'inactive' or 'uninstalled'.
 */
function get_status( string $file ): string {
	if ( ! function_exists( 'get_plugins' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	$installed = get_plugins();

	if ( ! isset( $installed[ $file ] ) ) {
		return 'uninstalled';
	}

	return is_plugin_active( $file ) ? 'active' : 'inactive';
}

/**
 * Build the WordPress.org install URL for a plugin slug.
 *
 * @since 1.0.4
 * @param string $slug WordPress.org plugin slug.
 * @return string Nonced install URL.
 */
function get_install_url( string $slug ): string {
	return wp_nonce_url(
		add_query_arg(
			array(
				'action' => 'install-plugin',
				'plugin' => $slug,
			),
			admin_url( 'update.php' )
		),
		'install-plugin_' . $slug
	);
}

/**
 * Activate a curated plugin over AJAX.
 *
 * @since 1.0.4
 * @return void
 */
function ajax_activate_plugin(): void {
	check_ajax_referer( 'bloqra_admin', 'nonce' );

	if ( ! current_user_can( 'activate_plugins' ) ) {
		wp_send_json_error(
			array( 'message' => __( 'You do not have permission to activate plugins.', 'bloqra' ) ),
			403
		);
	}

	$slug   = isset( $_POST['slug'] ) ? sanitize_key( wp_unslash( $_POST['slug'] ) ) : '';
	$plugin = get_allowed_plugin( $slug );

	// Only plugins on the curated list may be activated through this endpoint.
	if ( empty( $plugin ) ) {
		wp_send_json_error(
			array( 'message' => __( 'That plugin is not on the Bloqra list.', 'bloqra' ) ),
			400
		);
	}

	if ( 'uninstalled' === get_status( $plugin['file'] ) ) {
		wp_send_json_error(
			array( 'message' => __( 'That plugin is not installed yet.', 'bloqra' ) ),
			400
		);
	}

	$activated = activate_plugin( $plugin['file'] );

	if ( is_wp_error( $activated ) ) {
		wp_send_json_error( array( 'message' => $activated->get_error_message() ), 500 );
	}

	wp_send_json_success(
		array(
			'message' => __( 'Active', 'bloqra' ),
			'status'  => 'active',
		)
	);
}
