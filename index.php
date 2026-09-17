<?php
/**
 * Fallback blog/index.
 *
 * @package HealingHarmony
 */
get_header(); ?>
<section class="page-lead">
	<div class="wrap">
		<span class="eyebrow"><?php echo is_home() ? 'Journal' : 'Archive'; ?></span>
		<h1 class="section-title"><?php echo esc_html( wp_get_document_title() ); ?></h1>
	</div>
</section>
<div class="wrap post-list">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article class="post-card" data-reveal>
			<?php if ( has_post_thumbnail() ) : ?>
				<a class="post-card__img" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'hhd-card' ); ?></a>
			<?php endif; ?>
			<div class="post-card__body">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-card__meta"><?php echo esc_html( get_the_date() ); ?></p>
				<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 26 ) ); ?></p>
				<a class="link-arrow" href="<?php the_permalink(); ?>">Read more <?php echo hhd_icon( 'arrow', 15 ); ?></a>
			</div>
		</article>
	<?php endwhile; the_posts_pagination(); else : ?>
		<p>No posts yet.</p>
	<?php endif; ?>
</div>
<?php get_footer();
