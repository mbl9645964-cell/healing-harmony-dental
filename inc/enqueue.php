<?php
/**
 * Styles, scripts and fonts.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_enqueue_scripts', 'hhd_assets' );
function hhd_assets() {
	// Google Fonts — Fraunces (editorial serif) + Inter (clean sans).
	wp_enqueue_style(
		'hhd-fonts',
		'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,400&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	// Design system.
	wp_enqueue_style(
		'hhd-theme',
		HHD_URI . 'assets/css/theme.css',
		array( 'hhd-fonts' ),
		HHD_VERSION
	);

	// Required WP root stylesheet (theme header).
	wp_enqueue_style( 'hhd-style', get_stylesheet_uri(), array( 'hhd-theme' ), HHD_VERSION );

	// Interactions (slideshow, nav, reveal, counters).
	wp_enqueue_script( 'hhd-theme', HHD_URI . 'assets/js/theme.js', array(), HHD_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Editor styles.
 */
add_action( 'after_setup_theme', function () {
	add_editor_style( 'assets/css/theme.css' );
} );
