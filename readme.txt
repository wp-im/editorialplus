=== Editorial Plus ===
Contributors: binzhan
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 7.4
Stable tag: 1.4.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blog, education, news, custom-menu, footer-widgets, right-sidebar, threaded-comments, translation-ready

A text-only editorial theme with restrained pastel section bands, system typography, and nine article-led home sections. It includes three selectable home page templates, widget areas, menus, breadcrumbs, related posts, and copyable HTML elements. It intentionally avoids theme-level SEO/schema, AJAX loading, custom content models, dark mode, text-resizer controls, and automatic featured-image output.

== Description ==
Editorial Plus is a classic WordPress theme for text-led publications, schools, studios, notes, newsletters, and long-form sites. The theme provides a traditional WordPress template structure, three text-first home page templates, starter HTML sections for the Classic Editor, footer widgets, sidebar, breadcrumbs, related posts, and typography-first layouts.

SEO metadata, Open Graph, XML sitemaps, canonical overrides, analytics, forms, custom post types, and structured data should be handled by plugins rather than the theme.

== Installation ==
1. Upload a package of this theme in Appearance > Themes > Add New > Upload Theme.
2. Activate the theme.
3. Set menus in Appearance > Menus.
4. Configure footer/contact options in Appearance > Customize.
5. Create an Elements Library page and use the starter HTML snippets in the Classic Editor's Text/HTML mode.
6. To use a home design, assign Long Editorial Home, Home Editorial, Home Mosaic, or Home Stream under Page Attributes. Then set that page as the static homepage in Settings > Reading.

== Resources ==
The theme uses local system font stacks. It does not request Google Fonts.

This package bundles no stock photography and no remote demo images. The included screenshot is generated for theme presentation and is GPL-compatible as part of the theme package.

== Privacy ==
The theme does not collect analytics, does not set tracking cookies, and does not store front-end user preferences. The theme does not request external font files.

== Changelog ==
= 1.4.0 =
* Added a long article-led homepage with nine editorial arrangements of real posts. The original three home templates remain available separately.
* Added soft blue, green, and yellow section bands with system sans-serif typography.
* Kept decorative marks and navigation icons as text characters.

= 1.3.0 =
* Ran a real WordPress Studio trial with three home templates, posts, menus, widgets, category archives, search, 404, and mobile navigation.
* Rebalanced text-only homepage spacing, widget bands, header navigation, and dark/light section contrast.
* Consolidated responsive menu and runtime hardening CSS so release styles are not layered as late patch blocks.
* Cleaned homepage template source comments and indentation while preserving classic WordPress editability.
* Updated release documentation, screenshot, and package evidence.

= 1.2.2 =
* Fixed manual homepage and related-post loops so template tags render the queried post instead of the current page.
* Reworked page templates to preserve page content editing.
* Moved homepage section headings into Customizer settings.
* Added optional homepage widget areas.
* Removed fixed demo URLs from starter snippets.
* Added Custom Logo support and tightened footer widget output.
* Fixed the CSS lint script so it does not scan dependencies.

= 1.2.1 =
* Converted the automatic front-page layout into a selectable Home Editorial page template so static homepage templates work as expected.
* Added ABSPATH guards to PHP files.
* Fixed Header CTA default behavior.
* Improved parent/child theme stylesheet loading.
* Removed hard-coded homepage category slugs and added Customizer category selectors.
* Made dynamic homepage/template output escaping more explicit.
* Added no-JavaScript navigation fallback styles.
* Added visible author-comment styling.
* Replaced the short license note with the full GPLv2 text.
* Added reproducible testing configuration files.

= 1.1.0 =
* Added final compliance pass for the three home page designs.
* Kept SEO metadata, canonical URLs, Open Graph, Twitter Cards, XML sitemaps, analytics, and structured data out of the theme.
* Disabled Google Fonts and header CTA by default for a faster and cleaner first install.
* Replaced AJAX-style archive remnants with standard WordPress pagination.
* Improved query performance for home page templates.
* Improved contrast in dark hero areas and Stream ranking lists.
* Added empty states for home page templates when no posts are available.
* Added Chinese user manual and acceptance report.

= 1.0.0 =
* Clean text-only fork.
* Removed non-presentational metadata systems and experimental front-end enhancements.
* Disabled automatic featured-image output and removed post thumbnail theme support.
* Unified text domain as `editorialplus`.
