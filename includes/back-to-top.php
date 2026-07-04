<?php
/**
 * Back-to-top button.
 *
 * A small progressive enhancement inspired by the Blocksy theme: a floating
 * button appears once the visitor scrolls and returns them to the top of the
 * page. It is rendered hidden and revealed by JavaScript, so browsers without
 * JavaScript never see it.
 *
 * @package Bloqra
 */

namespace Bloqra\BackToTop;

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_script' );
add_action( 'wp_footer', __NAMESPACE__ . '\\render_button' );

/**
 * Enqueue the back-to-top script.
 *
 * @since 1.0.0
 * @return void
 */
function enqueue_script(): void {
	wp_enqueue_script(
		'bloqra-back-to-top',
		BLOQRA_THEME_URI . 'assets/js/back-to-top.js',
		array(),
		BLOQRA_THEME_VERSION,
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}

/**
 * Render the back-to-top button in the footer.
 *
 * @since 1.0.0
 * @return void
 */
function render_button(): void {
	?>
	<button type="button" class="bloqra-back-to-top" aria-label="<?php echo esc_attr__( 'Back to top', 'bloqra' ); ?>">
		<svg aria-hidden="true" focusable="false" width="16" height="16" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 3.5 3.2 10.3l1.4 1.4L9 7.3V17h2V7.3l4.4 4.4 1.4-1.4L10 3.5z"/></svg>
	</button>
	<?php
}
