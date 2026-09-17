<?php
/**
 * Customizer: contact, hero, slideshow, social.
 * Real defaults for Healing Harmony Dental Clinic, Greater Kailash II.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Central defaults — used across templates via hhd_opt().
 */
function hhd_defaults() {
	return array(
		'hhd_phone'      => '+91 98110 00000',
		'hhd_whatsapp'   => '919811000000',
		'hhd_email'      => 'hello@healingharmonydental.in',
		'hhd_address'    => '219, M Block Road, Greater Kailash II, New Delhi, Delhi 110048',
		'hhd_map'        => 'https://maps.google.com/?q=Healing+Harmony+Dental+Clinic+Greater+Kailash+II',
		'hhd_hours'      => "Mon – Sat : 10:00 am – 8:00 pm\nSunday : By appointment",
		'hhd_rating'     => '5.0',
		'hhd_reviews'    => '6',
		'hhd_hero_kicker'=> 'Greater Kailash II · New Delhi',
		'hhd_hero_title' => 'Calm, considered dentistry in the heart of GK-II',
		'hhd_hero_text'  => 'A boutique single-chair studio where unhurried appointments, gentle technique and honest advice come standard. No rush, no upsell — just healthy, harmonious smiles.',
		'hhd_hero_cta'   => 'Book an appointment',
		'hhd_instagram'  => '',
		'hhd_facebook'   => '',
	);
}

function hhd_opt( $key ) {
	$defaults = hhd_defaults();
	$default  = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
	return get_theme_mod( $key, $default );
}

add_action( 'customize_register', 'hhd_customize' );
function hhd_customize( $wp_customize ) {

	// ---- Contact panel ----
	$wp_customize->add_section( 'hhd_contact', array(
		'title'    => __( 'Clinic — Contact', 'healing-harmony' ),
		'priority' => 30,
	) );

	$contact_fields = array(
		'hhd_phone'    => 'Phone number',
		'hhd_whatsapp' => 'WhatsApp number (digits, with country code)',
		'hhd_email'    => 'Email address',
		'hhd_address'  => 'Full address',
		'hhd_map'      => 'Google Maps link',
		'hhd_hours'    => 'Opening hours (one line each)',
		'hhd_rating'   => 'Google rating',
		'hhd_reviews'  => 'Number of reviews',
	);
	$defaults = hhd_defaults();
	foreach ( $contact_fields as $id => $label ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $defaults[ $id ],
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $label,
			'section' => 'hhd_contact',
			'type'    => ( 'hhd_hours' === $id ) ? 'textarea' : 'text',
		) );
	}

	// ---- Hero panel ----
	$wp_customize->add_section( 'hhd_hero', array(
		'title'    => __( 'Homepage — Hero', 'healing-harmony' ),
		'priority' => 31,
	) );

	$hero_fields = array(
		'hhd_hero_kicker' => 'Kicker (small label)',
		'hhd_hero_title'  => 'Hero heading',
		'hhd_hero_text'   => 'Hero paragraph',
		'hhd_hero_cta'    => 'Primary button text',
	);
	foreach ( $hero_fields as $id => $label ) {
		$wp_customize->add_setting( $id, array(
			'default'           => $defaults[ $id ],
			'sanitize_callback' => 'wp_kses_post',
		) );
		$wp_customize->add_control( $id, array(
			'label'   => $label,
			'section' => 'hhd_hero',
			'type'    => ( 'hhd_hero_text' === $id ) ? 'textarea' : 'text',
		) );
	}

	// Slideshow images (up to 4).
	for ( $i = 1; $i <= 4; $i++ ) {
		$wp_customize->add_setting( "hhd_slide_$i", array( 'sanitize_callback' => 'absint' ) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, "hhd_slide_$i", array(
			'label'     => "Hero slideshow image $i",
			'section'   => 'hhd_hero',
			'mime_type' => 'image',
		) ) );
	}

	// ---- Social panel ----
	$wp_customize->add_section( 'hhd_social', array(
		'title'    => __( 'Social Links', 'healing-harmony' ),
		'priority' => 32,
	) );
	foreach ( array( 'hhd_instagram' => 'Instagram URL', 'hhd_facebook' => 'Facebook URL' ) as $id => $label ) {
		$wp_customize->add_setting( $id, array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
		$wp_customize->add_control( $id, array( 'label' => $label, 'section' => 'hhd_social', 'type' => 'url' ) );
	}
}
