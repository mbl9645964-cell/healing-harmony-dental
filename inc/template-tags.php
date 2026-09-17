<?php
/**
 * Template helpers.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Clean phone for tel: links.
 */
function hhd_tel() {
	return preg_replace( '/[^0-9+]/', '', hhd_opt( 'hhd_phone' ) );
}

/**
 * WhatsApp click-to-chat URL with a friendly pre-filled message.
 */
function hhd_whatsapp_url( $msg = '' ) {
	$num = preg_replace( '/[^0-9]/', '', hhd_opt( 'hhd_whatsapp' ) );
	if ( '' === $msg ) {
		$msg = 'Hello Healing Harmony Dental — I would like to book an appointment.';
	}
	return 'https://wa.me/' . $num . '?text=' . rawurlencode( $msg );
}

/**
 * Resolve a hero slide URL: Customizer image → bundled fallback.
 *
 * @param int    $i        slide index (1..4)
 * @param string $fallback bundled filename in assets/images/gallery/
 */
function hhd_slide_url( $i, $fallback ) {
	$id = (int) get_theme_mod( "hhd_slide_$i", 0 );
	if ( $id ) {
		$src = wp_get_attachment_image_url( $id, 'hhd-wide' );
		if ( $src ) {
			return $src;
		}
	}
	return HHD_URI . 'assets/images/gallery/' . $fallback;
}

/**
 * Section eyebrow + heading block.
 */
function hhd_section_head( $kicker, $title, $intro = '', $align = 'left' ) {
	$c = 'right' === $align ? ' is-right' : ( 'center' === $align ? ' is-center' : '' );
	echo '<header class="section-head' . esc_attr( $c ) . '" data-reveal>';
	if ( $kicker ) {
		echo '<span class="eyebrow">' . esc_html( $kicker ) . '</span>';
	}
	echo '<h2 class="section-title">' . wp_kses_post( $title ) . '</h2>';
	if ( $intro ) {
		echo '<p class="section-intro">' . wp_kses_post( $intro ) . '</p>';
	}
	echo '</header>';
}

/**
 * Small inline SVG icon set (stroke, currentColor).
 */
function hhd_icon( $name, $size = 24 ) {
	$paths = array(
		'tooth'    => '<path d="M12 5.5c-1.5-1.2-3-1.8-4.4-1.5C5.8 4.4 4.5 6 4.5 8.2c0 1.6.4 2.7.8 4.3.3 1.2.4 2.5.6 3.9.2 1.4.5 3.1 1.6 3.1 1 0 1.2-1.3 1.5-2.6.3-1.2.6-2.4 1.4-2.4s1.1 1.2 1.4 2.4c.3 1.3.5 2.6 1.5 2.6 1.1 0 1.4-1.7 1.6-3.1.2-1.4.3-2.7.6-3.9.4-1.6.8-2.7.8-4.3 0-2.2-1.3-3.8-3.1-4.2-1.4-.3-2.9.3-4.4 1.5z"/>',
		'sparkle'  => '<path d="M12 3l1.9 5.1L19 10l-5.1 1.9L12 17l-1.9-5.1L5 10l5.1-1.9z"/><path d="M18 15l.8 2.2L21 18l-2.2.8L18 21l-.8-2.2L15 18l2.2-.8z"/>',
		'shield'   => '<path d="M12 3l7 3v5c0 4.5-3 8-7 10-4-2-7-5.5-7-10V6z"/><path d="M9 12l2 2 4-4"/>',
		'heart'    => '<path d="M12 20s-7-4.3-7-9.3A3.7 3.7 0 0112 6.6 3.7 3.7 0 0119 10.7c0 5-7 9.3-7 9.3z"/>',
		'clock'    => '<circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/>',
		'leaf'     => '<path d="M5 19c0-8 6-13 14-13 0 8-5 14-13 14"/><path d="M5 19c3-4 6-6 10-8"/>',
		'phone'    => '<path d="M6 3h3l2 5-2 1a12 12 0 005 5l1-2 5 2v3a2 2 0 01-2 2A16 16 0 014 5a2 2 0 012-2z"/>',
		'pin'      => '<path d="M12 21s-6-5-6-10a6 6 0 1112 0c0 5-6 10-6 10z"/><circle cx="12" cy="11" r="2.2"/>',
		'star'     => '<path d="M12 3l2.6 5.6L20 9.5l-4 4 1 5.9L12 16.6 7 19.4l1-5.9-4-4 5.4-.9z"/>',
		'arrow'    => '<path d="M5 12h14"/><path d="M13 6l6 6-6 6"/>',
		'check'    => '<path d="M20 6L9 17l-5-5"/>',
		'chat'     => '<path d="M4 5h16v11H9l-5 4z"/>',
	);
	$d = isset( $paths[ $name ] ) ? $paths[ $name ] : '';
	return sprintf(
		'<svg class="ic ic-%1$s" width="%2$d" height="%2$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%3$s</svg>',
		esc_attr( $name ),
		(int) $size,
		$d
	);
}

/**
 * Query helper for CPTs by menu_order.
 */
function hhd_query( $type, $count = -1 ) {
	return new WP_Query( array(
		'post_type'      => $type,
		'posts_per_page' => $count,
		'orderby'        => 'menu_order title',
		'order'          => 'ASC',
		'no_found_rows'  => true,
	) );
}

/**
 * Star row markup.
 */
function hhd_stars( $n = 5 ) {
	$n   = max( 0, min( 5, (int) $n ) );
	$out = '<span class="stars" aria-label="' . esc_attr( $n ) . ' out of 5">';
	for ( $i = 0; $i < 5; $i++ ) {
		$out .= hhd_icon( 'star', 16 );
	}
	return $out . '</span>';
}
