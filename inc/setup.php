<?php
/**
 * Theme setup: supports, menus, image sizes.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'hhd_setup' );
function hhd_setup() {
	load_theme_textdomain( 'healing-harmony', HHD_DIR . 'languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 120,
		'width'       => 360,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'align-wide' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );

	add_image_size( 'hhd-wide', 1600, 1000, true );
	add_image_size( 'hhd-card', 720, 900, true );
	add_image_size( 'hhd-portrait', 640, 800, true );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'healing-harmony' ),
		'footer'  => __( 'Footer Menu', 'healing-harmony' ),
	) );
}

/**
 * Content width.
 */
add_action( 'after_setup_theme', function () {
	$GLOBALS['content_width'] = 1200;
} );

/**
 * Body classes for cleaner styling hooks.
 */
add_filter( 'body_class', function ( $classes ) {
	if ( is_front_page() ) {
		$classes[] = 'hhd-front';
	}
	return $classes;
} );

/**
 * Fallback favicon when no Site Icon is set in the Customizer.
 */
add_action( 'wp_head', function () {
	if ( has_site_icon() ) {
		return;
	}
	echo '<link rel="icon" href="' . esc_url( HHD_URI . 'assets/images/favicon.png' ) . '" sizes="any">' . "\n";
}, 5 );
