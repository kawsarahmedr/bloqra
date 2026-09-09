<?php
/**
 * Theme dashboard menu, router and page shell.
 *
 * Registers a single Appearance > Bloqra page. The WordPress admin menu is
 * only two levels deep, so the tab registry drives an in-page tab strip rather
 * than submenu children -- the same shape Kadence and Blocksy use.
 *
 * @link https://developer.wordpress.org/reference/functions/add_theme_page/
 * @package Bloqra
 */

namespace Bloqra\Admin\Menu;

use function Bloqra\Admin\get_current_tab;
use function Bloqra\Admin\get_tabs;
use function Bloqra\Admin\Helpers\render_header;
use function Bloqra\Admin\Helpers\render_sidebar;

defined( 'ABSPATH' ) || exit;

// Register action and filter hooks.
add_action( 'admin_menu', __NAMESPACE__ . '\\register_menu' );
add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\\enqueue_assets' );
add_action( 'in_admin_header', __NAMESPACE__ . '\\suppress_admin_notices', 1000 );

/**
 * Register the Appearance > Bloqra page.
 *
 * @since 1.0.4
 * @return void
 */
function register_menu(): void {
	$hook = add_theme_page(
		__( 'Bloqra', 'bloqra' ),
		__( 'Bloqra', 'bloqra' ),
		'edit_theme_options',
		BLOQRA_THEME_ADMIN_SLUG,
		__NAMESPACE__ . '\\render_page'
	);

	if ( $hook ) {
		get_page_hook( $hook );
	}
}

/**
 * Remember (and read back) the hook suffix of the dashboard page.
 *
 * @since 1.0.4
 * @param string $hook Optional. Hook suffix to store. Default '' to read.
 * @return string Stored hook suffix.
 */
function get_page_hook( string $hook = '' ): string {
	static $stored = '';

	if ( '' !== $hook ) {
		$stored = $hook;
	}

	return $stored;
}

/**
 * Whether the current admin request is the theme dashboard.
 *
 * @since 1.0.4
 * @param string $hook_suffix Optional. Hook suffix of the current screen.
 * @return bool True on the Bloqra dashboard screen.
 */
function is_dashboard_screen( string $hook_suffix = '' ): bool {
	$page_hook = get_page_hook();

	if ( '' === $page_hook ) {
		return false;
	}

	if ( '' === $hook_suffix ) {
		$screen      = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
		$hook_suffix = $screen ? $screen->id : '';
	}

	return $page_hook === $hook_suffix;
}

/**
 * Enqueue the dashboard stylesheet and script.
 *
 * Serves the minified stylesheet by default and the readable source when
 * SCRIPT_DEBUG is enabled, matching the front-end rule in includes/scripts.php.
 *
 * @since 1.0.4
 * @param string $hook_suffix Hook suffix of the current admin screen.
 * @return void
 */
function enqueue_assets( string $hook_suffix ): void {
	if ( ! is_dashboard_screen( $hook_suffix ) ) {
		return;
	}

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style(
		'bloqra-admin',
		BLOQRA_THEME_URI . 'assets/css/admin' . $suffix . '.css',
		array(),
		BLOQRA_THEME_VERSION
	);

	// 'updates' is core's own updater, which powers plugin installation on the
	// Useful Plugins tab; listing it as a dependency also fixes the load order.
	wp_enqueue_script(
		'bloqra-admin',
		BLOQRA_THEME_URI . 'assets/js/admin.js',
		array( 'wp-a11y', 'updates' ),
		BLOQRA_THEME_VERSION,
		true
	);

	wp_localize_script(
		'bloqra-admin',
		'bloqraAdmin',
		array(
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'nonce'      => wp_create_nonce( 'bloqra_admin' ),
			'pluginsUrl' => admin_url( 'plugins.php' ),
			'i18n'       => array(
				'installing' => __( 'Installing...', 'bloqra' ),
				'activating' => __( 'Activating...', 'bloqra' ),
				'activate'   => __( 'Activate', 'bloqra' ),
				'active'     => __( 'Active', 'bloqra' ),
				'failed'     => __( 'Something went wrong. Please try again.', 'bloqra' ),
				'showOlder'  => __( 'Show older versions', 'bloqra' ),
				'hideOlder'  => __( 'Hide older versions', 'bloqra' ),
			),
		)
	);
}

/**
 * Move third-party admin notices out of the branded page shell.
 *
 * Plugin nags injected into `admin_notices` would otherwise land between the
 * page header and the tab strip and break the layout.
 *
 * @since 1.0.4
 * @return void
 */
function suppress_admin_notices(): void {
	if ( ! is_dashboard_screen() ) {
		return;
	}

	remove_all_actions( 'admin_notices' );
	remove_all_actions( 'all_admin_notices' );
}

/**
 * Render the dashboard page shell.
 *
 * @since 1.0.4
 * @return void
 */
function render_page(): void {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_die( esc_html__( 'You do not have permission to view this page.', 'bloqra' ) );
	}

	$tabs    = get_tabs();
	$current = get_current_tab();

	if ( '' === $current || ! isset( $tabs[ $current ] ) ) {
		return;
	}

	$tab          = $tabs[ $current ];
	$with_sidebar = ! empty( $tab['sidebar'] );
	?>
	<div class="wrap bloqra-admin bloqra-admin--<?php echo esc_attr( $current ); ?>">
		<h1 class="screen-reader-text"><?php esc_html_e( 'Bloqra', 'bloqra' ); ?></h1>

		<?php render_header( $current ); ?>

		<div class="bloqra-admin__body<?php echo $with_sidebar ? ' has-sidebar' : ''; ?>">
			<div class="bloqra-admin__main" id="bloqra-admin-panel" role="tabpanel"
				aria-labelledby="bloqra-tab-<?php echo esc_attr( $current ); ?>">
				<?php call_user_func( $tab['callback'] ); ?>
			</div>

			<?php
			if ( $with_sidebar ) {
				render_sidebar();
			}
			?>
		</div>
	</div>
	<?php
}
