<?php
/**
 * Template Name: Elements Library
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
$snippet_groups = tiny_editorial_get_snippets_by_group();
?>
<section class="archive-header elements-header">
	<div class="container">
		<?php tiny_editorial_breadcrumbs(); ?>
		<span class="editorial-kicker"><?php esc_html_e( 'Classic Editor Kit', 'editorialplus' ); ?></span>
		<h1 class="archive-title"><?php esc_html_e( 'Elements Library', 'editorialplus' ); ?></h1>
		<p class="archive-description"><?php esc_html_e( 'Copy these HTML sections into an Editorial Canvas page using the Classic Editor Text tab. Replace text and links, but keep the classes for the theme styling.', 'editorialplus' ); ?></p>
		<div class="element-instructions" aria-label="<?php esc_attr_e( 'How to use this library', 'editorialplus' ); ?>">
			<ol>
				<li><?php esc_html_e( 'Create or edit a page.', 'editorialplus' ); ?></li>
				<li><?php esc_html_e( 'Choose the Editorial Canvas template.', 'editorialplus' ); ?></li>
				<li><?php esc_html_e( 'Paste a snippet in the Classic Editor Text/HTML tab.', 'editorialplus' ); ?></li>
			</ol>
		</div>
	</div>
</section>
<div class="container element-library">
	<?php foreach ( $snippet_groups as $group_name => $snippets ) : ?>
		<section class="element-library-group" aria-labelledby="element-group-<?php echo esc_attr( sanitize_title( $group_name ) ); ?>">
			<h2 id="element-group-<?php echo esc_attr( sanitize_title( $group_name ) ); ?>" class="element-library-group__title"><?php echo esc_html( $group_name ); ?></h2>
			<?php foreach ( $snippets as $key => $snippet ) : ?>
				<?php
				$html       = isset( $snippet['html'] ) ? $snippet['html'] : '';
				$element_id = sanitize_html_class( $key );
				?>
				<section class="element-group" aria-labelledby="element-<?php echo esc_attr( $element_id ); ?>">
					<div class="element-group__meta">
						<h3 id="element-<?php echo esc_attr( $element_id ); ?>"><?php echo esc_html( $snippet['title'] ); ?></h3>
						<?php if ( ! empty( $snippet['description'] ) ) : ?>
							<p><?php echo esc_html( $snippet['description'] ); ?></p>
						<?php endif; ?>
						<?php if ( ! empty( $snippet['file'] ) ) : ?>
							<span class="element-file-name"><?php echo esc_html( 'starter-html/' . $snippet['file'] ); ?></span>
						<?php endif; ?>
					</div>
					<div class="element-demo">
						<?php echo wp_kses( $html, tiny_editorial_snippet_allowed_html() ); ?>
					</div>
					<div class="element-code-wrap">
						<button class="element-copy-button" type="button" data-copy-target="element-code-<?php echo esc_attr( $element_id ); ?>"><?php esc_html_e( 'Copy HTML', 'editorialplus' ); ?></button>
						<pre class="element-code"><code id="element-code-<?php echo esc_attr( $element_id ); ?>"><?php echo esc_html( $html ); ?></code></pre>
					</div>
				</section>
			<?php endforeach; ?>
		</section>
	<?php endforeach; ?>
</div>
<?php get_footer(); ?>
