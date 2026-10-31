<?php
/**
 * Template tags.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Prints HTML with meta information for the current post date.
 */
function tiny_editorial_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	printf(
		'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
		esc_url( get_permalink() ),
		wp_kses_post( $time_string )
	);
}

/**
 * Prints author information.
 */
function tiny_editorial_posted_by() {
	printf(
		'<span class="byline">%1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
		esc_html__( 'By', 'editorialplus' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Prints reading time.
 */
function tiny_editorial_reading_time() {
	static $reading_times = array();

	$post_id = get_the_ID();
	if ( isset( $reading_times[ $post_id ] ) ) {
		$minutes = $reading_times[ $post_id ];
	} else {
		$content = wp_strip_all_tags( get_post_field( 'post_content', $post_id ) );
		$words   = str_word_count( $content );

		if ( $words < 10 && preg_match_all( '/[\p{Han}\p{Hiragana}\p{Katakana}\p{Hangul}]/u', $content, $matches ) ) {
			$characters = count( $matches[0] );
			$minutes    = max( 1, (int) ceil( $characters / 500 ) );
		} else {
			$minutes = max( 1, (int) ceil( $words / 220 ) );
		}

		$reading_times[ $post_id ] = $minutes;
	}

	printf(
		/* translators: %d: estimated reading minutes. */
		'<span class="reading-time">' . esc_html__( '%d min read', 'editorialplus' ) . '</span>',
		absint( $minutes )
	);
}

/**
 * Prints categories, tags, comments, and edit link.
 */
function tiny_editorial_entry_footer() {
	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( esc_html__( ', ', 'editorialplus' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">%1$s %2$s</span>', esc_html__( 'Filed under', 'editorialplus' ), wp_kses_post( $categories_list ) );
		}

		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'editorialplus' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%1$s %2$s</span>', esc_html__( 'Tagged', 'editorialplus' ), wp_kses_post( $tags_list ) );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			esc_html__( 'Leave a comment', 'editorialplus' ),
			esc_html__( '1 Comment', 'editorialplus' ),
			esc_html__( '% Comments', 'editorialplus' )
		);
		echo '</span>';
	}

	edit_post_link(
		esc_html__( 'Edit', 'editorialplus' ),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Prints posts pagination.
 */
function tiny_editorial_the_posts_navigation() {
	the_posts_pagination(
		array(
			'mid_size'  => 2,
			'prev_text' => esc_html__( 'Previous', 'editorialplus' ),
			'next_text' => esc_html__( 'Next', 'editorialplus' ),
		)
	);
}
