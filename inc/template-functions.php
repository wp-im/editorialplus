<?php
/**
 * Helper functions.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fallback primary menu.
 */
function tiny_editorial_fallback_menu() {
	$items   = array(
		array( __( 'Home', 'editorialplus' ), home_url( '/' ) ),
	);
	$blog_id = absint( get_option( 'page_for_posts' ) );

	if ( $blog_id ) {
		$items[] = array( get_the_title( $blog_id ), get_permalink( $blog_id ) );
	}

	echo '<ul class="menu">';
	foreach ( $items as $item ) {
		echo '<li><a href="' . esc_url( $item[1] ) . '">' . esc_html( $item[0] ) . '</a></li>';
	}
	echo '</ul>';
}

/**
 * Return blog URL.
 *
 * @return string
 */
function tiny_editorial_blog_url() {
	$blog_id = absint( get_option( 'page_for_posts' ) );
	return $blog_id ? get_permalink( $blog_id ) : home_url( '/' );
}

/**
 * Get text option.
 *
 * @param string $key           Theme mod key.
 * @param string $default_value Default value.
 * @return string
 */
function tiny_editorial_get_option( $key, $default_value = '' ) {
	$value = get_theme_mod( $key, $default_value );
	return is_string( $value ) ? $value : $default_value;
}

/**
 * Get an editable home template label or heading.
 *
 * @param string $key           Theme mod key.
 * @param string $default_value Default value.
 * @return string
 */
function tiny_editorial_get_home_setting( $key, $default_value = '' ) {
	return tiny_editorial_get_option( $key, $default_value );
}

/**
 * Render an optional widget area.
 *
 * @param string $sidebar_id Sidebar ID.
 * @param string $class_name Wrapper class.
 */
function tiny_editorial_render_widget_area( $sidebar_id, $class_name = 'home-widget-area' ) {
	if ( ! is_active_sidebar( $sidebar_id ) ) {
		return;
	}
	?>
	<section class="<?php echo esc_attr( $class_name ); ?>">
		<div class="editorial-section__inner">
			<?php dynamic_sidebar( $sidebar_id ); ?>
		</div>
	</section>
	<?php
}

/**
 * Create a lightweight post query for theme display sections.
 *
 * @param array $args Query arguments.
 * @return WP_Query
 */
function tiny_editorial_get_posts_query( $args = array() ) {
	$query_args = wp_parse_args(
		$args,
		array(
			'post_type'              => 'post',
			'post_status'            => 'publish',
			'ignore_sticky_posts'    => true,
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
		)
	);

	if ( empty( $query_args['post__in'] ) ) {
		unset( $query_args['post__in'] );
	}

	return new WP_Query( $query_args );
}

/**
 * Get a small list of posts while skipping already-used IDs in PHP.
 *
 * This avoids exclusionary query parameters for home page display sections.
 *
 * @param int   $count    Number of posts to return.
 * @param array $used_ids Post IDs already shown.
 * @param array $args     Extra query arguments.
 * @return WP_Post[]
 */
function tiny_editorial_get_home_posts( $count, $used_ids = array(), $args = array() ) {
	$count    = absint( $count );
	$used_ids = array_map( 'absint', (array) $used_ids );
	// The visual showcase deliberately reuses posts so every layout stays populated.
	if ( is_page_template( 'page-templates/home-showcase.php' ) ) {
		$used_ids = array();
	}

	if ( 0 === $count ) {
		return array();
	}

	$query = tiny_editorial_get_posts_query(
		wp_parse_args(
			$args,
			array(
				'posts_per_page' => $count + count( $used_ids ),
			)
		)
	);

	$posts = array();
	foreach ( $query->posts as $post ) {
		if ( in_array( (int) $post->ID, $used_ids, true ) ) {
			continue;
		}

		$posts[] = $post;

		if ( count( $posts ) >= $count ) {
			break;
		}
	}

	return $posts;
}

/**
 * Prepare a post object for template tags inside manual post arrays.
 *
 * The setup_postdata() function does not assign the global $post by itself.
 * This helper keeps homepage and related-post loops from accidentally
 * rendering the current page instead of the queried post.
 *
 * @param WP_Post $post_object Post object to expose to template tags.
 */
function tiny_editorial_setup_loop_post( $post_object ) {
	if ( ! $post_object instanceof WP_Post ) {
		return;
	}

	global $post;
	$post = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
	setup_postdata( $post );
}

/**
 * Get a short plain-text excerpt for home sections.
 *
 * @param int $word_count Number of words.
 * @return string
 */
function tiny_editorial_get_trimmed_excerpt( $word_count = 20 ) {
	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	return wp_trim_words( $excerpt, absint( $word_count ), '...' );
}

/**
 * Get a safe title fallback for display contexts.
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function tiny_editorial_get_display_title( $post_id = null ) {
	$title = get_the_title( $post_id );
	return '' !== $title ? $title : __( '(Untitled)', 'editorialplus' );
}

/**
 * Get escaped category links for the current post.
 *
 * @param string $separator Separator between category links.
 * @return string
 */
function tiny_editorial_get_category_links( $separator = ', ' ) {
	$categories = get_the_category();

	if ( empty( $categories ) ) {
		return '';
	}

	$links = array();
	foreach ( $categories as $category ) {
		$links[] = sprintf(
			'<a href="%1$s" rel="category tag">%2$s</a>',
			esc_url( get_category_link( $category->term_id ) ),
			esc_html( $category->name )
		);
	}

	return implode( esc_html( $separator ), $links );
}

/**
 * Get an escaped author archive link for the current post.
 *
 * @return string
 */
function tiny_editorial_get_author_link() {
	return sprintf(
		'<a href="%1$s">%2$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Render a quiet empty state for dynamic home sections.
 *
 * @param string $message Empty-state message.
 */
function tiny_editorial_home_empty_message( $message ) {
	?>
	<div class="editorial-empty-state">
		<p><?php echo esc_html( $message ); ?></p>
	</div>
	<?php
}

/**
 * Breadcrumbs.
 */
function tiny_editorial_breadcrumbs() {
	if ( ! get_theme_mod( 'tiny_editorial_show_breadcrumbs', true ) || is_front_page() ) {
		return;
	}

	echo '<nav class="breadcrumbs" aria-label="' . esc_attr__( 'Breadcrumbs', 'editorialplus' ) . '">';
	echo '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'editorialplus' ) . '</a>';
	echo '<span class="breadcrumb-separator" aria-hidden="true">/</span>';

	if ( is_home() ) {
		echo '<span aria-current="page">' . esc_html__( 'Blog', 'editorialplus' ) . '</span>';
	} elseif ( is_category() || is_tag() || is_tax() ) {
		the_archive_title( '<span aria-current="page">', '</span>' );
	} elseif ( is_search() ) {
		echo '<span aria-current="page">' . esc_html__( 'Search', 'editorialplus' ) . '</span>';
	} elseif ( is_404() ) {
		echo '<span aria-current="page">' . esc_html__( 'Not Found', 'editorialplus' ) . '</span>';
	} elseif ( is_singular( 'post' ) ) {
		$blog_id = absint( get_option( 'page_for_posts' ) );
		if ( $blog_id ) {
			echo '<a href="' . esc_url( get_permalink( $blog_id ) ) . '">' . esc_html( get_the_title( $blog_id ) ) . '</a><span class="breadcrumb-separator" aria-hidden="true">/</span>';
		}
		$categories = get_the_category();
		if ( ! empty( $categories ) ) {
			$primary_cat = $categories[0];
			echo '<a href="' . esc_url( get_category_link( $primary_cat->term_id ) ) . '">' . esc_html( $primary_cat->name ) . '</a><span class="breadcrumb-separator" aria-hidden="true">/</span>';
		}
		echo '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';
	} elseif ( is_page() ) {
		$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
		foreach ( $ancestors as $ancestor ) {
			echo '<a href="' . esc_url( get_permalink( $ancestor ) ) . '">' . esc_html( get_the_title( $ancestor ) ) . '</a><span class="breadcrumb-separator" aria-hidden="true">/</span>';
		}
		echo '<span aria-current="page">' . esc_html( get_the_title() ) . '</span>';
	} else {
		echo '<span aria-current="page">' . esc_html( wp_get_document_title() ) . '</span>';
	}

	echo '</nav>';
}

/**
 * Related posts.
 *
 * @param int|null $post_id Post ID.
 */
function tiny_editorial_related_posts( $post_id = null ) {
	if ( ! get_theme_mod( 'tiny_editorial_show_related_posts', true ) ) {
		return;
	}

	$post_id = $post_id ? absint( $post_id ) : get_the_ID();
	$count   = min( 6, max( 1, absint( get_theme_mod( 'tiny_editorial_related_count', 3 ) ) ) );
	$args    = array(
		'ignore_sticky_posts'    => true,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
	);

	$categories = wp_get_post_categories( $post_id );
	if ( $categories ) {
		$args['category__in'] = $categories;
	}

	$related_posts = tiny_editorial_get_home_posts( $count, array( $post_id ), $args );
	if ( empty( $related_posts ) ) {
		return;
	}
	?>
	<section class="related-posts" aria-labelledby="related-posts-title">
		<h2 id="related-posts-title" class="related-posts__title"><?php esc_html_e( 'Related reading', 'editorialplus' ); ?></h2>
		<div class="related-posts__grid related-posts__grid--<?php echo esc_attr( $count ); ?>">
			<?php
			foreach ( $related_posts as $related_post ) :
				tiny_editorial_setup_loop_post( $related_post );
				?>
				<article class="related-card">
					<div class="related-card__meta"><?php echo esc_html( get_the_date() ); ?></div>
					<h3 class="related-card__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
				</article>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</section>
	<?php
}

/**
 * Author box.
 */
function tiny_editorial_author_box() {
	if ( ! get_theme_mod( 'tiny_editorial_show_author_box', true ) || ! is_single() ) {
		return;
	}
	?>
	<section class="author-box" aria-label="<?php esc_attr_e( 'Author information', 'editorialplus' ); ?>">
		<div class="author-box__body">
			<h2 class="author-box__name">
				<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
					<?php echo esc_html( get_the_author() ); ?>
				</a>
			</h2>
			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
			<?php else : ?>
				<p><?php echo esc_html__( 'Contributor and writer. View all posts to discover more of their work.', 'editorialplus' ); ?></p>
			<?php endif; ?>
		</div>
	</section>
	<?php
}


/**
 * Check sidebar availability.
 *
 * @return bool
 */
function tiny_editorial_has_sidebar() {
	return is_active_sidebar( 'sidebar-1' ) && ! is_page_template( 'page-templates/template-full-width.php' ) && ! is_page_template( 'page-templates/template-editorial-canvas.php' ) && ! is_page_template( 'page-templates/template-landing.php' );
}
