<?php
/**
 * Why choose us — reasons split panel.
 *
 * @package HealingHarmony
 */

$reasons = array(
	array( 'clock', 'Unhurried appointments', 'One patient at a time means no waiting-room rush and no cut corners.' ),
	array( 'shield', 'Genuinely sterile', 'Single-use instruments where it matters and hospital-grade sterilisation throughout.' ),
	array( 'heart', 'Gentle by default', 'Slow, communicative technique built for anxious and first-time patients.' ),
	array( 'sparkle', 'Honest advice', 'We tell you what you need — and, just as often, what you can safely skip.' ),
);
?>
<section class="why">
	<div class="wrap why__grid">
		<div class="why__intro" data-reveal>
			<span class="eyebrow">Why patients stay</span>
			<h2 class="section-title">A calmer standard of care</h2>
			<p class="section-intro">The small things add up: being listened to, being told the truth, and never feeling like a number on a conveyor belt.</p>
			<div class="why__badge">
				<?php echo hhd_stars( 5 ); ?>
				<strong><?php echo esc_html( hhd_opt( 'hhd_rating' ) ); ?> / 5</strong>
				<span>from <?php echo esc_html( hhd_opt( 'hhd_reviews' ) ); ?> Google reviews</span>
			</div>
		</div>

		<ul class="why__list">
			<?php foreach ( $reasons as $r ) : ?>
				<li data-reveal>
					<span class="why__ic"><?php echo hhd_icon( $r[0], 24 ); ?></span>
					<div>
						<h3><?php echo esc_html( $r[1] ); ?></h3>
						<p><?php echo esc_html( $r[2] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
