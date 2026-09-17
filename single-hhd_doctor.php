<?php
/**
 * Single doctor.
 *
 * @package HealingHarmony
 */
get_header();
while ( have_posts() ) : the_post();
	$role  = get_post_meta( get_the_ID(), 'hhd_role', true );
	$quals = get_post_meta( get_the_ID(), 'hhd_quals', true ); ?>
<section class="page-lead">
	<div class="wrap">
		<span class="eyebrow">Our team</span>
		<h1 class="section-title"><?php the_title(); ?></h1>
		<?php if ( $role ) : ?><p class="page-lead__meta"><?php echo esc_html( $role ); ?><?php if ( $quals ) : ?> · <?php echo esc_html( $quals ); ?><?php endif; ?></p><?php endif; ?>
	</div>
</section>
<article class="wrap page-body page-body--doc" data-reveal>
	<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'hhd-portrait' ); ?>
	<?php the_content(); ?>
</article>
<?php endwhile; get_footer();
