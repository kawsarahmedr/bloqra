<?php
/**
 * Dashboard tab.
 *
 * The landing screen of the theme dashboard: a welcome hero, a grid of Site
 * Editor shortcuts and a short "next steps" checklist whose state is read
 * live from the site. Nothing here is stored -- this is an informational
 * screen, not a settings screen.
 *
 * @package Bloqra
 */

namespace Bloqra\Admin\Dashboard;

use function Bloqra\Admin\Helpers\render_card;
use function Bloqra\Admin\Helpers\site_editor_url;
use function Bloqra\Admin\Helpers\theme_description;

defined( 'ABSPATH' ) || exit;

/**
 * Render the Dashboard tab.
 *
 * @since 1.0.4
 * @return void
 */
function render(): void {
	render_hero();
	render_shortcuts();
	render_next_steps();
}

/**
 * Render the welcome hero.
 *
 * @since 1.0.4
 * @return void
 */
function render_hero(): void {
	$user = wp_get_current_user();
	?>
	<div class="bloqra-admin-hero">
		<div class="bloqra-admin-hero__text">
			<p class="bloqra-admin-hero__eyebrow">
				<?php
				printf(
					/* translators: %s: current user display name. */
					esc_html__( 'Hello %s', 'bloqra' ),
					esc_html( $user->display_name )
				);
				?>
			</p>
			<h2 class="bloqra-admin-hero__title"><?php esc_html_e( 'Welcome to Bloqra!', 'bloqra' ); ?></h2>
			<p class="bloqra-admin-hero__desc"><?php echo esc_html( theme_description() ); ?></p>
			<p class="bloqra-admin-hero__actions">
				<a class="button button-primary button-hero" href="<?php echo esc_url( site_editor_url() ); ?>">
					<?php esc_html_e( 'Open Site Editor', 'bloqra' ); ?>
				</a>
				<a class="bloqra-admin-hero__link"
					href="https://beautifulplugins.com/docs/bloqra/"
					target="_blank" rel="noopener noreferrer">
					<?php esc_html_e( 'Browse documentation', 'bloqra' ); ?>
					<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'bloqra' ); ?></span>
				</a>
			</p>
		</div>
		<div class="bloqra-admin-hero__visual">
			<img src="<?php echo esc_url( BLOQRA_THEME_URI . 'assets/images/admin/hero.svg' ); ?>"
				alt="" width="420" height="280" />
		</div>
	</div>
	<?php
}

/**
 * Get the Site Editor shortcut cards.
 *
 * @since 1.0.4
 * @return array<int, array<string, mixed>> Card definitions.
 */
function get_shortcuts(): array {
	$cards = array(
		array(
			'title'       => __( 'Styles & Colors', 'bloqra' ),
			'description' => __( 'Switch style variation or fine-tune the palette, typography and spacing.', 'bloqra' ),
			'url'         => site_editor_url( array( 'path' => '/wp_global_styles' ) ),
			'link_text'   => __( 'Edit styles', 'bloqra' ),
		),
		array(
			'title'       => __( 'Site Identity', 'bloqra' ),
			'description' => __( 'Set the site title and tagline, and upload the site icon shown in browser tabs.', 'bloqra' ),
			'url'         => admin_url( 'options-general.php' ),
			'link_text'   => __( 'Edit identity', 'bloqra' ),
		),
		array(
			'title'       => __( 'Header & Footer', 'bloqra' ),
			'description' => __( 'Edit the header and footer template parts used across every page.', 'bloqra' ),
			'url'         => site_editor_url( array( 'postType' => 'wp_template_part' ) ),
			'link_text'   => __( 'Edit parts', 'bloqra' ),
		),
		array(
			'title'       => __( 'Navigation', 'bloqra' ),
			'description' => __( 'Build the menu shown in the header and the full-screen mobile overlay.', 'bloqra' ),
			'url'         => site_editor_url( array( 'postType' => 'wp_navigation' ) ),
			'link_text'   => __( 'Edit navigation', 'bloqra' ),
		),
		array(
			'title'       => __( 'Templates', 'bloqra' ),
			'description' => __( 'Front page, blog, single post, archive, 404 and the sidebar variants.', 'bloqra' ),
			'url'         => site_editor_url( array( 'postType' => 'wp_template' ) ),
			'link_text'   => __( 'Edit templates', 'bloqra' ),
		),
		array(
			'title'       => __( 'Patterns', 'bloqra' ),
			'description' => __( 'The curated Bloqra pattern library: hero, features, highlight, CTA, About and Contact.', 'bloqra' ),
			'url'         => site_editor_url( array( 'postType' => 'wp_block' ) ),
			'link_text'   => __( 'Browse patterns', 'bloqra' ),
		),
	);

	/**
	 * Filter the Site Editor shortcut cards on the dashboard.
	 *
	 * @since 1.0.4
	 * @param array $cards Card definitions.
	 */
	return (array) apply_filters( 'bloqra_admin_dashboard_cards', $cards );
}

/**
 * Render the Site Editor shortcut grid.
 *
 * @since 1.0.4
 * @return void
 */
function render_shortcuts(): void {
	$cards = get_shortcuts();

	if ( empty( $cards ) ) {
		return;
	}
	?>
	<div class="bloqra-admin-section">
		<h2 class="bloqra-admin-section__title"><?php esc_html_e( 'Customize your site', 'bloqra' ); ?></h2>
		<div class="bloqra-admin-grid bloqra-admin-grid--3">
			<?php foreach ( $cards as $card ) : ?>
				<?php render_card( $card ); ?>
			<?php endforeach; ?>
		</div>
	</div>
	<?php
}

/**
 * Whether the site has customized global styles.
 *
 * Reads the user global styles post without creating one -- note that
 * WP_Theme_JSON_Resolver::get_user_global_styles_post_id() would create the
 * post as a side effect, which an informational screen must not do. A missing
 * resolver simply leaves the checklist row unticked.
 *
 * @since 1.0.4
 * @return bool True when a non-empty user global styles post exists.
 */
function has_custom_styles(): bool {
	if ( ! method_exists( '\WP_Theme_JSON_Resolver', 'get_user_data_from_wp_global_styles' ) ) {
		return false;
	}

	$user_cpt = \WP_Theme_JSON_Resolver::get_user_data_from_wp_global_styles( wp_get_theme(), false );

	if ( empty( $user_cpt['post_content'] ) ) {
		return false;
	}

	$data = json_decode( $user_cpt['post_content'], true );

	return ! empty( $data['styles'] ) || ! empty( $data['settings'] );
}

/**
 * Get the next-step checklist rows.
 *
 * @since 1.0.4
 * @return array<int, array<string, mixed>> Rows with label, url and done state.
 */
function get_next_steps(): array {
	return array(
		array(
			'label' => __( 'Choose what your homepage shows', 'bloqra' ),
			'url'   => admin_url( 'options-reading.php' ),
			'done'  => 'page' === get_option( 'show_on_front' ),
		),
		array(
			'label' => __( 'Upload your logo in the header', 'bloqra' ),
			'url'   => site_editor_url( array( 'postType' => 'wp_template_part' ) ),
			'done'  => (bool) get_theme_mod( 'custom_logo' ),
		),
		array(
			'label' => __( 'Add a site icon for browser tabs', 'bloqra' ),
			'url'   => admin_url( 'options-general.php' ),
			'done'  => (bool) get_option( 'site_icon' ),
		),
		array(
			'label' => __( 'Make the styles your own', 'bloqra' ),
			'url'   => site_editor_url( array( 'path' => '/wp_global_styles' ) ),
			'done'  => has_custom_styles(),
		),
	);
}

/**
 * Render the next-step checklist.
 *
 * @since 1.0.4
 * @return void
 */
function render_next_steps(): void {
	$steps = get_next_steps();
	?>
	<div class="bloqra-admin-section">
		<h2 class="bloqra-admin-section__title"><?php esc_html_e( 'Next steps', 'bloqra' ); ?></h2>
		<ul class="bloqra-admin-steps">
			<?php foreach ( $steps as $step ) : ?>
				<li class="bloqra-admin-steps__item<?php echo $step['done'] ? ' is-done' : ''; ?>">
					<span class="bloqra-admin-steps__mark" aria-hidden="true"></span>
					<a class="bloqra-admin-steps__link" href="<?php echo esc_url( $step['url'] ); ?>">
						<?php echo esc_html( $step['label'] ); ?>
					</a>
					<?php if ( $step['done'] ) : ?>
						<span class="screen-reader-text"><?php esc_html_e( 'Done', 'bloqra' ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php
}
