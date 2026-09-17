<?php
/**
 * Front page — composed of section parts.
 *
 * @package HealingHarmony
 */

get_header();

get_template_part( 'template-parts/hero/hero' );
get_template_part( 'template-parts/intro/intro' );
get_template_part( 'template-parts/services/services' );
get_template_part( 'template-parts/why/why' );
get_template_part( 'template-parts/doctors/doctors' );
get_template_part( 'template-parts/gallery/gallery' );
get_template_part( 'template-parts/reviews/reviews' );
get_template_part( 'template-parts/cta/cta' );

get_footer();
