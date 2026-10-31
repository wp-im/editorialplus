<?php
/**
 * Template part for pages.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">
		<h1 class="entry-title"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></h1>
	</header>
	<div class="entry-content">
		<?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'editorialplus' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer"><?php edit_post_link( esc_html__( 'Edit', 'editorialplus' ), '<span class="edit-link">', '</span>' ); ?></footer>
	<?php endif; ?>
</article>
