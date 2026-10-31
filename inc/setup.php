<?php
/**
 * Theme setup.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register theme supports, menus, and editor assets.
 */
function tiny_editorial_setup() {
	load_theme_textdomain( 'editorialplus', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'editor-color-palette',
		array(
			array(
				'name'  => esc_html__( 'Ink', 'editorialplus' ),
				'slug'  => 'ink',
				'color' => '#1c1c1e',
			),
			array(
				'name'  => esc_html__( 'Paper', 'editorialplus' ),
				'slug'  => 'paper',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Mid Grey', 'editorialplus' ),
				'slug'  => 'mid-grey',
				'color' => '#696969',
			),
		)
	);

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary Menu', 'editorialplus' ),
			'footer' => esc_html__( 'Footer Menu', 'editorialplus' ),
			'social' => esc_html__( 'Social Links Menu', 'editorialplus' ),
		)
	);
}
add_action( 'after_setup_theme', 'tiny_editorial_setup' );

/**
 * Set content width.
 */
function tiny_editorial_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tiny_editorial_content_width', 700 );
}
add_action( 'after_setup_theme', 'tiny_editorial_content_width', 0 );

/**
 * Register widget areas.
 */
function tiny_editorial_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'editorialplus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Widgets shown beside archive, search, and standard pages.', 'editorialplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array(
				/* translators: %d: footer widget area number. */
				'name'          => sprintf( esc_html__( 'Footer Column %d', 'editorialplus' ), $i ),
				'id'            => 'footer-' . $i,
				'description'   => esc_html__( 'Footer widget column.', 'editorialplus' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	register_sidebar(
		array(
			'name'          => esc_html__( 'Home After Hero', 'editorialplus' ),
			'id'            => 'home-after-hero',
			'description'   => esc_html__( 'Optional homepage widget area shown after the primary hero section.', 'editorialplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Home Before Footer', 'editorialplus' ),
			'id'            => 'home-before-footer',
			'description'   => esc_html__( 'Optional homepage widget area shown before the footer.', 'editorialplus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tiny_editorial_widgets_init' );
