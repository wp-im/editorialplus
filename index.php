<?php
/**
 * Main template file.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="archive-header">
	<div class="container">
		<?php tiny_editorial_breadcrumbs(); ?>
		<h1 class="archive-title"><?php echo esc_html( single_post_title( '', false ) ? single_post_title( '', false ) : __( 'Journal', 'editorialplus' ) ); ?></h1>
	</div>
</section>
<div class="container site-content-grid <?php echo tiny_editorial_has_sidebar() ? '' : 'no-sidebar'; ?>">
	<div class="content-area">
		<?php if ( have_posts() ) : ?>
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
				endwhile;

				tiny_editorial_the_posts_navigation();
				?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
