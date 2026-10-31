<?php
/**
 * The footer for the theme.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
</main>
<footer class="site-footer" id="site-footer">
	<div class="footer-main">
		<div class="container">
			<div class="footer-grid">
				<div class="footer-col footer-col--brand">
					<h2 class="footer-brand-name"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h2>
					<?php $footer_about = tiny_editorial_get_option( 'tiny_editorial_footer_about', __( 'A quiet editorial theme for publications, schools, studios, and long-form websites.', 'editorialplus' ) ); ?>
					<?php if ( $footer_about ) : ?>
						<p class="footer-brand-desc"><?php echo esc_html( $footer_about ); ?></p>
					<?php endif; ?>
					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<hr class="footer-divider" />
						<div class="footer-label"><?php esc_html_e( 'Social', 'editorialplus' ); ?></div>
						<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social links', 'editorialplus' ); ?>">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'social',
									'container'      => false,
									'depth'          => 1,
								)
							);
							?>
						</nav>
					<?php endif; ?>
				</div>

				<div class="footer-col">
					<div class="footer-col-title"><?php esc_html_e( 'Explore', 'editorialplus' ); ?></div>
					<hr class="footer-col-divider" />
					<nav class="footer-links" aria-label="<?php esc_attr_e( 'Footer menu', 'editorialplus' ); ?>">
						<?php
						if ( has_nav_menu( 'footer' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'footer',
									'container'      => false,
									'depth'          => 1,
								)
							);
						} else {
							wp_page_menu(
								array(
									'depth'     => 1,
									'show_home' => true,
								)
							);
						}
						?>
					</nav>
				</div>

				<div class="footer-col">
					<div class="footer-col-title"><?php esc_html_e( 'Contact', 'editorialplus' ); ?></div>
					<hr class="footer-col-divider" />
					<div class="footer-contact-list">
						<?php if ( tiny_editorial_get_option( 'tiny_editorial_footer_address' ) ) : ?>
							<p class="footer-address"><?php echo nl2br( esc_html( tiny_editorial_get_option( 'tiny_editorial_footer_address' ) ) ); ?></p>
						<?php endif; ?>
						<?php if ( tiny_editorial_get_option( 'tiny_editorial_footer_phone' ) ) : ?>
							<a class="footer-contact-link" href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', tiny_editorial_get_option( 'tiny_editorial_footer_phone' ) ) ); ?>"><?php echo esc_html( tiny_editorial_get_option( 'tiny_editorial_footer_phone' ) ); ?></a>
						<?php endif; ?>
						<?php $footer_email = sanitize_email( tiny_editorial_get_option( 'tiny_editorial_footer_email' ) ); ?>
						<?php if ( $footer_email ) : ?>
							<a class="footer-contact-link" href="mailto:<?php echo esc_attr( $footer_email ); ?>"><?php echo esc_html( antispambot( $footer_email ) ); ?></a>
						<?php endif; ?>
						<?php if ( tiny_editorial_get_option( 'tiny_editorial_footer_hours' ) ) : ?>
							<p class="footer-address"><?php echo nl2br( esc_html( tiny_editorial_get_option( 'tiny_editorial_footer_hours' ) ) ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widget-area" aria-label="<?php esc_attr_e( 'Footer widgets', 'editorialplus' ); ?>">
					<div class="footer-widget-grid">
						<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
							<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
								<div class="footer-widget-column">
									<?php dynamic_sidebar( 'footer-' . $i ); ?>
								</div>
							<?php endif; ?>
						<?php endfor; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<div class="footer-bottom-inner">
				<?php
				$copyright = tiny_editorial_get_option( 'tiny_editorial_footer_copyright' );
				if ( ! $copyright ) {
					$copyright = sprintf(
						/* translators: %s: site name. */
						__( '© %1$s %2$s', 'editorialplus' ),
						date_i18n( 'Y' ),
						get_bloginfo( 'name' )
					);
				}
				?>
				<span class="footer-copyright"><?php echo esc_html( $copyright ); ?></span>
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-nav" aria-label="<?php esc_attr_e( 'Footer navigation', 'editorialplus' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'container'      => false,
								'depth'          => 1,
							)
						);
						?>
					</nav>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer>

<?php if ( get_theme_mod( 'tiny_editorial_show_scroll_top', true ) ) : ?>
		<button type="button" class="scroll-top" id="scrollTop" aria-label="<?php esc_attr_e( 'Scroll to top', 'editorialplus' ); ?>">
		<span aria-hidden="true">↑</span>
	</button>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
