<?php
/**
 * Admin area bootstrap.
 *
 * Loads the Bloqra theme dashboard (Appearance > Bloqra) and exposes the tab
 * registry that drives both the in-page tab strip and the page router. The
 * whole admin area is loaded only inside the admin, so the front end pays
 * nothing for it.
 *
 * @link https://developer.wordpress.org/plugins/administration-menus/
 * @package Bloqra
 */

namespace Bloqra\Admin;

defined( 'ABSPATH' ) || exit;

// Directory holding the admin area files.
define( 'BLOQRA_THEME_ADMIN', BLOQRA_THEME_INC . 'admin/' );

// The page slug used under themes.php.
define( 'BLOQRA_THEME_ADMIN_SLUG', 'bloqra' );

require_once BLOQRA_THEME_ADMIN . 'helpers.php';
require_once BLOQRA_THEME_ADMIN . 'plugin-actions.php';
require_once BLOQRA_THEME_ADMIN . 'page-dashboard.php';
require_once BLOQRA_THEME_ADMIN . 'page-plugins.php';
require_once BLOQRA_THEME_ADMIN . 'page-changelog.php';
require_once BLOQRA_THEME_ADMIN . 'page-starter-templates.php';
require_once BLOQRA_THEME_ADMIN . 'menu.php';
require_once BLOQRA_THEME_ADMIN . 'notice.php';

/**
 * Get the registered admin tabs.
 *
 * Each entry describes one tab of the theme dashboard:
 *
 *     slug       string   Query var value used in ?tab=.
 *     label      string   Translated label shown in the tab strip.
 *     callback   callable Renders the tab body.
 *     capability string   Capability required to see the tab.
 *     priority   int      Sort order, lowest first.
 *     enabled    bool     Whether the tab is registered at all.
 *     sidebar    bool     Whether the shared help sidebar is rendered.
 *
 * @since 1.0.4
 * @return array<string, array<string, mixed>> Enabled tabs keyed by slug, sorted by priority.
 */
function get_tabs(): array {
	$tabs = array(
		'dashboard'         => array(
			'label'      => __( 'Dashboard', 'bloqra' ),
			'callback'   => __NAMESPACE__ . '\Dashboard\render',
			'capability' => 'edit_theme_options',
			'priority'   => 10,
			'enabled'    => true,
			'sidebar'    => true,
		),
		'plugins'           => array(
			'label'      => __( 'Useful Plugins', 'bloqra' ),
			'callback'   => __NAMESPACE__ . '\Plugins\render',
			'capability' => 'edit_theme_options',
			'priority'   => 20,
			'enabled'    => true,
			'sidebar'    => false,
		),
		'changelog'         => array(
			'label'      => __( 'Changelog', 'bloqra' ),
			'callback'   => __NAMESPACE__ . '\Changelog\render',
			'capability' => 'edit_theme_options',
			'priority'   => 30,
			'enabled'    => true,
			'sidebar'    => false,
		),
		// Ready for the Starter Templates plugin; flip 'enabled' when it ships.
		'starter-templates' => array(
			'label'      => __( 'Starter Templates', 'bloqra' ),
			'callback'   => __NAMESPACE__ . '\StarterTemplates\render',
			'capability' => 'edit_theme_options',
			'priority'   => 40,
			'enabled'    => false,
			'sidebar'    => false,
		),
	);

	/**
	 * Filter the tabs shown in the Bloqra theme dashboard.
	 *
	 * @since 1.0.4
	 * @param array $tabs Tab definitions keyed by slug.
	 */
	$tabs = (array) apply_filters( 'bloqra_admin_tabs', $tabs );

	$tabs = array_filter(
		$tabs,
		function ( $tab ) {
			return ! empty( $tab['enabled'] ) && is_callable( $tab['callback'] ) && current_user_can( $tab['capability'] );
		}
	);

	uasort(
		$tabs,
		function ( $a, $b ) {
			return ( isset( $a['priority'] ) ? $a['priority'] : 10 ) <=> ( isset( $b['priority'] ) ? $b['priority'] : 10 );
		}
	);

	return $tabs;
}

/**
 * Get the slug of the tab being viewed.
 *
 * Falls back to the first registered tab when ?tab= is missing or unknown.
 *
 * @since 1.0.4
 * @return string Tab slug, or an empty string when no tab is available.
 */
function get_current_tab(): string {
	$tabs = get_tabs();

	if ( empty( $tabs ) ) {
		return '';
	}

	// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Read-only navigation between tabs.
	$requested = isset( $_GET['tab'] ) ? sanitize_key( wp_unslash( $_GET['tab'] ) ) : '';

	if ( isset( $tabs[ $requested ] ) ) {
		return $requested;
	}

	return (string) key( $tabs );
}
