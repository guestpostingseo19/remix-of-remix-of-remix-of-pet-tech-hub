import { createFileRoute, Link, notFound } from "@tanstack/react-router";
import { SiteHeader } from "@/components/SiteHeader";
import { SiteFooter } from "@/components/SiteFooter";
import { getPost } from "@/content/posts";

export const Route = createFileRoute("/blog/$slug")({
  loader: ({ params }) => {
    const post = getPost(params.slug);
    if (!post) throw notFound();
    return { post };
  },
  head: ({ params, loaderData }) => {
    if (!loaderData) {
      return {
        meta: [{ title: "Article not found — Vetra" }, { name: "robots", content: "noindex" }],
      };
    }
    const { post } = loaderData;
    const url = `/blog/${params.slug}`;
    return {
      meta: [
        { title: `${post.title} — Vetra Journal` },
        { name: "description", content: post.description },
        { property: "og:title", content: post.title },
        { property: "og:description", content: post.description },
        { property: "og:type", content: "article" },
        { property: "og:url", content: url },
        { name: "twitter:card", content: "summary_large_image" },
      ],
      links: [{ rel: "canonical", href: url }],
      scripts: [
        {
          type: "application/ld+json",
          children: JSON.stringify({
            "@context": "https://schema.org",
            "@type": "Article",
            headline: post.title,
            description: post.description,
            datePublished: post.date,
            author: { "@type": "Organization", name: "Vetra" },
          }),
        },
        {
          type: "application/ld+json",
          children: JSON.stringify({
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            itemListElement: [
              { "@type": "ListItem", position: 1, name: "Home", item: "/" },
              { "@type": "ListItem", position: 2, name: "Journal", item: "/blog" },
              { "@type": "ListItem", position: 3, name: post.title, item: url },
            ],
          }),
        },
      ],
    };
  },
  notFoundComponent: PostNotFound,
  component: PostPage,
});

function PostNotFound() {
  return (
    <div className="min-h-screen bg-background">
      <SiteHeader />
      <main className="mx-auto max-w-3xl px-5 py-32 text-center">
        <h1 className="font-display text-3xl font-bold">That article doesn't exist</h1>
        <Link to="/blog" className="mt-6 inline-block text-sm font-semibold text-primary">
          Back to the journal →
        </Link>
      </main>
      <SiteFooter />
    </div>
  );
}

function PostPage() {
  const { post } = Route.useLoaderData();

  return (
    <div className="min-h-screen bg-background">
      <SiteHeader />
      <main>
        <article>
          <header className="aurora border-b border-hairline">
            <div className="mx-auto max-w-3xl px-5 py-16">
              <Link
                to="/blog"
                className="text-xs font-semibold uppercase tracking-[0.16em] text-primary"
              >
                ← Journal
              </Link>
              <h1 className="mt-6 font-display text-3xl font-bold leading-tight sm:text-4xl">
                {post.title}
              </h1>
              <p className="mt-4 text-muted-foreground">{post.excerpt}</p>
              <div className="mt-6 flex items-center gap-3 text-xs uppercase tracking-[0.16em] text-muted-foreground">
                <span>{post.category}</span>
                <span className="h-1 w-1 rounded-full bg-signal" />
                <time dateTime={post.date}>
                  {new Date(post.date).toLocaleDateString("en-US", {
                    year: "numeric",
                    month: "long",
                    day: "numeric",
                  })}
                </time>
                <span className="h-1 w-1 rounded-full bg-signal" />
                <span>{post.readingTime}</span>
              </div>
            </div>
          </header>

          <div className="mx-auto max-w-3xl px-5 py-14">
            <img
              src={post.cover}
              alt={post.coverAlt}
              loading="lazy"
              width={1280}
              height={720}
              className="w-full rounded-2xl hairline object-cover"
            />

            <div className="mt-14 space-y-12">
              {post.sections.map((s) => (
                <section key={s.heading}>
                  <h2 className="font-display text-2xl font-semibold">{s.heading}</h2>
                  {s.paragraphs.map((p) => (
                    <p key={p} className="mt-4 leading-relaxed text-muted-foreground">
                      {p}
                    </p>
                  ))}
                  {s.bullets && (
                    <ul className="mt-5 space-y-3">
                      {s.bullets.map((b) => (
                        <li key={b} className="flex gap-3 text-muted-foreground">
                          <span className="mt-2.5 h-1.5 w-1.5 shrink-0 rounded-full bg-signal" />
                          <span>{b}</span>
                        </li>
                      ))}
                    </ul>
                  )}
                </section>
              ))}
            </div>

            <aside className="mt-16 rounded-2xl hairline bg-surface p-8">
              <h2 className="font-display text-xl font-semibold">
                Put this into practice
              </h2>
              <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                Vetra tracks location, vitals and sleep continuously, and puts a licensed
                vet on the line when the numbers drift.
              </p>
              <a
                href="/#pricing"
                className="mt-6 inline-block rounded-full bg-primary px-5 py-2.5 text-sm font-semibold text-primary-foreground"
              >
                See plans
              </a>
            </aside>
          </div>
        </article>
      </main>
      <SiteFooter />
    </div>
  );
}
