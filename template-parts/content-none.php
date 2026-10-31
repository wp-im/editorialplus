<?php
/**
 * Template part for no content.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<section class="no-results not-found">
	<header class="page-header"><h1 class="page-title"><?php esc_html_e( 'Nothing found', 'editorialplus' ); ?></h1></header>
	<div class="page-content">
		<p><?php esc_html_e( 'Try a search or browse the latest posts.', 'editorialplus' ); ?></p>
		<?php get_search_form(); ?>
	</div>
</section>
