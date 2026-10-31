<?php
/**
 * Template Name: Editorial About Page
 * Template Post Type: page
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="editorial-canvas editorial-about-template">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<section class="editorial-section editorial-section--dark">
			<div class="editorial-section__inner">
				<?php tiny_editorial_breadcrumbs(); ?>
				<h1 class="editorial-title"><?php the_title(); ?></h1>
				<?php if ( has_excerpt() ) : ?>
					<p class="editorial-subtitle"><?php echo esc_html( get_the_excerpt() ); ?></p>
				<?php endif; ?>
			</div>
		</section>

		<section class="editorial-section">
			<div class="editorial-section__inner">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'has-editorial-canvas' ); ?>>
					<div class="entry-content editorial-canvas-content">
						<?php the_content(); ?>
					</div>
				</article>
			</div>
		</section>
	<?php endwhile; ?>
</div>

<?php
get_footer();
