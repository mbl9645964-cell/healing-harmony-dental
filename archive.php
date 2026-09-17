<?php
/**
 * Generic archive (services/doctors).
 *
 * @package HealingHarmony
 */
get_header(); ?>
<section class="page-lead">
	<div class="wrap">
		<h1 class="section-title"><?php post_type_archive_title(); the_archive_title(); ?></h1>
	</div>
</section>
<div class="wrap cards">
	<?php while ( have_posts() ) : the_post(); ?>
		<article class="card" data-reveal>
			<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="card__text"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22 ) ); ?></p>
			<a class="card__link" href="<?php the_permalink(); ?>">View <?php echo hhd_icon( 'arrow', 15 ); ?></a>
		</article>
	<?php endwhile; ?>
</div>
<?php get_footer();
