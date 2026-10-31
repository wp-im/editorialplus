<?php
/**
 * Starter HTML snippets for the Elements Library.
 *
 * @package Tiny_Editorial_Text_Only
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Return copyable starter HTML snippets.
 *
 * These snippets are deliberately plain HTML. They are designed for the
 * Classic Editor Text tab and for users who want page-builder-like sections
 * without adding a page builder or ACF.
 *
 * @return array<string,array<string,string>>
 */
function tiny_editorial_get_snippets() {
	return array(

		'hero-split'     => array(
			'group'       => 'Opening',
			'title'       => 'Hero Split',
			'file'        => 'hero-split.html',
			'description' => 'A strong page opening with headline, lead paragraph, two actions, and a supporting text note.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--dark">
  <div class="editorial-section__inner editorial-media-split">
    <div>
      <span class="editorial-kicker">Section Kicker</span>
      <h1 class="editorial-title">A strong editorial headline goes here.</h1>
      <p class="editorial-subtitle">Use this section for a home page, landing page, or campaign opening.</p>
      <div class="editorial-button-row">
        <a class="editorial-button" href="#">Primary Action</a>
        <a class="editorial-button editorial-button--outline" href="#">Secondary Link</a>
      </div>
    </div>
    <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
  </div>
</section>
HTML
			,
		),

		'hero-centered'  => array(
			'group'       => 'Opening',
			'title'       => 'Hero Centered',
			'file'        => 'hero-centered.html',
			'description' => 'A quieter centred opening for essays, issue pages, announcements, or a small publication front page.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--dark editorial-section--centered-hero">
  <div class="editorial-section__inner">
    <div class="editorial-section__header editorial-section__header--wide">
      <span class="editorial-kicker">Editorial Opening</span>
      <h1 class="editorial-title">A centred headline with publication weight.</h1>
      <p class="editorial-subtitle">Use this when you need a calm magazine-style opening without a large image.</p>
      <div class="editorial-button-row editorial-button-row--center">
        <a class="editorial-button" href="#">Start Here</a>
      </div>
    </div>
  </div>
</section>
HTML
			,
		),

		'lead-text'      => array(
			'group'       => 'Opening',
			'title'       => 'Lead Text',
			'file'        => 'lead-text.html',
			'description' => 'A compact introductory section for explaining the page argument before the detailed content begins.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">Essay Lead</span>
      <h2 class="editorial-title">A quieter section title for explanation.</h2>
      <p class="editorial-subtitle">This lead paragraph gives readers a precise reason to continue. Keep it short, calm, and readable.</p>
    </div>
  </div>
</section>
HTML
			,
		),

		'cards-section'  => array(
			'group'       => 'Cards',
			'title'       => 'Three Cards',
			'file'        => 'cards-section.html',
			'description' => 'Three equal cards for values, services, programmes, topics, or editorial pillars.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">Three Cards</span>
      <h2 class="editorial-title">Three related points in one system.</h2>
    </div>
    <div class="editorial-grid editorial-grid--3">
      <article class="editorial-card">
        <h3>First Card</h3>
        <p>Replace this text with your own short explanation.</p>
        <a class="read-more" href="#">Read more</a>
      </article>
      <article class="editorial-card">
        <h3>Second Card</h3>
        <p>Cards work well for services, values, columns, or features.</p>
        <a class="read-more" href="#">Read more</a>
      </article>
      <article class="editorial-card">
        <h3>Third Card</h3>
        <p>Keep the text lengths roughly balanced for a cleaner layout.</p>
        <a class="read-more" href="#">Read more</a>
      </article>
    </div>
  </div>
</section>
HTML
			,
		),

		'four-cards'     => array(
			'group'       => 'Cards',
			'title'       => 'Four Cards',
			'file'        => 'four-cards.html',
			'description' => 'Four compact cards for numbered principles, process steps, small service categories, or site navigation.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner">
    <div class="editorial-grid editorial-grid--4">
      <article class="editorial-card"><h3>01</h3><p>Short item text.</p></article>
      <article class="editorial-card"><h3>02</h3><p>Short item text.</p></article>
      <article class="editorial-card"><h3>03</h3><p>Short item text.</p></article>
      <article class="editorial-card"><h3>04</h3><p>Short item text.</p></article>
    </div>
  </div>
</section>
HTML
			,
		),

		'feature-cards'  => array(
			'group'       => 'Cards',
			'title'       => 'Feature Cards With Labels',
			'file'        => 'feature-cards.html',
			'description' => 'Three cards with small labels, useful when the page needs a slightly more editorial taxonomy.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-grid editorial-grid--3">
      <article class="editorial-card editorial-card--feature">
        <span class="editorial-mini-label">Feature</span>
        <h3>Small but decisive detail.</h3>
        <p>Describe one concrete quality, feature, or editorial promise.</p>
      </article>
      <article class="editorial-card editorial-card--feature">
        <span class="editorial-mini-label">Method</span>
        <h3>A method readers can understand.</h3>
        <p>Use a short paragraph. Avoid turning cards into long essays.</p>
      </article>
      <article class="editorial-card editorial-card--feature">
        <span class="editorial-mini-label">Outcome</span>
        <h3>A clear result or expectation.</h3>
        <p>Give the reader enough information to decide where to go next.</p>
      </article>
    </div>
  </div>
</section>
HTML
			,
		),

		'split-section'  => array(
			'group'       => 'Story',
			'title'       => 'Split Section',
			'file'        => 'split-section.html',
			'description' => 'A balanced two-column arrangement with a supporting note and main text.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner editorial-media-split">
    <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
    <div>
      <span class="editorial-kicker">Split Section</span>
      <h2 class="editorial-title">Text and context in balance.</h2>
      <p class="editorial-subtitle">Use this for a founder note, programme introduction, philosophy section, or product story.</p>
    </div>
  </div>
</section>
HTML
			,
		),

		'story-band'     => array(
			'group'       => 'Story',
			'title'       => 'Story Band',
			'file'        => 'story-band.html',
			'description' => 'A wide story block for a founding note, editorial note, or institutional philosophy.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner editorial-story-band">
    <span class="editorial-kicker">Our Story</span>
    <h2 class="editorial-title">A compact narrative section with room for a serious paragraph.</h2>
    <p>Write two or three calm sentences here. This block works well when the page needs a more literary or institutional voice without turning into a full article.</p>
  </div>
</section>
HTML
			,
		),

		'quote-block'    => array(
			'group'       => 'Story',
			'title'       => 'Quote Block',
			'file'        => 'quote-block.html',
			'description' => 'Large pull quote for a strong editorial sentence, testimonial, or motto.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner">
    <blockquote class="editorial-quote">“A good page should feel edited before it feels decorated.”</blockquote>
  </div>
</section>
HTML
			,
		),

		'timeline'       => array(
			'group'       => 'Story',
			'title'       => 'Timeline',
			'file'        => 'timeline.html',
			'description' => 'A chronological list for process, history, editorial schedule, or publication stages.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">Timeline</span>
      <h2 class="editorial-title">A simple sequence of steps.</h2>
    </div>
    <ol class="editorial-timeline">
      <li><strong>01</strong><span>First step or year</span><p>Explain what happens here in one or two sentences.</p></li>
      <li><strong>02</strong><span>Second step or year</span><p>Keep each item comparable in length for a cleaner page rhythm.</p></li>
      <li><strong>03</strong><span>Third step or year</span><p>Use this for history, process, editorial scheduling, or editorial workflow.</p></li>
    </ol>
  </div>
</section>
HTML
			,
		),

		'people-grid'    => array(
			'group'       => 'People',
			'title'       => 'People Grid',
			'file'        => 'people-grid.html',
			'description' => 'Staff, authors, teachers, contributors, or advisory members in a clean editorial grid.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">People</span>
      <h2 class="editorial-title">A small group, clearly introduced.</h2>
    </div>
    <div class="editorial-grid editorial-grid--3 editorial-people-grid">
      <article class="editorial-person"><div class="editorial-avatar">A</div><h3>Person Name</h3><p>Role or short biography.</p></article>
      <article class="editorial-person"><div class="editorial-avatar">B</div><h3>Person Name</h3><p>Role or short biography.</p></article>
      <article class="editorial-person"><div class="editorial-avatar">C</div><h3>Person Name</h3><p>Role or short biography.</p></article>
    </div>
  </div>
</section>
HTML
			,
		),

		'stats-band'     => array(
			'group'       => 'Data',
			'title'       => 'Stats Band',
			'file'        => 'stats-band.html',
			'description' => 'A softly tinted data band for key numbers or institutional facts.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--dark">
  <div class="editorial-section__inner">
    <div class="editorial-stat-row">
      <div class="editorial-stat"><strong>12</strong><span>Years</span></div>
      <div class="editorial-stat"><strong>3</strong><span>Rooms</span></div>
      <div class="editorial-stat"><strong>120</strong><span>Families</span></div>
      <div class="editorial-stat"><strong>1</strong><span>Community</span></div>
    </div>
  </div>
</section>
HTML
			,
		),

		'info-table'     => array(
			'group'       => 'Data',
			'title'       => 'Editorial Spec Sheet (Issue, Vol, ISSN)',
			'file'        => 'info-table.html',
			'description' => 'A table-like facts section for issue details, volume number, publication dates, and ISSN.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-info-table">
      <div><strong>Volume</strong><span>Vol. 42, No. 2</span></div>
      <div><strong>Issue</strong><span>Spring 2026</span></div>
      <div><strong>ISSN</strong><span>1234-5678</span></div>
      <div><strong>Contact</strong><span><a href="mailto:editor@example.com">editor@example.com</a></span></div>
    </div>
  </div>
</section>
HTML
			,
		),

		'notice-panel'   => array(
			'group'       => 'Data',
			'title'       => 'Notice Panel',
			'file'        => 'notice-panel.html',
			'description' => 'A restrained announcement panel for deadlines, submission guidelines, or editorial notices.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner">
    <aside class="editorial-notice">
      <span class="editorial-kicker">Notice</span>
      <h2>Important note or announcement.</h2>
      <p>Write the practical information here. Keep it short and direct.</p>
      <a class="read-more" href="#">Contact us</a>
    </aside>
  </div>
</section>
HTML
			,
		),

		'faq-section'    => array(
			'group'       => 'Utility',
			'title'       => 'FAQ Section',
			'file'        => 'faq-section.html',
			'description' => 'A collapsible FAQ block using native HTML details/summary elements.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">FAQ</span>
      <h2 class="editorial-title">Frequently asked questions.</h2>
    </div>
    <div class="editorial-faq">
      <details><summary>Question one?</summary><p>Write a concise answer here.</p></details>
      <details><summary>Question two?</summary><p>Write a concise answer here.</p></details>
      <details><summary>Question three?</summary><p>Write a concise answer here.</p></details>
    </div>
  </div>
</section>
HTML
			,
		),

		'cta-section'    => array(
			'group'       => 'Utility',
			'title'       => 'CTA Section',
			'file'        => 'cta-section.html',
			'description' => 'A quiet call-to-action section that stays editorial rather than sales-heavy.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--dark">
  <div class="editorial-section__inner">
    <div class="editorial-section__header">
      <span class="editorial-kicker">Next Step</span>
      <h2 class="editorial-title">Invite the reader to act.</h2>
      <p class="editorial-subtitle">Use a clear call to action without turning the page into an advertisement.</p>
      <div class="editorial-button-row editorial-button-row--center"><a class="editorial-button" href="#">Contact Us</a></div>
    </div>
  </div>
</section>
HTML
			,
		),

		'text-columns'   => array(
			'group'       => 'Utility',
			'title'       => 'Text Columns',
			'file'        => 'text-columns.html',
			'description' => 'Two-column explanatory text for classic editor pages.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner editorial-grid editorial-grid--2">
    <div><h2 class="editorial-title">Left column.</h2><p class="editorial-subtitle">Use two columns for explanation, comparison, or editorial framing.</p></div>
    <div><p>Write ordinary page text here. This section is useful for Classic Editor pages where you want controlled layout without a page builder.</p></div>
  </div>
</section>
HTML
			,
		),

		'article-list'   => array(
			'group'       => 'Publishing',
			'title'       => 'Article List',
			'file'        => 'article-list.html',
			'description' => 'A manual list of articles, announcements, or resources.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-list">
      <article class="editorial-list-item"><h3><a href="#">Article title one</a></h3><p>Short description or date.</p></article>
      <article class="editorial-list-item"><h3><a href="#">Article title two</a></h3><p>Short description or date.</p></article>
      <article class="editorial-list-item"><h3><a href="#">Article title three</a></h3><p>Short description or date.</p></article>
    </div>
  </div>
</section>
HTML
			,
		),

		'issue-index'    => array(
			'group'       => 'Publishing',
			'title'       => 'Issue / Index Section',
			'file'        => 'issue-index.html',
			'description' => 'A small table-of-contents block for journals, newsletters, resource pages, or special issues.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner">
    <div class="editorial-index">
      <h2>Issue title or resource index.</h2>
      <ol>
        <li><a href="#">Opening essay</a><span>Feature</span></li>
        <li><a href="#">Interview or report</a><span>Conversation</span></li>
        <li><a href="#">Notes and resources</a><span>Archive</span></li>
      </ol>
    </div>
  </div>
</section>
HTML
			,
		),

		'reference-grid' => array(
			'group'       => 'Media',
			'title'       => 'Reference Grid',
			'file'        => 'reference-grid.html',
			'description' => 'A four-cell reference grid for links, notes, citations, or short resources.',
			'html'        => <<<'HTML'
<section class="editorial-section">
  <div class="editorial-section__inner">
    <div class="editorial-gallery">
      <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
      <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
      <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
      <aside class="editorial-card editorial-note"><h2>Editor's Note</h2><p>Use this supporting panel for context, a brief promise, or a compact index of what follows.</p></aside>
    </div>
  </div>
</section>
HTML
			,
		),

		'contact-strip'  => array(
			'group'       => 'Utility',
			'title'       => 'Contact Strip',
			'file'        => 'contact-strip.html',
			'description' => 'Three-column practical contact information for the bottom of a page.',
			'html'        => <<<'HTML'
<section class="editorial-section editorial-section--alt">
  <div class="editorial-section__inner editorial-grid editorial-grid--3">
    <article class="editorial-card"><h3>Address</h3><p>Write your address here.</p></article>
    <article class="editorial-card"><h3>Email</h3><p><a href="mailto:hello@example.com">hello@example.com</a></p></article>
    <article class="editorial-card"><h3>Hours</h3><p>Monday–Friday, 9:00–17:00.</p></article>
  </div>
</section>
HTML
			,
		),

		'lead-paragraph' => array(
			'group'       => 'Story',
			'title'       => 'Editorial Lead Paragraph',
			'file'        => 'lead-paragraph.html',
			'description' => 'A larger, styled opening paragraph for essays or long-form posts.',
			'html'        => <<<'HTML'
<p class="editorial-lead-paragraph">This is an elegant editorial lead paragraph. Use it at the very beginning of your articles or essays to provide a stylized summary and draw readers in.</p>
HTML
			,
		),

		'pull-quote'     => array(
			'group'       => 'Story',
			'title'       => 'Pull Quote',
			'file'        => 'pull-quote.html',
			'description' => 'A pull quote block to insert within the main text flow of an article.',
			'html'        => <<<'HTML'
<blockquote class="editorial-quote">“Write a compelling sentence or key quote from the article here to hook the reader.”</blockquote>
HTML
			,
		),
	);
}

/**
 * Return snippets grouped by their library group.
 *
 * @return array<string,array<string,array<string,string>>>
 */
function tiny_editorial_get_snippets_by_group() {
	$groups = array();

	foreach ( tiny_editorial_get_snippets() as $key => $snippet ) {
		$group = isset( $snippet['group'] ) ? $snippet['group'] : __( 'General', 'editorialplus' );
		if ( ! isset( $groups[ $group ] ) ) {
			$groups[ $group ] = array();
		}
		$groups[ $group ][ $key ] = $snippet;
	}

	return $groups;
}

/**
 * Return one snippet by key.
 *
 * @param string $key Snippet key.
 * @return string
 */
function tiny_editorial_get_snippet_html( $key ) {
	$snippets = tiny_editorial_get_snippets();
	return isset( $snippets[ $key ]['html'] ) ? $snippets[ $key ]['html'] : '';
}

/**
 * Return allowed HTML for rendering built-in snippets safely.
 *
 * @return array<string,mixed>
 */
function tiny_editorial_snippet_allowed_html() {
	$allowed = wp_kses_allowed_html( 'post' );

	foreach ( array( 'section', 'div', 'article', 'aside', 'span', 'ol', 'li', 'details', 'summary', 'strong', 'blockquote' ) as $tag ) {
		if ( ! isset( $allowed[ $tag ] ) ) {
			$allowed[ $tag ] = array();
		}
		$allowed[ $tag ]['class'] = true;
		$allowed[ $tag ]['id']    = true;
	}

	$allowed['section']['aria-labelledby'] = true;
	$allowed['section']['aria-label']      = true;
	$allowed['div']['aria-label']          = true;
	$allowed['div']['aria-labelledby']     = true;
	$allowed['article']['aria-label']      = true;
	$allowed['article']['aria-labelledby'] = true;
	$allowed['aside']['aria-label']        = true;
	$allowed['details']['open']            = true;
	$allowed['a']['class']                 = true;
	$allowed['a']['href']                  = true;
	$allowed['a']['aria-label']            = true;
	$allowed['img']['class']               = true;
	$allowed['img']['src']                 = true;
	$allowed['img']['alt']                 = true;
	$allowed['img']['loading']             = true;
	$allowed['img']['decoding']            = true;

	return $allowed;
}
