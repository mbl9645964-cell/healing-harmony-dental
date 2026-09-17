<?php
/**
 * Hero with fading background slideshow.
 *
 * @package HealingHarmony
 */

$slides = array(
	hhd_slide_url( 1, 'treatment-room.jpg' ),
	hhd_slide_url( 2, 'waiting-lounge.jpg' ),
	hhd_slide_url( 3, 'chair-detail.jpg' ),
	hhd_slide_url( 4, 'reception.jpg' ),
);
?>
<section class="hero" id="top">
	<div class="hero__slides" data-slideshow>
		<?php foreach ( $slides as $i => $src ) : ?>
			<div class="hero__slide<?php echo 0 === $i ? ' is-active' : ''; ?>" style="background-image:url('<?php echo esc_url( $src ); ?>')"></div>
		<?php endforeach; ?>
		<div class="hero__scrim"></div>
	</div>

	<div class="wrap hero__inner">
		<div class="hero__copy" data-reveal>
			<span class="eyebrow eyebrow--light"><?php echo esc_html( hhd_opt( 'hhd_hero_kicker' ) ); ?></span>
			<h1 class="hero__title"><?php echo wp_kses_post( hhd_opt( 'hhd_hero_title' ) ); ?></h1>
			<p class="hero__text"><?php echo wp_kses_post( hhd_opt( 'hhd_hero_text' ) ); ?></p>

			<div class="hero__actions">
				<a class="btn btn--solid btn--lg" href="<?php echo esc_url( hhd_whatsapp_url() ); ?>" target="_blank" rel="noopener"><?php echo esc_html( hhd_opt( 'hhd_hero_cta' ) ); ?> <?php echo hhd_icon( 'arrow', 18 ); ?></a>
				<a class="btn btn--line btn--lg" href="#services">Explore treatments</a>
			</div>

			<ul class="hero__meta">
				<li><?php echo hhd_icon( 'star', 18 ); ?> <strong><?php echo esc_html( hhd_opt( 'hhd_rating' ) ); ?></strong> Google rating</li>
				<li><?php echo hhd_icon( 'clock', 18 ); ?> Same-week appointments</li>
				<li><?php echo hhd_icon( 'shield', 18 ); ?> Sterile, single-use protocols</li>
			</ul>
		</div>
	</div>

	<div class="hero__dots" data-slideshow-dots aria-hidden="true"></div>
</section>
