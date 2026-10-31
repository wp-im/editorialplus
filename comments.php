<?php
/**
 * Comments template.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				/* translators: %s: number of comments. */
				esc_html( _nx( '%1$s comment', '%1$s comments', get_comments_number(), 'comments title', 'editorialplus' ) ),
				esc_html( number_format_i18n( get_comments_number() ) )
			);
			?>
		</h2>
		<?php the_comments_navigation(); ?>
		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'      => 'ol',
				'short_ping' => true,
			)
		);
		?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'editorialplus' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
