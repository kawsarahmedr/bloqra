<?php
/**
 * Post-activation welcome notice.
 *
 * Shown once after the theme is activated, to users who can actually act on
 * it, and never again after it is dismissed. The dismissal is stored in user
 * meta so it is per user rather than site-wide.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\Notice;

use function Bloqra\Admin\Helpers\page_url;
use function Bloqra\Admin\Menu\is_dashboard_screen;

defined( 'ABSPATH' ) || exit;

/**
 * User meta key recording that the welcome notice was dismissed.
 */
const DISMISSED_META = 'bloqra_welcome_dismissed';

/**
 * Option flag set when the theme is activated.
 */
const ACTIVATED_OPTION = 'bloqra_theme_activated';

// Register action and filter hooks.
add_action( 'after_switch_theme', __NAMESPACE__ . '\\flag_activation' );
add_action( 'admin_notices', __NAMESPACE__ . '\\render_notice' );
add_action( 'wp_ajax_bloqra_dismiss_notice', __NAMESPACE__ . '\\ajax_dismiss' );
add_action( 'admin_print_styles', __NAMESPACE__ . '\\print_styles' );
add_action( 'admin_print_footer_scripts', __NAMESPACE__ . '\\print_scripts' );

/**
 * Record that the theme was just activated.
 *
 * @since 1.0.4
 * @return void
 */
function flag_activation(): void {
	update_option( ACTIVATED_OPTION, 1, false );
}

/**
 * Whether the welcome notice should be rendered on this request.
 *
 * @since 1.0.4
 * @return bool True when the notice is due.
 */
function should_render(): bool {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return false;
	}

	if ( ! get_option( ACTIVATED_OPTION ) ) {
		return false;
	}

	// Pointless on the page the notice is sending people to.
	if ( is_dashboard_screen() ) {
		return false;
	}

	return ! get_user_meta( get_current_user_id(), DISMISSED_META, true );
}

/**
 * Render the welcome notice.
 *
 * @since 1.0.4
 * @return void
 */
function render_notice(): void {
	if ( ! should_render() ) {
		return;
	}
	?>
	<div class="notice notice-info is-dismissible bloqra-welcome-notice"
		data-nonce="<?php echo esc_attr( wp_create_nonce( 'bloqra_admin' ) ); ?>">
		<p class="bloqra-welcome-notice__text">
			<strong><?php esc_html_e( 'Thanks for installing Bloqra!', 'bloqra' ); ?></strong>
			<?php esc_html_e( 'Take a look at the theme dashboard for shortcuts, useful plugins and the changelog.', 'bloqra' ); ?>
		</p>
		<p>
			<a class="button button-primary" href="<?php echo esc_url( page_url() ); ?>">
				<?php esc_html_e( 'Open the Bloqra dashboard', 'bloqra' ); ?>
			</a>
		</p>
	</div>
	<?php
}

/**
 * Print the few rules the notice needs outside the dashboard screens.
 *
 * Loading the full admin stylesheet everywhere for one notice would be
 * wasteful, so these rules are inlined instead.
 *
 * @since 1.0.4
 * @return void
 */
function print_styles(): void {
	if ( ! should_render() ) {
		return;
	}
	?>
	<style id="bloqra-welcome-notice-css">
		.bloqra-welcome-notice { border-inline-start-color: #5511F8; }
		.bloqra-welcome-notice__text { font-size: 14px; }
	</style>
	<?php
}

/**
 * Print the dismissal handler.
 *
 * The notice can appear on any admin screen, so this stays a few inlined
 * lines rather than a file enqueued site-wide.
 *
 * @since 1.0.4
 * @return void
 */
function print_scripts(): void {
	if ( ! should_render() ) {
		return;
	}
	?>
	<script id="bloqra-welcome-notice-js">
		document.addEventListener( 'click', function ( event ) {
			var notice = event.target.closest( '.bloqra-welcome-notice' );

			if ( ! notice || ! event.target.classList.contains( 'notice-dismiss' ) ) {
				return;
			}

			var body = new FormData();
			body.append( 'action', 'bloqra_dismiss_notice' );
			body.append( 'nonce', notice.dataset.nonce );

			window.fetch( <?php echo wp_json_encode( admin_url( 'admin-ajax.php' ) ); ?>, {
				method: 'POST',
				credentials: 'same-origin',
				body: body
			} );
		} );
	</script>
	<?php
}

/**
 * Permanently dismiss the welcome notice for the current user.
 *
 * @since 1.0.4
 * @return void
 */
function ajax_dismiss(): void {
	check_ajax_referer( 'bloqra_admin', 'nonce' );

	if ( ! current_user_can( 'edit_theme_options' ) ) {
		wp_send_json_error( array(), 403 );
	}

	update_user_meta( get_current_user_id(), DISMISSED_META, 1 );

	wp_send_json_success();
}
