<?php
/**
 * Template Name: Home Stream
 * Template Post Type: page
 *
 * Vertical stream layout with a typographic-first feed, strong section
 * dividers, numbered lead stories, and a wide reading-list rundown.
 * Assign this template to any page, then set that page as the "Static
 * Front Page" in Settings > Reading.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/home-stream-sections' );
tiny_editorial_render_widget_area( 'home-before-footer', 'home-widget-area home-widget-area--before-footer' );
get_footer();
