<?php
/**
 * Template Name: Editorial Canvas
 * Template Post Type: page
 *
 * A clean page canvas for HTML snippets copied from the Elements page.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="editorial-canvas">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'has-editorial-canvas' ); ?>>
			<div class="entry-content editorial-canvas-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
