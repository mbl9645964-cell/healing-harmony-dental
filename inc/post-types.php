<?php
/**
 * Custom post types + taxonomies: Doctors, Services, Testimonials, FAQs.
 *
 * @package HealingHarmony
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'init', 'hhd_register_cpts' );
function hhd_register_cpts() {

	register_post_type( 'hhd_doctor', array(
		'labels'       => hhd_cpt_labels( 'Doctor', 'Doctors' ),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-businessperson',
		'rewrite'      => array( 'slug' => 'team' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'show_in_rest' => true,
	) );

	register_post_type( 'hhd_service', array(
		'labels'       => hhd_cpt_labels( 'Service', 'Services' ),
		'public'       => true,
		'has_archive'  => true,
		'menu_icon'    => 'dashicons-heart',
		'rewrite'      => array( 'slug' => 'treatments' ),
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
		'show_in_rest' => true,
	) );

	register_post_type( 'hhd_review', array(
		'labels'       => hhd_cpt_labels( 'Testimonial', 'Testimonials' ),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-format-quote',
		'rewrite'      => array( 'slug' => 'reviews' ),
		'supports'     => array( 'title', 'editor', 'page-attributes' ),
		'show_in_rest' => true,
	) );

	register_post_type( 'hhd_faq', array(
		'labels'       => hhd_cpt_labels( 'FAQ', 'FAQs' ),
		'public'       => true,
		'has_archive'  => false,
		'menu_icon'    => 'dashicons-editor-help',
		'rewrite'      => array( 'slug' => 'faqs' ),
		'supports'     => array( 'title', 'editor', 'page-attributes' ),
		'show_in_rest' => true,
	) );

	register_taxonomy( 'hhd_service_cat', 'hhd_service', array(
		'labels'       => hhd_cpt_labels( 'Category', 'Categories' ),
		'hierarchical' => true,
		'show_in_rest' => true,
		'rewrite'      => array( 'slug' => 'treatment-type' ),
	) );
}

/**
 * Small helper to build CPT labels.
 */
function hhd_cpt_labels( $single, $plural ) {
	return array(
		'name'               => $plural,
		'singular_name'      => $single,
		'add_new_item'       => "Add New $single",
		'edit_item'          => "Edit $single",
		'new_item'           => "New $single",
		'view_item'          => "View $single",
		'search_items'       => "Search $plural",
		'not_found'          => "No $plural found",
		'all_items'          => "All $plural",
		'menu_name'          => $plural,
	);
}

/**
 * Meta boxes: doctor role/quals, service price/duration, review meta.
 */
add_action( 'add_meta_boxes', function () {
	add_meta_box( 'hhd_doctor_meta', 'Doctor Details', 'hhd_doctor_meta_cb', 'hhd_doctor', 'side' );
	add_meta_box( 'hhd_service_meta', 'Service Details', 'hhd_service_meta_cb', 'hhd_service', 'side' );
	add_meta_box( 'hhd_review_meta', 'Testimonial Details', 'hhd_review_meta_cb', 'hhd_review', 'side' );
} );

function hhd_field( $post_id, $key ) {
	return esc_attr( get_post_meta( $post_id, $key, true ) );
}

function hhd_doctor_meta_cb( $post ) {
	wp_nonce_field( 'hhd_meta', 'hhd_meta_nonce' );
	printf( '<p><label>Role / Speciality<br><input type="text" name="hhd_role" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_role' ) );
	printf( '<p><label>Qualifications<br><input type="text" name="hhd_quals" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_quals' ) );
	printf( '<p><label>Years of Experience<br><input type="text" name="hhd_years" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_years' ) );
}

function hhd_service_meta_cb( $post ) {
	wp_nonce_field( 'hhd_meta', 'hhd_meta_nonce' );
	printf( '<p><label>Starting Price (₹)<br><input type="text" name="hhd_price" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_price' ) );
	printf( '<p><label>Typical Duration<br><input type="text" name="hhd_duration" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_duration' ) );
	printf( '<p><label>Icon (emoji/short)<br><input type="text" name="hhd_icon" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_icon' ) );
}

function hhd_review_meta_cb( $post ) {
	wp_nonce_field( 'hhd_meta', 'hhd_meta_nonce' );
	printf( '<p><label>Patient Name<br><input type="text" name="hhd_author" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_author' ) );
	printf( '<p><label>Rating (1-5)<br><input type="number" min="1" max="5" name="hhd_rating" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_rating' ) );
	printf( '<p><label>Treatment<br><input type="text" name="hhd_treatment" value="%s" style="width:100%%"></label></p>', hhd_field( $post->ID, 'hhd_treatment' ) );
}

add_action( 'save_post', function ( $post_id ) {
	if ( ! isset( $_POST['hhd_meta_nonce'] ) || ! wp_verify_nonce( $_POST['hhd_meta_nonce'], 'hhd_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$keys = array( 'hhd_role', 'hhd_quals', 'hhd_years', 'hhd_price', 'hhd_duration', 'hhd_icon', 'hhd_author', 'hhd_rating', 'hhd_treatment' );
	foreach ( $keys as $k ) {
		if ( isset( $_POST[ $k ] ) ) {
			update_post_meta( $post_id, $k, sanitize_text_field( wp_unslash( $_POST[ $k ] ) ) );
		}
	}
} );
