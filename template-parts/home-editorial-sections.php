<?php
/** Shared Home Editorial sections. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$showcase = ! empty( $args['showcase'] );
?>
<!-- Hero feature and latest stories. -->
<section class="editorial-section editorial-section--dark magazine-hero">
	<div class="editorial-section__inner">
		<div class="magazine-hero-grid">
				<div class="magazine-hero-grid__feature">
				<?php
				$feature_query = tiny_editorial_get_posts_query(
					array(
						'posts_per_page'         => 1,
						'post__in'               => get_option( 'sticky_posts' ),
						'ignore_sticky_posts'    => 1,
						'update_post_term_cache' => true,
					)
				);
				if ( ! $feature_query->have_posts() ) {
					wp_reset_postdata();
					$feature_query = tiny_editorial_get_posts_query(
						array(
							'posts_per_page'         => 1,
							'update_post_term_cache' => true,
						)
					);
				}
				if ( $feature_query->have_posts() ) :
					while ( $feature_query->have_posts() ) :
						$feature_query->the_post();
						$featured_id = get_the_ID();
						?>
						<article class="magazine-feature-card">
							<div class="magazine-feature-card__content">
								<?php $feature_categories = tiny_editorial_get_category_links(); ?>
								<?php if ( $feature_categories ) : ?>
									<span class="editorial-kicker"><?php echo wp_kses_post( $feature_categories ); ?></span>
								<?php endif; ?>
								<h<?php echo $showcase ? 2 : 1; ?> class="editorial-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h<?php echo $showcase ? 2 : 1; ?>>
								<div class="entry-meta">
									<span class="byline"><?php echo wp_kses_post( tiny_editorial_get_author_link() ); ?></span>
									<span class="posted-on"><?php echo esc_html( get_the_date() ); ?></span>
								</div>
								<p class="editorial-subtitle"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 32 ) ); ?></p>
								<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read Article', 'editorialplus' ); ?></a>
							</div>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					tiny_editorial_home_empty_message( __( 'Publish your first post to fill this home section.', 'editorialplus' ) );
				endif;
				?>
			</div>

				<div class="magazine-hero-grid__sidebar">
				<h2 class="magazine-sidebar-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_latest_title', __( 'Latest Stories', 'editorialplus' ) ) ); ?></h2>
				<div class="magazine-sidebar-list">
					<?php
					$exclude_id   = isset( $featured_id ) ? array( $featured_id ) : array();
					$recent_posts = tiny_editorial_get_home_posts( 3, $exclude_id );
					if ( ! empty( $recent_posts ) ) :
						foreach ( $recent_posts as $home_post ) :
							tiny_editorial_setup_loop_post( $home_post );
							?>
							<article class="magazine-sidebar-item">
								<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
								<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
								<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 18 ) ); ?></p>
							</article>
							<?php
						endforeach;
						wp_reset_postdata();
					else :
						tiny_editorial_home_empty_message( __( 'More stories will appear here after you publish additional posts.', 'editorialplus' ) );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php if ( ! $showcase ) { tiny_editorial_render_widget_area( 'home-after-hero', 'home-widget-area home-widget-area--after-hero' ); } ?>

<!-- Category sections. -->
<section class="editorial-section">
	<div class="editorial-section__inner">
		<div class="editorial-grid editorial-grid--2 magazine-categories">
				<div class="magazine-category-col">
				<div class="blog-section-header">
					<div>
						<span class="label-pill"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_essay_label', __( 'Category', 'editorialplus' ) ) ); ?></span>
						<h2 class="section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_essay_title', __( 'Essays & Literature', 'editorialplus' ) ) ); ?></h2>
					</div>
				</div>
				<div class="magazine-category-list">
					<?php
					$essay_category_id = absint( get_theme_mod( 'tiny_editorial_home_essay_category', 0 ) );
					$essay_posts       = array();

					if ( $essay_category_id ) {
						$essay_posts = tiny_editorial_get_home_posts(
							3,
							isset( $featured_id ) ? array( $featured_id ) : array(),
							array(
								'cat' => $essay_category_id,
							)
						);
					}

					if ( ! empty( $essay_posts ) ) :
						foreach ( $essay_posts as $home_post ) :
							tiny_editorial_setup_loop_post( $home_post );
							?>
							<article class="blog-card">
								<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
								<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
								<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 22 ) ); ?></p>
							</article>
							<?php
						endforeach;
						wp_reset_postdata();
					else :
						tiny_editorial_home_empty_message( __( 'Choose an essays category in Customizer to fill this section.', 'editorialplus' ) );
					endif;
					?>
				</div>
			</div>

				<div class="magazine-category-col">
				<div class="blog-section-header">
					<div>
						<span class="label-pill"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_review_label', __( 'Category', 'editorialplus' ) ) ); ?></span>
						<h2 class="section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_review_title', __( 'Critical Reviews', 'editorialplus' ) ) ); ?></h2>
					</div>
				</div>
				<div class="magazine-category-list">
					<?php
					$review_category_id = absint( get_theme_mod( 'tiny_editorial_home_review_category', 0 ) );
					$review_posts       = array();

					if ( $review_category_id ) {
						$review_posts = tiny_editorial_get_home_posts(
							3,
							isset( $featured_id ) ? array( $featured_id ) : array(),
							array(
								'cat' => $review_category_id,
							)
						);
					}

					if ( ! empty( $review_posts ) ) :
						foreach ( $review_posts as $home_post ) :
							tiny_editorial_setup_loop_post( $home_post );
							?>
							<article class="blog-card">
								<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
								<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
								<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 22 ) ); ?></p>
							</article>
							<?php
						endforeach;
						wp_reset_postdata();
					else :
						tiny_editorial_home_empty_message( __( 'Choose a reviews category in Customizer to fill this section.', 'editorialplus' ) );
					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Curated issue index. -->
<section class="editorial-section editorial-section--alt">
	<div class="editorial-section__inner">
			<div class="editorial-index">
				<div class="editorial-section__header">
					<span class="editorial-kicker"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_issue_kicker', __( 'Current Issue', 'editorialplus' ) ) ); ?></span>
					<h2 class="editorial-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_issue_title', __( 'Table of Contents', 'editorialplus' ) ) ); ?></h2>
					<p class="editorial-subtitle"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_editorial_issue_description', __( 'A selection of featured articles curated for this issue.', 'editorialplus' ) ) ); ?></p>
				</div>
			<ol class="issue-toc-list">
				<?php
				$curated_query = tiny_editorial_get_posts_query(
					array(
						'posts_per_page'      => 5,
						'ignore_sticky_posts' => true,
					)
				);
				if ( $curated_query->have_posts() ) :
					while ( $curated_query->have_posts() ) :
						$curated_query->the_post();
						?>
						<li>
							<div class="issue-toc-list__item-main">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
								<p class="issue-toc-list__item-excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 15 ) ); ?></p>
							</div>
							<span class="issue-toc-list__item-author"><?php echo esc_html( get_the_author() ); ?></span>
						</li>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					tiny_editorial_home_empty_message( __( 'The table of contents will appear after posts are published.', 'editorialplus' ) );
				endif;
				?>
			</ol>
		</div>
	</div>
</section>
