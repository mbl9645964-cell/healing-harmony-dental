<?php
/**
 * Healing Harmony Dental — theme bootstrap.
 *
 * Loads modular includes. No business logic lives directly in this file.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // No direct access.
}

define( 'HHD_VERSION', '1.0.0' );
define( 'HHD_DIR', trailingslashit( get_template_directory() ) );
define( 'HHD_URI', trailingslashit( get_template_directory_uri() ) );

/**
 * Load an include file from /inc.
 *
 * @param string $file Relative path inside /inc (without extension).
 */
function hhd_require( $file ) {
	$path = HHD_DIR . 'inc/' . $file . '.php';
	if ( is_readable( $path ) ) {
		require_once $path;
	}
}

hhd_require( 'setup' );
hhd_require( 'enqueue' );
hhd_require( 'template-tags' );
hhd_require( 'customizer' );
hhd_require( 'post-types' );
hhd_require( 'schema' );
hhd_require( 'security' );
