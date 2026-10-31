# Testing checklist

Use this checklist in a real local WordPress installation before deploying the theme.

1. Activate the theme with WP_DEBUG enabled.
2. Confirm no PHP warnings or notices are written to `wp-content/debug.log`.
3. Create Home Editorial, Home Mosaic, Home Stream, Blog, Elements, and Contact pages.
4. Assign the Elements Library template to the Elements page.
5. Assign the Home Editorial, Home Mosaic, and Home Stream templates to three test pages.
6. Create a primary menu with at least one second-level submenu.
7. Add widgets to Sidebar and Footer Column 1-3.
8. Paste starter HTML snippets into an Editorial Canvas page in Text/HTML mode.
9. Create posts with long titles, excerpts, tables, blockquotes, code blocks, captions, embeds, pagination, password protection, and comments.
10. Run Theme Check.
11. Run PHPCS with WordPress Coding Standards, WordPress-Extra, WordPress-Docs, PHPCompatibilityWP, and WordPressVIPMinimum when available.
12. Run Stylelint and JavaScript syntax checks.
13. Import WordPress Theme Test Data for extreme content cases, then check home, archive, search, 404, single, page, comments, password-protected, and gallery pages.
14. Run axe or an equivalent WCAG scanner on desktop and mobile pages.
15. Run Lighthouse for performance, accessibility, best practices, and basic SEO.
16. After deployment to a public URL, run PageSpeed Insights and Search Console URL Inspection against the production URL.
17. If an SEO plugin adds structured data, test those production URLs with Google's Rich Results Test.
