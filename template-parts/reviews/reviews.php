<?php
/**
 * Testimonials — CPT with graceful fallback.
 *
 * @package HealingHarmony
 */

$fallback = array(
	array( 'Truly the calmest dental visit I have had in Delhi. No rush, everything explained, and zero pain during my root canal.', 'Ananya R.', 'Root canal treatment' ),
	array( 'Finally a dentist who tells you what you actually need. Honest, gentle and the clinic is spotless.', 'Vikram S.', 'Check-up & cleaning' ),
	array( 'My kids are usually terrified of the dentist — they were completely at ease here. Highly recommend.', 'Meera K.', 'Family check-up' ),
);

$q = hhd_query( 'hhd_review', 6 );
?>
<section class="reviews" id="reviews">
	<div class="wrap">
		<?php hhd_section_head( 'In their words', 'Rated 5.0 by the people who matter most', '', 'center' ); ?>

		<div class="reviews__grid">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post();
					$author = get_post_meta( get_the_ID(), 'hhd_author', true ) ?: get_the_title();
					$rating = get_post_meta( get_the_ID(), 'hhd_rating', true ) ?: 5;
					$treat  = get_post_meta( get_the_ID(), 'hhd_treatment', true );
					?>
					<figure class="review" data-reveal>
						<?php echo hhd_stars( $rating ); ?>
						<blockquote><?php echo wp_kses_post( wpautop( get_the_content() ) ); ?></blockquote>
						<figcaption><strong><?php echo esc_html( $author ); ?></strong><?php if ( $treat ) : ?><span><?php echo esc_html( $treat ); ?></span><?php endif; ?></figcaption>
					</figure>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php foreach ( $fallback as $r ) : ?>
					<figure class="review" data-reveal>
						<?php echo hhd_stars( 5 ); ?>
						<blockquote><p><?php echo esc_html( $r[0] ); ?></p></blockquote>
						<figcaption><strong><?php echo esc_html( $r[1] ); ?></strong><span><?php echo esc_html( $r[2] ); ?></span></figcaption>
					</figure>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>

		<p class="reviews__cta" data-reveal>
			<a class="btn btn--line" href="<?php echo esc_url( hhd_opt( 'hhd_map' ) ); ?>" target="_blank" rel="noopener">Read all reviews on Google <?php echo hhd_icon( 'arrow', 16 ); ?></a>
		</p>
	</div>
</section>
