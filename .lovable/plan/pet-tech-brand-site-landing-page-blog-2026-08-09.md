# Pet Tech Brand Site — Landing Page + Blog

A futuristic, single-page marketing site for a pet technology service, plus a blog section, with AI-generated imagery and a full brand system.

## Keyword research (Semrush, US market)

Best opportunities found:

| Keyword | Volume/mo | Difficulty | Use |
|---|---|---|---|
| pet camera | 9,900 | 46 | Feature section |
| pet gps tracker | 4,400 | 32 | Primary hero keyword |
| smart pet feeder | 880 | 36 | Feature section |
| smart collar for dogs | 720 | 45 | Product/feature |
| pet telehealth | 480 ($5.79 CPC) | 39 | Service section — highest commercial value |
| dog activity tracker | 390 | 33 | Feature |
| pet tech | 590 | 35 | Brand/about |
| pet health monitoring | 30 | 15 | Easy win — blog post |
| ai pet health | 20 | 0 | Easy win — blog post |

Strategy: target "pet gps tracker" and "pet telehealth" on the landing page (real volume, achievable difficulty), and use the very-low-difficulty terms ("pet health monitoring", "ai pet health") as blog posts a new site can actually rank for.

## Branding

- Name: **Vetra** — AI pet care, connected.
- Palette: deep space navy base with bio-luminescent aqua and signal-lime accents (futuristic, not generic purple gradient).
- Typography: Space Grotesk headings / DM Sans body.
- Visual language: dark surfaces, thin glowing hairline borders, subtle grid, telemetry-style stat readouts, restrained motion (glow pulses, scroll reveals).
- Custom SVG wordmark, no default shadcn button styling.

## Pages

**`/` — landing (single page, anchor-scrolled)**
1. Nav with wordmark + anchors + one CTA
2. Hero: "Real-time GPS tracking and AI health monitoring for your pet" + generated hero image
3. Live telemetry stat band (heart rate, steps, location fix)
4. Features: GPS tracker, smart collar, pet camera, smart feeder — each with generated image
5. Pet telehealth service section (24/7 vet access)
6. How it works — 3 steps
7. Pricing — 3 tiers
8. FAQ (targets question keywords, feeds FAQPage schema)
9. Blog preview — 3 latest posts
10. Footer CTA

**`/blog` — index** listing all posts.
**`/blog/$slug` — post page**, 4 seeded posts:
- Pet Health Monitoring: What the Data Actually Tells You
- AI Pet Health: How Machine Learning Spots Illness Early
- Choosing a Pet GPS Tracker in 2026
- Pet Telehealth vs. the Clinic Visit

Posts are static content in a typed local file — no backend needed.

## SEO

- Unique `head()` per route: title, description, og:title/description, og:type, og:url, canonical on leaves.
- Organization + WebSite JSON-LD at root; Article + BreadcrumbList on posts; FAQPage on landing.
- Single H1 per page, semantic sections, alt text on every image, lazy loading below the fold.
- `robots.txt` and `sitemap.xml` covering all routes.

## Technical notes

- Tokens defined in `src/styles.css` as oklch semantic variables (no hardcoded colors in components).
- Fonts loaded via `<link>` in `__root.tsx`.
- Images generated with the image tool into `src/assets/` and imported: hero, 4 feature visuals, 4 blog covers.
- Routes: rewrite `src/routes/index.tsx`, add `src/routes/blog.index.tsx` and `src/routes/blog.$slug.tsx`; content in `src/content/posts.ts`.
- Sections split into components under `src/components/`.
- No database or auth — fully static.
