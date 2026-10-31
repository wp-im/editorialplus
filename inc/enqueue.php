<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Load theme styles and scripts.
 */
function tiny_editorial_scripts() {
	wp_enqueue_style(
		'tiny-editorial-style',
		get_template_directory_uri() . '/style.css',
		array(),
		TINY_EDITORIAL_VERSION
	);

	if ( is_child_theme() ) {
		wp_enqueue_style(
			'tiny-editorial-child-style',
			get_stylesheet_uri(),
			array( 'tiny-editorial-style' ),
			wp_get_theme()->get( 'Version' )
		);
	}

	wp_enqueue_script( 'tiny-editorial-navigation', TINY_EDITORIAL_URI . '/assets/js/navigation.js', array(), TINY_EDITORIAL_VERSION, true );
	wp_localize_script(
		'tiny-editorial-navigation',
		'tinyEditorialNav',
		array(
			'open'         => esc_html__( 'Open menu', 'editorialplus' ),
			'close'        => esc_html__( 'Close menu', 'editorialplus' ),
			'smoothScroll' => (bool) get_theme_mod( 'tiny_editorial_smooth_scroll', true ),
			'copy'         => esc_html__( 'Copy HTML', 'editorialplus' ),
			'copied'       => esc_html__( 'Copied', 'editorialplus' ),
			'copyFailed'   => esc_html__( 'Select and copy manually', 'editorialplus' ),
		)
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tiny_editorial_scripts' );
