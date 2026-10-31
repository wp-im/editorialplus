<?php
/**
 * Template Name: Long Editorial Home
 * Template Post Type: page
 *
 * A long, text-led front page exploring ways to edit groups of articles.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<div class="home-showcase">
	<?php get_template_part( 'template-parts/home-organization-sections' ); ?>
</div>
<?php get_footer(); ?>
