<?php
/**
 * Tiny Editorial Text Only functions and definitions.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'TINY_EDITORIAL_VERSION' ) ) {
	define( 'TINY_EDITORIAL_VERSION', '1.4.0' );
}

if ( ! defined( 'TINY_EDITORIAL_DIR' ) ) {
	define( 'TINY_EDITORIAL_DIR', get_template_directory() );
}

if ( ! defined( 'TINY_EDITORIAL_URI' ) ) {
	define( 'TINY_EDITORIAL_URI', get_template_directory_uri() );
}

require_once TINY_EDITORIAL_DIR . '/inc/setup.php';
require_once TINY_EDITORIAL_DIR . '/inc/enqueue.php';
require_once TINY_EDITORIAL_DIR . '/inc/template-tags.php';
require_once TINY_EDITORIAL_DIR . '/inc/template-functions.php';
require_once TINY_EDITORIAL_DIR . '/inc/snippets.php';
require_once TINY_EDITORIAL_DIR . '/inc/customizer.php';
