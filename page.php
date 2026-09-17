<?php
/**
 * Default page.
 *
 * @package HealingHarmony
 */
get_header();
while ( have_posts() ) : the_post(); ?>
<section class="page-lead">
	<div class="wrap">
		<h1 class="section-title"><?php the_title(); ?></h1>
	</div>
</section>
<article class="wrap page-body" data-reveal>
	<?php the_content(); ?>
</article>
<?php endwhile; get_footer();
