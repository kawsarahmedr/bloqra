<?php
/**
 * Bloqra theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bloqra
 */

defined( 'ABSPATH' ) || exit;

// Define theme constants, prefixed with BLOQRA_THEME_ to avoid collisions.
define( 'BLOQRA_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'BLOQRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'BLOQRA_THEME_URI', trailingslashit( get_template_directory_uri() ) );
define( 'BLOQRA_THEME_INC', BLOQRA_THEME_DIR . 'includes/' );

// Include core files.
require_once BLOQRA_THEME_INC . 'core.php';
require_once BLOQRA_THEME_INC . 'scripts.php';
require_once BLOQRA_THEME_INC . 'back-to-top.php';

// WooCommerce integration (loaded only when WooCommerce is active).
if ( class_exists( 'WooCommerce' ) ) {
	require_once BLOQRA_THEME_INC . 'woocommerce.php';
}
