<?php
/**
 * The header for the theme.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?><!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'editorialplus' ); ?></a>
<header class="site-header" id="site-header">
	<div class="container">
		<div class="header-inner">
			<div class="site-logo">
				<span class="logo-leaf" aria-hidden="true">✳</span>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-text" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
			</div>

			<nav id="primary-nav" class="primary-menu" aria-label="<?php esc_attr_e( 'Primary Menu', 'editorialplus' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu-list',
						'container'      => false,
						'fallback_cb'    => 'tiny_editorial_fallback_menu',
					)
				);
				?>
			</nav>

			<?php
			$cta_label = get_theme_mod( 'tiny_editorial_show_header_cta', false ) ? tiny_editorial_get_option( 'tiny_editorial_header_cta_label', __( 'Subscribe', 'editorialplus' ) ) : '';
			$cta_url   = tiny_editorial_get_option( 'tiny_editorial_header_cta_url', '' );
			?>

			<div class="header-cta-wrap <?php echo empty( $cta_label ) || empty( $cta_url ) ? 'is-empty' : ''; ?>">
				<?php if ( $cta_label && $cta_url ) : ?>
					<a href="<?php echo esc_url( $cta_url ); ?>" class="header-cta"><?php echo esc_html( $cta_label ); ?></a>
				<?php endif; ?>
			</div>

				<button type="button" class="mobile-toggle" id="mobile-toggle" aria-label="<?php esc_attr_e( 'Open menu', 'editorialplus' ); ?>" aria-expanded="false" aria-controls="primary-nav">
					<span class="mobile-toggle__open" aria-hidden="true">☰</span><span class="mobile-toggle__close" aria-hidden="true">×</span>
				</button>
		</div>
	</div>
</header>
<main id="primary" class="site-main">
