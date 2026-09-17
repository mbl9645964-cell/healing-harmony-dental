<?php
/**
 * Services grid — pulls from CPT, falls back to a curated list.
 *
 * @package HealingHarmony
 */

$fallback = array(
	array( 'tooth', 'General & Preventive', 'Check-ups, professional cleaning, fillings and fluoride care to keep problems small.' ),
	array( 'sparkle', 'Cosmetic Dentistry', 'Whitening, veneers and smile design tailored to your face — natural, never overdone.' ),
	array( 'shield', 'Root Canal Treatment', 'Single-sitting, near-painless RCT using rotary endodontics and gentle technique.' ),
	array( 'leaf', 'Aligners & Braces', 'Clear aligners and modern orthodontics for adults and teens, planned digitally.' ),
	array( 'heart', 'Crowns & Bridges', 'Tooth-coloured ceramic crowns and bridges that look and bite like your own.' ),
	array( 'check', 'Implants', 'Fixed, long-lasting replacements for missing teeth, placed with careful planning.' ),
);

$q     = hhd_query( 'hhd_service', 6 );
$has_q = $q->have_posts();
?>
<section class="services" id="services">
	<div class="wrap">
		<?php hhd_section_head( 'What we do', 'Considered treatments, honestly recommended', 'No packages you don’t need. We suggest the smallest thing that solves the problem — and explain why.', 'center' ); ?>

		<div class="cards">
			<?php if ( $has_q ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post();
					$icon = get_post_meta( get_the_ID(), 'hhd_icon', true ) ?: 'tooth';
					?>
					<article class="card" data-reveal>
						<span class="card__icon"><?php echo hhd_icon( $icon, 26 ); ?></span>
						<h3 class="card__title"><?php the_title(); ?></h3>
						<p class="card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
						<a class="card__link" href="<?php the_permalink(); ?>">Learn more <?php echo hhd_icon( 'arrow', 15 ); ?></a>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback as $s ) : ?>
					<article class="card" data-reveal>
						<span class="card__icon"><?php echo hhd_icon( $s[0], 26 ); ?></span>
						<h3 class="card__title"><?php echo esc_html( $s[1] ); ?></h3>
						<p class="card__text"><?php echo esc_html( $s[2] ); ?></p>
						<a class="card__link" href="<?php echo esc_url( hhd_whatsapp_url( 'Hi, I would like to know more about ' . $s[1] . '.' ) ); ?>" target="_blank" rel="noopener">Enquire <?php echo hhd_icon( 'arrow', 15 ); ?></a>
					</article>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
