<?php
/**
 * Footer.
 *
 * @package HealingHarmony
 */
?>
</main>

<footer class="site-foot" id="visit">
	<div class="wrap site-foot__grid">
		<div class="site-foot__brand">
			<span class="brand__word">
				<span class="brand__mark"><?php echo hhd_icon( 'leaf', 22 ); ?></span>
				<span class="brand__name">Healing&nbsp;Harmony<small>Dental Clinic</small></span>
			</span>
			<p class="site-foot__note">A boutique dental studio in Greater Kailash II — unhurried care, gentle technique, honest advice.</p>
			<div class="site-foot__social">
				<?php if ( hhd_opt( 'hhd_instagram' ) ) : ?><a href="<?php echo esc_url( hhd_opt( 'hhd_instagram' ) ); ?>" target="_blank" rel="noopener">Instagram</a><?php endif; ?>
				<?php if ( hhd_opt( 'hhd_facebook' ) ) : ?><a href="<?php echo esc_url( hhd_opt( 'hhd_facebook' ) ); ?>" target="_blank" rel="noopener">Facebook</a><?php endif; ?>
			</div>
		</div>

		<div class="site-foot__col">
			<h4>Visit us</h4>
			<p><?php echo nl2br( esc_html( hhd_opt( 'hhd_address' ) ) ); ?></p>
			<p><a href="<?php echo esc_url( hhd_opt( 'hhd_map' ) ); ?>" target="_blank" rel="noopener">Get directions <?php echo hhd_icon( 'arrow', 15 ); ?></a></p>
		</div>

		<div class="site-foot__col">
			<h4>Hours</h4>
			<p><?php echo nl2br( esc_html( hhd_opt( 'hhd_hours' ) ) ); ?></p>
		</div>

		<div class="site-foot__col">
			<h4>Get in touch</h4>
			<p><a href="tel:<?php echo esc_attr( hhd_tel() ); ?>"><?php echo esc_html( hhd_opt( 'hhd_phone' ) ); ?></a></p>
			<p><a href="mailto:<?php echo esc_attr( hhd_opt( 'hhd_email' ) ); ?>"><?php echo esc_html( hhd_opt( 'hhd_email' ) ); ?></a></p>
			<a class="btn btn--solid" href="<?php echo esc_url( hhd_whatsapp_url() ); ?>" target="_blank" rel="noopener">WhatsApp us</a>
		</div>
	</div>

	<div class="wrap site-foot__bar">
		<span>© <?php echo esc_html( date( 'Y' ) ); ?> Healing Harmony Dental Clinic. All rights reserved.</span>
		<span>Greater Kailash II · New Delhi</span>
	</div>
</footer>

<!-- Sticky mobile action bar -->
<div class="mobile-bar">
	<a href="tel:<?php echo esc_attr( hhd_tel() ); ?>"><?php echo hhd_icon( 'phone', 20 ); ?><span>Call</span></a>
	<a href="<?php echo esc_url( hhd_opt( 'hhd_map' ) ); ?>" target="_blank" rel="noopener"><?php echo hhd_icon( 'pin', 20 ); ?><span>Directions</span></a>
	<a class="is-primary" href="<?php echo esc_url( hhd_whatsapp_url() ); ?>" target="_blank" rel="noopener"><?php echo hhd_icon( 'chat', 20 ); ?><span>WhatsApp</span></a>
</div>

<?php wp_footer(); ?>
</body>
</html>
