<?php
/**
 * Page template.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="container site-content-grid <?php echo tiny_editorial_has_sidebar() ? '' : 'no-sidebar'; ?>">
	<div class="content-area">
		<?php tiny_editorial_breadcrumbs(); ?>
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php
			if ( comments_open() || get_comments_number() ) :
				comments_template();
endif;
			?>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
