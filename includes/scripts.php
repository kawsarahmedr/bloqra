<?php
/**
 * Enqueue theme styles.
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-and-javascript/
 * @package Bloqra
 */

namespace Bloqra\Scripts;

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles' );

/**
 * Enqueue the front-end stylesheet.
 *
 * Serves the minified stylesheet by default and the readable source when
 * SCRIPT_DEBUG is enabled. The 'path' data lets WordPress inline the styles
 * where appropriate and resolve them inside the block editor.
 *
 * @since 1.0.0
 * @return void
 */
function enqueue_styles(): void {
	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$handle = 'bloqra-style';

	wp_enqueue_style(
		$handle,
		BLOQRA_THEME_URI . 'style' . $suffix . '.css',
		array(),
		BLOQRA_THEME_VERSION
	);

	wp_style_add_data( $handle, 'path', BLOQRA_THEME_DIR . 'style' . $suffix . '.css' );
}
