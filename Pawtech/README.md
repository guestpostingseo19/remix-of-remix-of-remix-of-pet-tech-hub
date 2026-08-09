# PawTech — WordPress Theme

A production-ready, security-hardened WordPress theme that is a 1:1 port of the PawTech
marketing site: same layout, same type scale, same OKLCH colour system, same motion,
plus day/night theming, a complete blog, and native Elementor widgets for every section.

---

## 1. Install

1. Zip the folder so the archive contains a single `Pawtech/` directory:
   ```bash
   zip -r pawtech.zip Pawtech -x "*.DS_Store" "Pawtech/assets/src/*"
   ```
2. WordPress admin → **Appearance → Themes → Add New → Upload Theme** → choose `pawtech.zip` → **Install** → **Activate**.
3. (Recommended) Install and activate **Elementor** (free) to edit sections visually.

Requirements: WordPress 6.0+, PHP 7.4+ (tested through PHP 8.4).

## 2. First-run setup (5 minutes)

| Step | Where |
| --- | --- |
| Create a `Home` page and a `Blog` page | Pages → Add New |
| Set them as front page / posts page | Settings → Reading → *A static page* |
| Permalinks → **Post name** | Settings → Permalinks |
| Upload logo, edit hero text, CTA labels, footer note | Appearance → Customize → **PawTech** panel |
| Build the menus (`Primary`, `Footer`) | Appearance → Menus |

If no static front page is set, `front-page.php` renders the full landing page automatically
with the built-in defaults, so the theme looks complete the moment it is activated.

## 3. Editing content

### A. WordPress dashboard (no page builder)
Every landing-section string is a Customizer setting under **Appearance → Customize → PawTech**
(hero eyebrow, headline, sub-headline, both CTA labels/links, hero image, footer note, and the
theme's default colour mode). Posts, categories, featured images, menus, widgets and comments all
behave like a standard WordPress theme.

### B. Elementor
The theme registers a **PawTech** widget category containing:

- PawTech Hero
- PawTech Stat Band
- PawTech Services Grid
- PawTech Vet Calls
- PawTech How It Works
- PawTech Pricing
- PawTech FAQ
- PawTech Journal Preview

Drag any of them onto a page; every text, image, link and repeater row (stats, services, steps,
plans with feature lists, FAQ entries) is editable in the Elementor panel and renders through the
exact same template part as the front page — so builder output is pixel-identical to the original.

Use the **PawTech Landing** or **Full Width** page template for edge-to-edge Elementor canvases.

## 4. Structure

```
Pawtech/
├── style.css                  theme header (child-theme friendly)
├── functions.php              bootstrap, loads inc/*
├── front-page.php             landing page composition
├── home.php archive.php search.php single.php page.php 404.php
├── header.php footer.php sidebar.php comments.php searchform.php
├── template-landing.php       full-width landing template
├── template-full-width.php    full-width builder template
├── inc/
│   ├── theme-setup.php        supports, menus, image sizes, nav walker
│   ├── enqueue.php            fonts, compiled CSS, JS, no-flash theme bootstrap
│   ├── template-functions.php content defaults + helpers
│   ├── customizer.php         dashboard editing of landing content
│   ├── security.php           hardening (see below)
│   ├── elementor.php          category + widget registration
│   └── elementor/             widget base class + 8 widgets
├── template-parts/
│   ├── sections/*.php         hero, stats, features, telehealth, how-it-works,
│   │                          pricing, faq, blog-preview, cta
│   └── content-card.php, content-none.php, wordmark.php, theme-toggle.php
├── assets/
│   ├── css/theme.css          compiled Tailwind v4 build (shipped)
│   ├── src/tailwind.css       CSS source (dev only, safe to delete before zipping)
│   ├── js/theme.js            theme toggle, scroll reveal, mobile nav (no deps)
│   └── images/                bundled artwork
└── languages/                 .pot-ready, fully translatable (text domain: pawtech)
```

## 5. Security

`inc/security.php` applies, all filterable:

- Direct-access guard (`defined( 'ABSPATH' ) || exit`) in **every** PHP file.
- Output escaping on 100% of dynamic output (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
- Input sanitising on every Customizer setting and every Elementor widget value.
- XML-RPC disabled; pingback header and pingback methods removed.
- REST API user enumeration blocked for unauthenticated requests; `?author=N` scans blocked.
- WordPress version fingerprint removed from head, feeds, scripts and styles.
- Login errors made generic (no username/password disclosure).
- File editing in the dashboard disabled (`DISALLOW_FILE_EDIT`).
- Security headers: `X-Content-Type-Options`, `X-Frame-Options: SAMEORIGIN`,
  `Referrer-Policy`, `Permissions-Policy`, plus `Strict-Transport-Security` on HTTPS.
- Uploads restricted from executable MIME types; SVG uploads are **not** enabled by design.
- Nonce + capability checks on every admin-side action; no raw `$_GET`/`$_POST` use.
- No `eval`, no remote code loading, no bundled third-party libraries, no tracking.

## 6. Rebuilding the CSS (optional)

Styles are pre-compiled and shipped; you only need this if you edit `assets/src/tailwind.css`
or add new utility classes in PHP:

```bash
npx @tailwindcss/cli@4 -i assets/src/tailwind.css -o assets/css/theme.css --minify
```

## 7. Child theme

```css
/*
Theme Name: PawTech Child
Template: Pawtech
*/
```
Enqueue the parent style from the child's `functions.php`; all template parts are overridable
via `get_template_part()` lookup order.

## 8. License

GPL-2.0-or-later. Bundled images are included for use with this theme.
