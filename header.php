<?php
/**
 * Header.
 *
 * @package HealingHarmony
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'healing-harmony' ); ?></a>

<div class="announce">
	<div class="wrap announce__row">
		<span><?php echo hhd_icon( 'star', 15 ); ?> <strong><?php echo esc_html( hhd_opt( 'hhd_rating' ) ); ?></strong> on Google · <?php echo esc_html( hhd_opt( 'hhd_reviews' ) ); ?> reviews</span>
		<span class="announce__loc"><?php echo hhd_icon( 'pin', 15 ); ?> Greater Kailash II, New Delhi · Open till 8 pm</span>
	</div>
</div>

<header class="site-head" data-header>
	<div class="wrap site-head__row">
		<div class="brand">
			<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
				<a class="brand__word" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<span class="brand__mark"><?php echo hhd_icon( 'leaf', 22 ); ?></span>
					<span class="brand__name">Healing&nbsp;Harmony<small>Dental Clinic</small></span>
				</a>
			<?php endif; ?>
		</div>

		<nav class="site-nav" aria-label="Primary">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav-list',
				'fallback_cb'    => 'hhd_nav_fallback',
				'depth'          => 2,
			) );
			?>
		</nav>

		<div class="site-head__cta">
			<a class="btn btn--ghost" href="tel:<?php echo esc_attr( hhd_tel() ); ?>"><?php echo hhd_icon( 'phone', 17 ); ?> Call</a>
			<a class="btn btn--solid" href="<?php echo esc_url( hhd_whatsapp_url() ); ?>" target="_blank" rel="noopener">Book Now</a>
		</div>

		<button class="nav-toggle" aria-label="Menu" aria-expanded="false" data-nav-toggle>
			<span></span><span></span><span></span>
		</button>
	</div>
</header>

<?php
/**
 * Minimal nav fallback when no menu is assigned.
 */
function hhd_nav_fallback() {
	echo '<ul class="nav-list">';
	echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';
	echo '<li><a href="#services">Treatments</a></li>';
	echo '<li><a href="#team">Team</a></li>';
	echo '<li><a href="#reviews">Reviews</a></li>';
	echo '<li><a href="#visit">Visit</a></li>';
	echo '</ul>';
}
?>

<main id="main" class="site-main">
