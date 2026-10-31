<?php
/**
 * Search results template.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="search-header">
	<div class="container">
		<?php tiny_editorial_breadcrumbs(); ?>
		<h1 class="search-title">
			<?php
			printf(
				/* translators: %s: search query. */
				esc_html__( 'Search results for: %s', 'editorialplus' ),
				'<span>' . esc_html( get_search_query() ) . '</span>'
			);
			?>
		</h1>
	</div>
</section>
<div class="container site-content-grid <?php echo tiny_editorial_has_sidebar() ? '' : 'no-sidebar'; ?>">
	<div class="content-area">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'search' );
endwhile;
			?>
			<?php tiny_editorial_the_posts_navigation(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
