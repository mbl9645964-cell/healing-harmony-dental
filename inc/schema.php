<?php
/**
 * Dentist / LocalBusiness JSON-LD schema.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'wp_head', 'hhd_schema', 20 );
function hhd_schema() {
	if ( ! is_front_page() ) {
		return;
	}

	$data = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Dentist',
		'name'        => get_bloginfo( 'name' ),
		'description' => get_bloginfo( 'description' ),
		'url'         => home_url( '/' ),
		'telephone'   => hhd_opt( 'hhd_phone' ),
		'email'       => hhd_opt( 'hhd_email' ),
		'priceRange'  => '₹₹',
		'address'     => array(
			'@type'           => 'PostalAddress',
			'streetAddress'   => '219, M Block Road, Greater Kailash II',
			'addressLocality' => 'New Delhi',
			'addressRegion'   => 'Delhi',
			'postalCode'      => '110048',
			'addressCountry'  => 'IN',
		),
		'geo'         => array(
			'@type'     => 'GeoCoordinates',
			'latitude'  => '28.5290',
			'longitude' => '77.2440',
		),
		'openingHoursSpecification' => array(
			array(
				'@type'     => 'OpeningHoursSpecification',
				'dayOfWeek' => array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ),
				'opens'     => '10:00',
				'closes'    => '20:00',
			),
		),
		'aggregateRating' => array(
			'@type'       => 'AggregateRating',
			'ratingValue' => hhd_opt( 'hhd_rating' ),
			'reviewCount' => hhd_opt( 'hhd_reviews' ),
		),
	);

	$logo = get_theme_mod( 'custom_logo' );
	if ( $logo ) {
		$src = wp_get_attachment_image_url( $logo, 'full' );
		if ( $src ) {
			$data['logo']  = $src;
			$data['image'] = $src;
		}
	}

	echo "\n<script type=\"application/ld+json\">" . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . "</script>\n";
}
