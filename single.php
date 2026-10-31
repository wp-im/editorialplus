<?php
/**
 * Single post template.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="container">
	<?php tiny_editorial_breadcrumbs(); ?>
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<?php get_template_part( 'template-parts/content', 'single' ); ?>
		<?php tiny_editorial_author_box(); ?>
		<?php
		the_post_navigation(
			array(
				'in_same_term' => true,
				'prev_text'    => '<span class="nav-subtitle">' . esc_html__( 'Previous', 'editorialplus' ) . '</span><span class="nav-title">%title</span>',
				'next_text'    => '<span class="nav-subtitle">' . esc_html__( 'Next', 'editorialplus' ) . '</span><span class="nav-title">%title</span>',
			)
		);
		?>
		<?php tiny_editorial_related_posts(); ?>
		<?php
		if ( comments_open() || get_comments_number() ) :
			comments_template();
endif;
		?>
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>
