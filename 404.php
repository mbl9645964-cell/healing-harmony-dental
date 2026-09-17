<?php
/**
 * 404.
 *
 * @package HealingHarmony
 */
get_header(); ?>
<section class="page-lead page-lead--tall">
	<div class="wrap" style="text-align:center">
		<span class="eyebrow eyebrow--center">404</span>
		<h1 class="section-title">This page took a different route.</h1>
		<p class="section-intro" style="margin-inline:auto">The link may be old — but our door is always open.</p>
		<p><a class="btn btn--solid btn--lg" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a></p>
	</div>
</section>
<?php get_footer();
