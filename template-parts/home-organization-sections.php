<?php
/**
 * A long editorial front page. Each section gives a different group of posts
 * a reading order that suits its subject and pace.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$latest = tiny_editorial_get_home_posts( 28, array(), array( 'update_post_term_cache' => true ) );
$terms  = array();
$groups = array();
foreach ( array( 'essays', 'reviews', 'dispatches', 'notes' ) as $slug ) {
	$category_term = get_category_by_slug( $slug );
	if ( $category_term ) {
		$terms[ $slug ]  = $category_term;
		$groups[ $slug ] = tiny_editorial_get_home_posts(
			6,
			array(),
			array(
				'cat'                    => (int) $category_term->term_id,
				'update_post_term_cache' => true,
			)
		);
	}
}
$essays        = $groups['essays'] ?? $latest;
$reviews       = $groups['reviews'] ?? $latest;
$dispatches    = $groups['dispatches'] ?? $latest;
$notes         = $groups['notes'] ?? $latest;
$cover_rail    = array_filter( array( $reviews[0] ?? null, $dispatches[0] ?? null, $notes[0] ?? null ) );
$reading_route = array_filter(
	array(
		$notes[0] ?? null,
		$essays[1] ?? null,
		$reviews[1] ?? null,
		$dispatches[1] ?? null,
		$essays[3] ?? null,
	)
);
?>
<section class="editorial-section story-cover" aria-labelledby="story-cover-title">
	<div class="editorial-section__inner">
		<div class="story-cover__masthead">
			<p class="story-kicker"><?php esc_html_e( 'A journal of reading and design', 'editorialplus' ); ?></p>
			<h1 id="story-cover-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
			<p><?php esc_html_e( 'Ideas, field notes, reviews, and small observations about how words find their place.', 'editorialplus' ); ?></p>
		</div>
		<div class="story-cover__grid">
			<?php
			if ( isset( $essays[0] ) ) :
				tiny_editorial_setup_loop_post( $essays[0] );
				?>
				<article class="story-cover__lead">
					<p class="story-kicker"><?php esc_html_e( 'The lead story', 'editorialplus' ); ?></p>
					<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h2>
					<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 38 ) ); ?></p>
					<span class="story-meta"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?> · <?php echo wp_kses_post( tiny_editorial_get_category_links() ); ?></span>
				</article>
				<?php
			endif;
			wp_reset_postdata();
			?>
			<div class="story-cover__rail">
				<p class="story-kicker"><?php esc_html_e( 'Also in this issue', 'editorialplus' ); ?></p>
				<?php
				foreach ( $cover_rail as $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					?>
					<article>
						<span class="story-meta"><?php echo esc_html( get_the_date( 'M j' ) ); ?></span>
						<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
					</article>
					<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>

<section class="editorial-section story-departments" aria-labelledby="story-departments-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'The publication', 'editorialplus' ); ?></p><h2 id="story-departments-title"><?php esc_html_e( 'Four ways in', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'Follow a subject, then choose a story.', 'editorialplus' ); ?></p></div>
		<div class="story-departments__grid">
			<?php foreach ( $terms as $slug => $category_term ) : ?>
				<div class="story-department">
					<p class="story-department__count"><?php echo esc_html( sprintf( '%02d', (int) $category_term->count ) ); ?> <?php esc_html_e( 'stories', 'editorialplus' ); ?></p>
					<h3><a href="<?php echo esc_url( get_category_link( $category_term ) ); ?>"><?php echo esc_html( $category_term->name ); ?></a></h3>
					<ol>
						<?php
						foreach ( array_slice( $groups[ $slug ], 0, 3 ) as $home_post ) :
							tiny_editorial_setup_loop_post( $home_post );
							?>
							<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></li>
							<?php
						endforeach;
						wp_reset_postdata();
						?>
					</ol>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="editorial-section story-dossier" aria-labelledby="story-dossier-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'Essays', 'editorialplus' ); ?></p><h2 id="story-dossier-title"><?php esc_html_e( 'The longer argument', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'Begin with one substantial idea, then move through its related questions.', 'editorialplus' ); ?></p></div>
		<div class="story-dossier__grid">
			<?php
			if ( isset( $essays[0] ) ) :
				tiny_editorial_setup_loop_post( $essays[0] );
				?>
				<article class="story-dossier__feature">
					<span class="story-meta"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
					<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3>
					<p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 42 ) ); ?></p>
				</article>
				<?php
			endif;
			wp_reset_postdata();
			?>
			<div class="story-dossier__related">
				<?php
				foreach ( array_slice( $essays, 1, 4 ) as $index => $home_post ) :
					tiny_editorial_setup_loop_post( $home_post );
					?>
					<article><span class="story-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><div><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3><p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 15 ) ); ?></p></div></article>
					<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</section>

<section class="editorial-section story-reviews" aria-labelledby="story-reviews-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'Reviews', 'editorialplus' ); ?></p><h2 id="story-reviews-title"><?php esc_html_e( 'Three considered responses', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'Equal room for each work; no single review has to dominate the shelf.', 'editorialplus' ); ?></p></div>
		<div class="story-reviews__grid">
			<?php
			foreach ( array_slice( $reviews, 0, 3 ) as $index => $home_post ) :
				tiny_editorial_setup_loop_post( $home_post );
				?>
				<article><span class="story-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3><p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 27 ) ); ?></p><span class="story-meta"><?php echo esc_html( get_the_date( 'M j, Y' ) ); ?></span></article>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<section class="editorial-section story-dispatches" aria-labelledby="story-dispatches-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'Dispatches', 'editorialplus' ); ?></p><h2 id="story-dispatches-title"><?php esc_html_e( 'Notes from the field', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'A running chronology makes each small report part of a larger record.', 'editorialplus' ); ?></p></div>
		<ol class="story-dispatches__list">
			<?php
			foreach ( array_slice( $dispatches, 0, 5 ) as $home_post ) :
				tiny_editorial_setup_loop_post( $home_post );
				?>
				<li><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'M j' ) ); ?></time><div><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3><p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 20 ) ); ?></p></div><span aria-hidden="true">↗</span></li>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</ol>
	</div>
</section>

<section class="editorial-section story-notes" aria-labelledby="story-notes-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'Notes', 'editorialplus' ); ?></p><h2 id="story-notes-title"><?php esc_html_e( 'Small observations', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'Brief pieces invite browsing; their first lines do the work of a visual thumbnail.', 'editorialplus' ); ?></p></div>
		<div class="story-notes__grid">
			<?php
			foreach ( array_slice( $notes, 0, 6 ) as $index => $home_post ) :
				tiny_editorial_setup_loop_post( $home_post );
				?>
				<article><span class="story-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3><p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 19 ) ); ?></p></article>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<section class="editorial-section story-conversation" aria-labelledby="story-conversation-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'Read together', 'editorialplus' ); ?></p><h2 id="story-conversation-title"><?php esc_html_e( 'How much should a page explain?', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'An essay on introductions sits beside a review of footnotes: two ways of guiding a reader.', 'editorialplus' ); ?></p></div>
		<div class="story-conversation__grid">
			<?php foreach ( array( $essays[1] ?? null, $reviews[1] ?? null ) as $index => $home_post ) : ?>
				<?php
				if ( ! $home_post ) {
					continue;
				}
				tiny_editorial_setup_loop_post( $home_post );
				?>
				<article><span class="story-meta"><?php echo esc_html( $index ? __( 'The response', 'editorialplus' ) : __( 'The proposition', 'editorialplus' ) ); ?></span><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3><p><?php echo esc_html( tiny_editorial_get_trimmed_excerpt( 31 ) ); ?></p></article>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</div>
	</div>
</section>

<section class="editorial-section story-route" aria-labelledby="story-route-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'A reading route', 'editorialplus' ); ?></p><h2 id="story-route-title"><?php esc_html_e( 'From the first line to the front page', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'Five pieces move from a sentence and its introduction to the ways a whole publication is assembled.', 'editorialplus' ); ?></p></div>
		<ol class="story-route__list">
			<?php
			foreach ( $reading_route as $index => $home_post ) :
				tiny_editorial_setup_loop_post( $home_post );
				?>
				<li><span class="story-number"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span><div><span class="story-meta"><?php echo wp_kses_post( tiny_editorial_get_category_links() ); ?></span><h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></h3></div><span aria-hidden="true">→</span></li>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</ol>
	</div>
</section>

<section class="editorial-section story-archive" aria-labelledby="story-archive-title">
	<div class="editorial-section__inner">
		<div class="story-section-head"><p class="story-kicker"><?php esc_html_e( 'From the archive', 'editorialplus' ); ?></p><h2 id="story-archive-title"><?php esc_html_e( 'The reading index', 'editorialplus' ); ?></h2><p><?php esc_html_e( 'A denser list restores the publication’s full rhythm after the selected stories above.', 'editorialplus' ); ?></p></div>
		<ol class="story-archive__list">
			<?php
			foreach ( $latest as $home_post ) :
				tiny_editorial_setup_loop_post( $home_post );
				$post_categories = get_the_category();
				?>
				<li><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time><span><?php echo esc_html( $post_categories ? $post_categories[0]->name : __( 'Article', 'editorialplus' ) ); ?></span><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( tiny_editorial_get_display_title() ); ?></a></li>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
		</ol>
		<p class="story-archive__more"><a href="<?php echo esc_url( tiny_editorial_blog_url() ); ?>"><?php esc_html_e( 'All stories', 'editorialplus' ); ?> →</a></p>
	</div>
</section>
