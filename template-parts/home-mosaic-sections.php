<?php
/** Shared Home Mosaic sections. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
$showcase = ! empty( $args['showcase'] );
?>
<?php
/* Collect IDs to exclude as sections are rendered. */
$mosaic_used_ids = array();

/* Use the first sticky post as the hero when available. */
$sticky_ids = get_option( 'sticky_posts' );
$hero_id    = ! empty( $sticky_ids ) ? $sticky_ids[0] : 0;
?>

<!-- Hero. -->
<section class="mosaic-hero editorial-section editorial-section--dark">
	<div class="editorial-section__inner">
		<?php
		$hero_args  = $hero_id
			? array(
				'posts_per_page'      => 1,
				'post__in'            => array( $hero_id ),
				'ignore_sticky_posts' => 1,
			)
			: array( 'posts_per_page' => 1 );
		$hero_query = tiny_editorial_get_posts_query(
			wp_parse_args(
				$hero_args,
				array(
					'update_post_term_cache' => true,
				)
			)
		);

		if ( $hero_query->have_posts() ) :
			while ( $hero_query->have_posts() ) :
				$hero_query->the_post();
				$mosaic_used_ids[] = get_the_ID();
				?>
				<div class="mosaic-hero__inner is-text-only">
						<div class="mosaic-hero__text">
						<?php $hero_categories = tiny_editorial_get_category_links(); ?>
						<?php if ( $hero_categories ) : ?>
							<span class="editorial-kicker mosaic-kicker"><?php echo wp_kses_post( $hero_categories ); ?></span>
						<?php endif; ?>
						<h<?php echo $showcase ? 2 : 1; ?> class="mosaic-hero__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h<?php echo $showcase ? 2 : 1; ?>>
						<p class="mosaic-hero__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 28 ) ); ?></p>
						<div class="mosaic-hero__meta">
							<span><?php echo wp_kses_post( tiny_editorial_get_author_link() ); ?></span>
								<span class="mosaic-meta-sep" aria-hidden="true">/</span>
							<span><?php echo esc_html( get_the_date() ); ?></span>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
		else :
			tiny_editorial_home_empty_message( __( 'Publish your first post to fill this home section.', 'editorialplus' ) );
		endif;
		?>
	</div>
</section>

<?php if ( ! $showcase ) { tiny_editorial_render_widget_area( 'home-after-hero', 'home-widget-area home-widget-area--after-hero' ); } ?>

<!-- Mosaic grid. -->
<section class="editorial-section mosaic-grid-section">
	<div class="editorial-section__inner">
		<div class="mosaic-section-header">
			<span class="label-pill"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_grid_label', __( 'Latest', 'editorialplus' ) ) ); ?></span>
			<h2 class="mosaic-section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_grid_title', __( 'Recent Stories', 'editorialplus' ) ) ); ?></h2>
		</div>
		<div class="mosaic-card-grid">
			<?php
			$grid_posts = tiny_editorial_get_home_posts( 6, $mosaic_used_ids );
			if ( ! empty( $grid_posts ) ) :
				$card_index = 0;
				foreach ( $grid_posts as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					$mosaic_used_ids[] = get_the_ID();
						$is_feature    = ( 0 === $card_index );
					?>
					<article class="mosaic-card<?php echo $is_feature ? ' mosaic-card--feature' : ''; ?>">
						<div class="mosaic-card__body">
							<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
							<h3 class="mosaic-card__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
								<p class="mosaic-card__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( $is_feature ? 22 : 14 ) ); ?></p>
							<span class="mosaic-card__byline"><?php echo esc_html( get_the_author() ); ?></span>
						</div>
					</article>
					<?php
					++$card_index;
				endforeach;
				wp_reset_postdata();
			else :
				tiny_editorial_home_empty_message( __( 'Recent stories will appear here after you publish additional posts.', 'editorialplus' ) );
			endif;
			?>
		</div>
	</div>
</section>

<!-- Dark spotlight. -->
<section class="editorial-section editorial-section--dark mosaic-spotlight">
	<div class="editorial-section__inner">
		<div class="mosaic-spotlight__inner">
				<div class="mosaic-spotlight__list">
				<span class="editorial-kicker"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_spotlight_label', __( 'In Depth', 'editorialplus' ) ) ); ?></span>
				<h2 class="mosaic-spotlight__heading"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_spotlight_title', __( 'Essays & Analysis', 'editorialplus' ) ) ); ?></h2>
				<?php
				$spotlight_posts = tiny_editorial_get_home_posts( 5, $mosaic_used_ids );
				if ( ! empty( $spotlight_posts ) ) :
					foreach ( $spotlight_posts as $home_post ) :
						tiny_editorial_setup_loop_post( $home_post );
						$mosaic_used_ids[] = get_the_ID();
						?>
							<div class="mosaic-spotlight__item">
								<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
								<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
								<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 14 ) ); ?></p>
							</div>
						<?php
						endforeach;
					wp_reset_postdata();
					else :
						tiny_editorial_home_empty_message( __( 'More in-depth stories will appear here after additional posts are published.', 'editorialplus' ) );
					endif;
					?>
				</div>
			<?php
			$spotlight_feature_posts = tiny_editorial_get_home_posts(
				1,
				$mosaic_used_ids,
				array(
					'update_post_term_cache' => true,
				)
			);
			if ( ! empty( $spotlight_feature_posts ) ) :
				foreach ( $spotlight_feature_posts as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					$mosaic_used_ids[] = get_the_ID();
					?>
					<article class="mosaic-spotlight__feature">
						<div class="mosaic-spotlight__feature-body">
							<?php $spotlight_categories = tiny_editorial_get_category_links(); ?>
							<?php if ( $spotlight_categories ) : ?>
								<span class="editorial-kicker"><?php echo wp_kses_post( $spotlight_categories ); ?></span>
							<?php endif; ?>
							<h2 class="mosaic-spotlight__feature-title">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
							</h2>
								<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 30 ) ); ?></p>
								<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read Article', 'editorialplus' ); ?></a>
						</div>
					</article>
					<?php
					endforeach;
				wp_reset_postdata();
				else :
					tiny_editorial_home_empty_message( __( 'A spotlight article will appear here after more posts are published.', 'editorialplus' ) );
				endif;
				?>
		</div>
	</div>
</section>

<!-- Archive strip. -->
<section class="editorial-section editorial-section--alt mosaic-strip-section">
	<div class="editorial-section__inner">
		<div class="mosaic-section-header">
			<span class="label-pill"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_archive_label', __( 'More Reading', 'editorialplus' ) ) ); ?></span>
			<h2 class="mosaic-section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_mosaic_archive_title', __( 'From the Archive', 'editorialplus' ) ) ); ?></h2>
		</div>
		<div class="mosaic-strip-grid">
			<?php
			$strip_posts = tiny_editorial_get_home_posts( 4, $mosaic_used_ids );
			if ( ! empty( $strip_posts ) ) :
				foreach ( $strip_posts as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					?>
					<article class="mosaic-strip-card">
						<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
						<h3 class="mosaic-strip-card__title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
						</h3>
							<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 12 ) ); ?></p>
					</article>
					<?php
					endforeach;
				wp_reset_postdata();
				else :
					tiny_editorial_home_empty_message( __( 'Archive links will appear here after more posts are published.', 'editorialplus' ) );
				endif;
				?>
		</div>
	</div>
</section>
