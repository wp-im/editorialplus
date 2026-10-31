<?php
/**
 * Template part for search results.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card entry-card' ); ?>>
	<header class="entry-header">
		<h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h2>
		<div class="entry-meta">
		<?php
		$post_type_obj = get_post_type_object( get_post_type() );
		echo esc_html( $post_type_obj ? $post_type_obj->labels->singular_name : get_post_type() );
		?>
		/ <?php echo esc_html( get_the_date() ); ?></div>
	</header>
	<div class="entry-summary"><?php the_excerpt(); ?></div>
</article>
