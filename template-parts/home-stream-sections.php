<?php
/**
 * Shared Home Stream sections.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$showcase = ! empty( $args['showcase'] );
?>
<?php $stream_used_ids = array(); ?>

<!-- Marquee. -->
<section class="editorial-section editorial-section--dark stream-marquee">
	<div class="editorial-section__inner">
		<?php
		$sticky_ids  = get_option( 'sticky_posts' );
		$marquee_arg = ! empty( $sticky_ids )
			? array(
				'posts_per_page'      => 1,
				'post__in'            => array( $sticky_ids[0] ),
				'ignore_sticky_posts' => 1,
			)
			: array( 'posts_per_page' => 1 );
		$mq          = tiny_editorial_get_posts_query( $marquee_arg );
		if ( $mq->have_posts() ) :
			while ( $mq->have_posts() ) :
				$mq->the_post();
				$stream_used_ids[] = get_the_ID();
				?>
				<div class="stream-marquee__kicker-row">
					<span class="stream-issue-label"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_stream_marquee_label', __( 'Editor\'s Pick', 'editorialplus' ) ) ); ?></span>
					<span class="stream-marquee__date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
				</div>
				<a class="stream-marquee__title-link" href="<?php echo esc_url( get_permalink() ); ?>">
					<h<?php echo $showcase ? 2 : 1; ?> class="stream-marquee__title"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></h<?php echo $showcase ? 2 : 1; ?>>
				</a>
				<div class="stream-marquee__body">
						<p class="stream-marquee__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 35 ) ); ?></p>
					<div class="stream-marquee__meta">
						<span class="stream-byline"><?php echo wp_kses_post( tiny_editorial_get_author_link() ); ?></span>
						<a class="stream-marquee__cta" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read Essay', 'editorialplus' ); ?></a>
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

<?php
if ( ! $showcase ) {
	tiny_editorial_render_widget_area( 'home-after-hero', 'home-widget-area home-widget-area--after-hero' );
}
?>

<!-- Numbered lead stories. -->
<section class="editorial-section stream-leads">
	<div class="editorial-section__inner">
		<div class="stream-leads__header">
			<h2 class="stream-section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_stream_leads_title', __( 'Top Stories', 'editorialplus' ) ) ); ?></h2>
			<div class="stream-leads__rule"></div>
		</div>
		<ol class="stream-rank-list">
			<?php
			$lead_posts = tiny_editorial_get_home_posts( 5, $stream_used_ids );
			if ( ! empty( $lead_posts ) ) :
				$rank_counter = 1;
				foreach ( $lead_posts as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					$stream_used_ids[] = get_the_ID();
					?>
					<li class="stream-rank-item">
						<span class="stream-rank-number"><?php echo esc_html( sprintf( '%02d', $rank_counter ) ); ?></span>

						<div class="stream-rank-item__body">
								<span class="blog-date"><?php echo esc_html( get_the_date() ); ?> / <?php echo esc_html( get_the_author() ); ?></span>
							<h3 class="stream-rank-item__title">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
							</h3>
								<p class="stream-rank-item__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 20 ) ); ?></p>
						</div>
					</li>
					<?php
					++$rank_counter;
				endforeach;
				wp_reset_postdata();
			else :
				tiny_editorial_home_empty_message( __( 'Top stories will appear here after more posts are published.', 'editorialplus' ) );
			endif;
			?>
		</ol>
	</div>
</section>

<!-- Wide feature. -->
<?php
$wide_posts = tiny_editorial_get_home_posts( 1, $stream_used_ids );
if ( ! empty( $wide_posts ) ) :
	foreach ( $wide_posts as $home_post ) :
		tiny_editorial_setup_loop_post( $home_post );
		$stream_used_ids[] = get_the_ID();
		?>
		<section class="editorial-section editorial-section--alt stream-wide-feature">
			<div class="editorial-section__inner">
				<div class="stream-wide-feature__inner">

					<div class="stream-wide-feature__text">
						<?php $wide_categories = tiny_editorial_get_category_links(); ?>
						<?php if ( $wide_categories ) : ?>
							<span class="label-pill"><?php echo wp_kses_post( $wide_categories ); ?></span>
						<?php endif; ?>
						<h2 class="stream-wide-feature__title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
						</h2>
							<p class="stream-wide-feature__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 40 ) ); ?></p>
						<div class="stream-wide-feature__meta">
							<span class="stream-byline"><?php echo esc_html( get_the_author() ); ?></span>
								<span class="mosaic-meta-sep" aria-hidden="true">/</span>
							<span><?php echo esc_html( get_the_date() ); ?></span>
						</div>
							<a class="read-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Continue Reading', 'editorialplus' ); ?></a>
					</div>
				</div>
			</div>
		</section>
		<?php
	endforeach;
	wp_reset_postdata();
else :
	tiny_editorial_home_empty_message( __( 'A wide feature will appear here after more posts are published.', 'editorialplus' ) );
endif;
?>

<!-- Reading list. -->
<section class="editorial-section stream-reading-list">
	<div class="editorial-section__inner">
		<div class="stream-leads__header">
			<h2 class="stream-section-title"><?php echo esc_html( tiny_editorial_get_home_setting( 'tiny_editorial_home_stream_more_title', __( 'More to Read', 'editorialplus' ) ) ); ?></h2>
			<div class="stream-leads__rule"></div>
		</div>
		<div class="stream-reading-grid">
			<?php
			$reading_posts = tiny_editorial_get_home_posts( 8, $stream_used_ids );
			if ( ! empty( $reading_posts ) ) :
				foreach ( $reading_posts as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					?>
					<article class="stream-reading-item">
						<span class="blog-date"><?php echo esc_html( get_the_date() ); ?></span>
						<h3 class="stream-reading-item__title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a>
						</h3>
							<p class="stream-reading-item__excerpt"><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 16 ) ); ?></p>
						<span class="stream-byline"><?php echo esc_html( get_the_author() ); ?></span>
					</article>
					<?php
				endforeach;
				wp_reset_postdata();
			else :
				tiny_editorial_home_empty_message( __( 'More reading links will appear here after additional posts are published.', 'editorialplus' ) );
			endif;
			?>
		</div>
	</div>
</section>
