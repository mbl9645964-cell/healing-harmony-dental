<?php
/**
 * Single service.
 *
 * @package HealingHarmony
 */
get_header();
while ( have_posts() ) : the_post();
	$price = get_post_meta( get_the_ID(), 'hhd_price', true );
	$dur   = get_post_meta( get_the_ID(), 'hhd_duration', true ); ?>
<section class="page-lead">
	<div class="wrap">
		<span class="eyebrow">Treatment</span>
		<h1 class="section-title"><?php the_title(); ?></h1>
		<?php if ( $price || $dur ) : ?>
		<p class="page-lead__meta">
			<?php if ( $price ) : ?>From ₹<?php echo esc_html( $price ); ?><?php endif; ?>
			<?php if ( $price && $dur ) : ?> · <?php endif; ?>
			<?php if ( $dur ) : ?><?php echo esc_html( $dur ); ?><?php endif; ?>
		</p>
		<?php endif; ?>
	</div>
</section>
<article class="wrap page-body" data-reveal>
	<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'hhd-wide' ); ?>
	<?php the_content(); ?>
	<p><a class="btn btn--solid btn--lg" href="<?php echo esc_url( hhd_whatsapp_url( 'Hi, I would like to book: ' . get_the_title() ) ); ?>" target="_blank" rel="noopener">Book this treatment <?php echo hhd_icon( 'arrow', 16 ); ?></a></p>
</article>
<?php endwhile; get_footer();
