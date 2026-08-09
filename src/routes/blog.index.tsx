import { createFileRoute, Link } from "@tanstack/react-router";
import { SiteHeader } from "@/components/SiteHeader";
import { SiteFooter } from "@/components/SiteFooter";
import { posts } from "@/content/posts";

const title = "Vetra Journal — Pet Tech, Health Monitoring & GPS Guides";
const description =
  "Practical writing on pet technology: AI pet health monitoring, choosing a pet GPS tracker, smart collars and when pet telehealth beats a clinic visit.";

export const Route = createFileRoute("/blog/")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/blog" },
      { name: "twitter:card", content: "summary_large_image" },
    ],
    links: [{ rel: "canonical", href: "/blog" }],
  }),
  component: BlogIndex,
});

function BlogIndex() {
  return (
    <div className="min-h-screen bg-background">
      <SiteHeader />
      <main>
        <section className="aurora border-b border-hairline">
          <div className="mx-auto max-w-4xl px-5 py-20">
            <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
              Journal
            </span>
            <h1 className="mt-4 font-display text-4xl font-bold sm:text-5xl">
              Pet tech, explained without the marketing
            </h1>
            <p className="mt-5 max-w-2xl text-muted-foreground">
              What the sensors actually measure, what the models can and cannot see, and
              how to spend sensibly on connected pet care.
            </p>
          </div>
        </section>

        <div className="mx-auto max-w-4xl px-5 py-16">
          <ul className="space-y-6">
            {posts.map((p) => (
              <li key={p.slug}>
                <Link
                  to="/blog/$slug"
                  params={{ slug: p.slug }}
                  className="group grid gap-6 overflow-hidden rounded-2xl hairline bg-surface transition-colors hover:border-primary/60 sm:grid-cols-[240px_1fr]"
                >
                  <img
                    src={p.cover}
                    alt={p.coverAlt}
                    loading="lazy"
                    width={1280}
                    height={720}
                    className="h-44 w-full object-cover opacity-85 transition-opacity group-hover:opacity-100 sm:h-full"
                  />
                  <div className="p-6 sm:pl-0 sm:pr-7">
                    <div className="flex items-center gap-3 text-[11px] font-semibold uppercase tracking-[0.16em] text-primary">
                      <span>{p.category}</span>
                      <span className="text-muted-foreground">{p.readingTime}</span>
                    </div>
                    <h2 className="mt-3 font-display text-xl font-semibold leading-snug">
                      {p.title}
                    </h2>
                    <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                      {p.excerpt}
                    </p>
                  </div>
                </Link>
              </li>
            ))}
          </ul>
        </div>
      </main>
      <SiteFooter />
    </div>
  );
}
