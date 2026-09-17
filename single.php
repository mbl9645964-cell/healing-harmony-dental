<?php
/**
 * Single post.
 *
 * @package HealingHarmony
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<section class="page-lead">
	<div class="wrap">
		<span class="eyebrow">Journal</span>
		<h1 class="section-title"><?php the_title(); ?></h1>
		<p class="page-lead__meta"><?php echo esc_html( get_the_date() ); ?></p>
	</div>
</section>
<article class="wrap page-body" data-reveal>
	<?php if ( has_post_thumbnail() ) the_post_thumbnail( 'hhd-wide' ); ?>
	<?php the_content(); ?>
</article>
<?php endwhile; get_footer();
