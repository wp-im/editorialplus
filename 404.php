<?php
/**
 * 404 template.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>
<section class="error-404 not-found">
	<div class="container">
		<?php tiny_editorial_breadcrumbs(); ?>
		<h1 class="page-title"><?php esc_html_e( 'This page could not be found.', 'editorialplus' ); ?></h1>
		<p class="page-description"><?php esc_html_e( 'It may have moved, or the address may be incorrect. Search the site or return to the home page.', 'editorialplus' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
<?php get_footer(); ?>
