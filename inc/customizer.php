<?php
/**
 * Customizer settings.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Customizer options.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function tiny_editorial_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'tiny_editorial_theme_options',
		array(
			'title'       => esc_html__( 'Editorial Plus Options', 'editorialplus' ),
			'priority'    => 160,
			'description' => esc_html__( 'Simple options for the header, footer, and text-first reading layout.', 'editorialplus' ),
		)
	);

	$settings = array(
		'tiny_editorial_header_cta_label'                 => array(
			'label'    => __( 'Header CTA label', 'editorialplus' ),
			'default'  => __( 'Subscribe', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_header_cta_url'                   => array(
			'label'    => __( 'Header CTA URL', 'editorialplus' ),
			'default'  => '',
			'type'     => 'url',
			'sanitize' => 'esc_url_raw',
		),
		'tiny_editorial_footer_about'                     => array(
			'label'    => __( 'Footer description', 'editorialplus' ),
			'default'  => __( 'A quiet editorial theme for publications, schools, studios, and long-form websites.', 'editorialplus' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'tiny_editorial_footer_address'                   => array(
			'label'    => __( 'Footer address', 'editorialplus' ),
			'default'  => '',
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'tiny_editorial_footer_phone'                     => array(
			'label'    => __( 'Footer phone', 'editorialplus' ),
			'default'  => '',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_footer_email'                     => array(
			'label'    => __( 'Footer email', 'editorialplus' ),
			'default'  => '',
			'type'     => 'email',
			'sanitize' => 'sanitize_email',
		),
		'tiny_editorial_footer_hours'                     => array(
			'label'    => __( 'Footer hours', 'editorialplus' ),
			'default'  => '',
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'tiny_editorial_footer_copyright'                 => array(
			'label'    => __( 'Footer copyright text', 'editorialplus' ),
			'default'  => '',
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_related_count'                    => array(
			'label'    => __( 'Related posts count', 'editorialplus' ),
			'default'  => '3',
			'type'     => 'number',
			'sanitize' => 'absint',
		),
		'tiny_editorial_home_editorial_latest_title'      => array(
			'label'    => __( 'Home Editorial: latest stories title', 'editorialplus' ),
			'default'  => __( 'Latest Stories', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_essay_label'       => array(
			'label'    => __( 'Home Editorial: essays label', 'editorialplus' ),
			'default'  => __( 'Category', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_essay_title'       => array(
			'label'    => __( 'Home Editorial: essays title', 'editorialplus' ),
			'default'  => __( 'Essays & Literature', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_review_label'      => array(
			'label'    => __( 'Home Editorial: reviews label', 'editorialplus' ),
			'default'  => __( 'Category', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_review_title'      => array(
			'label'    => __( 'Home Editorial: reviews title', 'editorialplus' ),
			'default'  => __( 'Critical Reviews', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_issue_kicker'      => array(
			'label'    => __( 'Home Editorial: issue kicker', 'editorialplus' ),
			'default'  => __( 'Current Issue', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_issue_title'       => array(
			'label'    => __( 'Home Editorial: issue title', 'editorialplus' ),
			'default'  => __( 'Table of Contents', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_editorial_issue_description' => array(
			'label'    => __( 'Home Editorial: issue description', 'editorialplus' ),
			'default'  => __( 'A selection of featured articles curated for this issue.', 'editorialplus' ),
			'type'     => 'textarea',
			'sanitize' => 'sanitize_textarea_field',
		),
		'tiny_editorial_home_stream_marquee_label'        => array(
			'label'    => __( 'Home Stream: marquee label', 'editorialplus' ),
			'default'  => __( 'Editor\'s Pick', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_stream_leads_title'          => array(
			'label'    => __( 'Home Stream: leads title', 'editorialplus' ),
			'default'  => __( 'Top Stories', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_stream_more_title'           => array(
			'label'    => __( 'Home Stream: more reading title', 'editorialplus' ),
			'default'  => __( 'More to Read', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_grid_label'           => array(
			'label'    => __( 'Home Mosaic: grid label', 'editorialplus' ),
			'default'  => __( 'Latest', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_grid_title'           => array(
			'label'    => __( 'Home Mosaic: grid title', 'editorialplus' ),
			'default'  => __( 'Recent Stories', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_spotlight_label'      => array(
			'label'    => __( 'Home Mosaic: spotlight label', 'editorialplus' ),
			'default'  => __( 'In Depth', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_spotlight_title'      => array(
			'label'    => __( 'Home Mosaic: spotlight title', 'editorialplus' ),
			'default'  => __( 'Essays & Analysis', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_archive_label'        => array(
			'label'    => __( 'Home Mosaic: archive label', 'editorialplus' ),
			'default'  => __( 'More Reading', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
		'tiny_editorial_home_mosaic_archive_title'        => array(
			'label'    => __( 'Home Mosaic: archive title', 'editorialplus' ),
			'default'  => __( 'From the Archive', 'editorialplus' ),
			'type'     => 'text',
			'sanitize' => 'sanitize_text_field',
		),
	);

	foreach ( $settings as $id => $args ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $args['default'],
				'sanitize_callback' => $args['sanitize'],
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'       => $args['label'],
				'section'     => 'tiny_editorial_theme_options',
				'type'        => $args['type'],
				'input_attrs' => 'tiny_editorial_related_count' === $id ? array(
					'min' => 1,
					'max' => 6,
				) : array(),
			)
		);
	}

	$home_category_controls = array(
		'tiny_editorial_home_essay_category'  => __( 'Editorial home: Essays category', 'editorialplus' ),
		'tiny_editorial_home_review_category' => __( 'Editorial home: Reviews category', 'editorialplus' ),
	);

	foreach ( $home_category_controls as $id => $label ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => 0,
				'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'       => $label,
				'section'     => 'tiny_editorial_theme_options',
				'type'        => 'dropdown-categories',
				'description' => esc_html__( 'Leave unselected to show a configuration note instead of mixing unrelated latest posts.', 'editorialplus' ),
			)
		);
	}

	$checkboxes = array(
		'tiny_editorial_show_header_cta'    => array( __( 'Show header CTA', 'editorialplus' ), false ),
		'tiny_editorial_show_breadcrumbs'   => array( __( 'Show breadcrumbs', 'editorialplus' ), true ),
		'tiny_editorial_show_related_posts' => array( __( 'Show related posts on single posts', 'editorialplus' ), true ),
		'tiny_editorial_show_author_box'    => array( __( 'Show author box on single posts', 'editorialplus' ), true ),
		'tiny_editorial_show_scroll_top'    => array( __( 'Show scroll-to-top button', 'editorialplus' ), true ),
		'tiny_editorial_smooth_scroll'      => array( __( 'Enable smooth scroll-to-top behavior', 'editorialplus' ), true ),
	);

	foreach ( $checkboxes as $id => $data ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => (bool) $data[1],
				'sanitize_callback' => 'tiny_editorial_sanitize_checkbox',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $data[0],
				'section' => 'tiny_editorial_theme_options',
				'type'    => 'checkbox',
			)
		);
	}
}
add_action( 'customize_register', 'tiny_editorial_customize_register' );

/**
 * Sanitize checkboxes.
 *
 * @param mixed $checked Checkbox value.
 * @return bool
 */
function tiny_editorial_sanitize_checkbox( $checked ) {
	return isset( $checked ) && true === wp_validate_boolean( $checked );
}
