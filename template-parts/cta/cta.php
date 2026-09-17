<?php
/**
 * Closing CTA + map / visit block.
 *
 * @package HealingHarmony
 */
?>
<section class="cta" id="book">
	<div class="wrap cta__grid">
		<div class="cta__copy" data-reveal>
			<span class="eyebrow eyebrow--light">Book your visit</span>
			<h2 class="cta__title">Ready when you are.</h2>
			<p>Message us on WhatsApp or call the clinic — we’ll find a slot that suits you, usually the same week. New patients always welcome.</p>
			<div class="cta__actions">
				<a class="btn btn--solid btn--lg" href="<?php echo esc_url( hhd_whatsapp_url() ); ?>" target="_blank" rel="noopener"><?php echo hhd_icon( 'chat', 18 ); ?> WhatsApp us</a>
				<a class="btn btn--line btn--lg" href="tel:<?php echo esc_attr( hhd_tel() ); ?>"><?php echo hhd_icon( 'phone', 18 ); ?> <?php echo esc_html( hhd_opt( 'hhd_phone' ) ); ?></a>
			</div>
		</div>

		<div class="cta__card" data-reveal>
			<h3><?php echo hhd_icon( 'pin', 20 ); ?> Find us</h3>
			<p><?php echo nl2br( esc_html( hhd_opt( 'hhd_address' ) ) ); ?></p>
			<h3><?php echo hhd_icon( 'clock', 20 ); ?> Hours</h3>
			<p><?php echo nl2br( esc_html( hhd_opt( 'hhd_hours' ) ) ); ?></p>
			<a class="link-arrow" href="<?php echo esc_url( hhd_opt( 'hhd_map' ) ); ?>" target="_blank" rel="noopener">Open in Google Maps <?php echo hhd_icon( 'arrow', 16 ); ?></a>
		</div>
	</div>
</section>
