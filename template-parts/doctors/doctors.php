<?php
/**
 * Team / doctors.
 *
 * @package HealingHarmony
 */

$q = hhd_query( 'hhd_doctor', 4 );
?>
<section class="team" id="team">
	<div class="wrap">
		<?php hhd_section_head( 'The team', 'Familiar faces, every visit', 'A small, consistent team means you see the same people who know your history — no hand-offs, no repeating yourself.', 'center' ); ?>

		<div class="team__grid">
			<?php if ( $q->have_posts() ) : ?>
				<?php while ( $q->have_posts() ) : $q->the_post();
					$role  = get_post_meta( get_the_ID(), 'hhd_role', true );
					$quals = get_post_meta( get_the_ID(), 'hhd_quals', true );
					?>
					<article class="doc" data-reveal>
						<div class="doc__photo">
							<?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'hhd-portrait' ); else : ?>
								<span class="doc__ph"><?php echo hhd_icon( 'leaf', 40 ); ?></span>
							<?php endif; ?>
						</div>
						<div class="doc__body">
							<h3><?php the_title(); ?></h3>
							<?php if ( $role ) : ?><p class="doc__role"><?php echo esc_html( $role ); ?></p><?php endif; ?>
							<?php if ( $quals ) : ?><p class="doc__quals"><?php echo esc_html( $quals ); ?></p><?php endif; ?>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<article class="doc doc--note" data-reveal>
					<div class="doc__body">
						<h3>Add your team</h3>
						<p class="doc__role">WordPress → Doctors → Add New</p>
						<p class="doc__quals">Each doctor supports a photo, role/speciality, qualifications and a short bio. They appear here automatically.</p>
					</div>
				</article>
			<?php endif; ?>
		</div>
	</div>
</section>
