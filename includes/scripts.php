<?php
/**
 * Enqueue theme styles.
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-and-javascript/
 * @package Bloqra
 */

defined( 'ABSPATH' ) || exit;

add_action( 'wp_enqueue_scripts', 'bloqra_enqueue_styles' );

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
function bloqra_enqueue_styles(): void {
	$bloqra_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$bloqra_handle = 'bloqra-style';

	wp_enqueue_style(
		$bloqra_handle,
		BLOQRA_THEME_URI . 'style' . $bloqra_suffix . '.css',
		array(),
		BLOQRA_THEME_VERSION
	);

	wp_style_add_data( $bloqra_handle, 'path', BLOQRA_THEME_DIR . 'style' . $bloqra_suffix . '.css' );
}
