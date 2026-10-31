<?php
/**
 * Template Name: Home Editorial
 * Template Post Type: page
 *
 * Magazine-style text homepage.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/home-editorial-sections' );
tiny_editorial_render_widget_area( 'home-before-footer', 'home-widget-area home-widget-area--before-footer' );
get_footer();
