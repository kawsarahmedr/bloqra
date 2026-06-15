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
 * @since 1.0.0
 * @return void
 */
function enqueue_styles(): void {
	wp_enqueue_style(
		'bloqra-style',
		get_stylesheet_uri(),
		array(),
		BLOQRA_THEME_VERSION
	);
}
