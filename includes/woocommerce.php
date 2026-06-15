<?php
/**
 * WooCommerce integration.
 *
 * Loaded from functions.php only when WooCommerce is active. Declares theme
 * support, refines product gallery features and enqueues a small stylesheet
 * that aligns WooCommerce UI with the Bloqra design system.
 *
 * @link https://woocommerce.com/document/woocommerce-theme-developer-handbook/
 * @package Bloqra
 */

namespace Bloqra\WooCommerce;

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles', 20 );

/**
 * Declare WooCommerce theme support.
 *
 * @since 1.0.0
 * @return void
 */
function setup(): void {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Enqueue WooCommerce-specific styles on store pages.
 *
 * @since 1.0.0
 * @return void
 */
function enqueue_styles(): void {
	if ( ! function_exists( 'is_woocommerce' ) ) {
		return;
	}

	if ( is_woocommerce() || is_cart() || is_checkout() || is_account_page() ) {
		wp_enqueue_style(
			'bloqra-woocommerce',
			BLOQRA_THEME_URI . 'assets/css/woocommerce.css',
			array( 'bloqra-style' ),
			BLOQRA_THEME_VERSION
		);
	}
}
