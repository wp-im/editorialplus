<?php
/**
 * Template part for single posts.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header single-entry-header">
		<?php if ( has_category() ) : ?>
			<div class="entry-kicker"><?php echo wp_kses_post( tiny_editorial_get_category_links() ); ?></div>
		<?php endif; ?>
		<h1 class="entry-title"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></h1>
		<?php if ( has_excerpt() ) : ?>
			<div class="entry-dek"><?php echo esc_html( get_the_excerpt() ); ?></div>
		<?php endif; ?>
		<div class="entry-meta">
			<div class="meta-left">
				<?php tiny_editorial_posted_on(); ?> <?php tiny_editorial_posted_by(); ?> <?php tiny_editorial_reading_time(); ?>
			</div>
		</div>
	</header>
	<div class="single-article-body-wrapper">
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers. */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'editorialplus' ),
						array( 'span' => array( 'class' => array() ) )
					),
					esc_html( tiny_editorial_get_display_title() )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'editorialplus' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div>
	<footer class="entry-footer"><?php tiny_editorial_entry_footer(); ?></footer>
</article>
