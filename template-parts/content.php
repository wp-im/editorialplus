<?php
/**
 * Template part for posts in lists.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h2>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta"><?php tiny_editorial_posted_on(); ?> <?php tiny_editorial_posted_by(); ?></div>
		<?php endif; ?>
	</header>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
	<footer class="entry-footer"><?php tiny_editorial_entry_footer(); ?></footer>
</article>
