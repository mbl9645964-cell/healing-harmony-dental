<?php
/**
 * Studio gallery strip.
 *
 * @package HealingHarmony
 */

$imgs = array(
	array( 'treatment-room.jpg', 'The treatment room' ),
	array( 'waiting-lounge.jpg', 'Waiting lounge' ),
	array( 'chair-detail.jpg', 'Sage dental chair' ),
	array( 'reception.jpg', 'Reception' ),
);
?>
<section class="gallery" id="clinic">
	<div class="wrap">
		<?php hhd_section_head( 'Inside the studio', 'Designed to keep you calm', '', 'center' ); ?>
	</div>
	<div class="gallery__row">
		<?php foreach ( $imgs as $img ) : ?>
			<figure class="gallery__item" data-reveal style="background-image:url('<?php echo esc_url( HHD_URI . 'assets/images/gallery/' . $img[0] ); ?>')">
				<figcaption><?php echo esc_html( $img[1] ); ?></figcaption>
			</figure>
		<?php endforeach; ?>
	</div>
</section>
