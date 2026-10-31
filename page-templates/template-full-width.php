<?php
/**
 * Template Name: Full Width Page
 * Template Post Type: page
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
		get_template_part( 'template-parts/content', 'page' );
	endwhile;
	?>
</div>
<?php get_footer(); ?>
