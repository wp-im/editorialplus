<?php
/**
 * Template Name: Home Mosaic
 * Template Post Type: page
 *
 * Three-column text mosaic layout with alternating background bands.
 * Assign this template to any page, then set that page as the "Static Front Page"
 * in Settings > Reading.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
get_template_part( 'template-parts/home-mosaic-sections' );
tiny_editorial_render_widget_area( 'home-before-footer', 'home-widget-area home-widget-area--before-footer' );
get_footer();
