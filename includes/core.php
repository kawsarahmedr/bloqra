<?php
/**
 * Core theme setup.
 *
 * Registers theme supports, navigation menus, image sizes, a block pattern
 * category and custom block styles.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Bloqra
 */

namespace Bloqra\Core;

defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', __NAMESPACE__ . '\\setup_theme' );
add_action( 'init', __NAMESPACE__ . '\\register_pattern_category', 9 );
add_action( 'init', __NAMESPACE__ . '\\register_block_styles' );

/**
 * Set up theme defaults and register support for WordPress features.
 *
 * @since 1.0.0
 * @return void
 */
function setup_theme(): void {
	// Make the theme available for translation.
	load_theme_textdomain( 'bloqra', get_template_directory() . '/languages' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable featured images.
	add_theme_support( 'post-thumbnails' );

	// Default block editor and theme features.
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	// Load the front-end stylesheet inside the editor for an accurate preview.
	add_editor_style( 'style.css' );

	// A focused custom image size used by post grids.
	add_image_size( 'bloqra-card', 720, 480, true );

	// Register the primary navigation menu (used as a classic fallback).
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'bloqra' ),
		)
	);

	// Remove the core pattern library; Bloqra ships a curated set.
	remove_theme_support( 'core-block-patterns' );
}

/**
 * Register the Bloqra block pattern category.
 *
 * @since 1.0.0
 * @return void
 */
function register_pattern_category(): void {
	register_block_pattern_category(
		'bloqra',
		array(
			'label'       => esc_html__( 'Bloqra', 'bloqra' ),
			'description' => esc_html__( 'Curated layouts and sections from the Bloqra theme.', 'bloqra' ),
		)
	);
}

/**
 * Register custom block styles used throughout the theme.
 *
 * @since 1.0.0
 * @return void
 */
function register_block_styles(): void {
	// Eyebrow / subheading style for paragraphs and headings.
	$subheading_css = '
		.is-style-subheading {
			text-transform: uppercase;
			letter-spacing: 0.08em;
			font-weight: 600;
			font-size: var(--wp--preset--font-size--small);
			color: var(--wp--preset--color--primary-600);
		}';

	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'subheading',
			'label'        => esc_html__( 'Subheading', 'bloqra' ),
			'inline_style' => $subheading_css,
		)
	);

	register_block_style(
		'core/heading',
		array(
			'name'         => 'subheading',
			'label'        => esc_html__( 'Subheading', 'bloqra' ),
			'inline_style' => $subheading_css,
		)
	);

	// Elevated card container for groups.
	register_block_style(
		'core/group',
		array(
			'name'         => 'card',
			'label'        => esc_html__( 'Card', 'bloqra' ),
			'inline_style' => '
				.wp-block-group.is-style-card {
					background-color: var(--wp--preset--color--white);
					border: 1px solid var(--wp--preset--color--neutral-200);
					border-radius: var(--wp--custom--radius--large);
					padding: var(--wp--preset--spacing--md);
					box-shadow: var(--wp--preset--shadow--small);
				}',
		)
	);

	// Checkmark list for feature lists.
	register_block_style(
		'core/list',
		array(
			'name'         => 'checklist',
			'label'        => esc_html__( 'Checklist', 'bloqra' ),
			'inline_style' => '
				ul.is-style-checklist {
					list-style: none;
					margin-left: 0;
					padding-left: 0;
				}
				ul.is-style-checklist li {
					position: relative;
					padding-left: 1.9em;
					margin-bottom: 0.6em;
				}
				ul.is-style-checklist li::before {
					content: "";
					position: absolute;
					left: 0;
					top: 0.15em;
					width: 1.25em;
					height: 1.25em;
					border-radius: var(--wp--custom--radius--pill);
					background-color: var(--wp--preset--color--primary-50);
					background-image: url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'14\' height=\'14\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'%235511F8\' stroke-width=\'3\' stroke-linecap=\'round\' stroke-linejoin=\'round\'%3E%3Cpolyline points=\'20 6 9 17 4 12\'/%3E%3C/svg%3E");
					background-repeat: no-repeat;
					background-position: center;
				}',
		)
	);

	// Pill-shaped tag/badge style for paragraphs.
	register_block_style(
		'core/paragraph',
		array(
			'name'         => 'pill',
			'label'        => esc_html__( 'Pill', 'bloqra' ),
			'inline_style' => '
				.is-style-pill {
					display: inline-block;
					padding: 0.4em 1em;
					border-radius: var(--wp--custom--radius--pill);
					background-color: var(--wp--preset--color--primary-50);
					color: var(--wp--preset--color--primary-700);
					font-size: var(--wp--preset--font-size--small);
					font-weight: 600;
				}',
		)
	);

	// Section heading underline accent for headings.
	register_block_style(
		'core/separator',
		array(
			'name'         => 'gradient',
			'label'        => esc_html__( 'Gradient', 'bloqra' ),
			'inline_style' => '
				.wp-block-separator.is-style-gradient {
					height: 4px;
					border: 0;
					max-width: 64px;
					opacity: 1;
					border-radius: var(--wp--custom--radius--pill);
					background: var(--wp--preset--gradient--primary-accent);
				}
				.wp-block-separator.is-style-gradient.aligncenter {
					margin-left: auto;
					margin-right: auto;
				}',
		)
	);
}
