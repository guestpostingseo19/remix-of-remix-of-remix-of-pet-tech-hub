import { Link } from "@tanstack/react-router";
import { posts } from "@/content/posts";

export function BlogPreview() {
  const latest = posts.slice(0, 3);

  return (
    <section className="border-t border-hairline bg-surface">
      <div className="mx-auto max-w-6xl px-5 py-24">
        <div className="flex flex-wrap items-end justify-between gap-4">
          <div>
            <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
              Journal
            </span>
            <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
              Field notes on pet technology
            </h2>
          </div>
          <Link
            to="/blog"
            className="text-sm font-semibold text-primary hover:text-signal"
          >
            All articles →
          </Link>
        </div>

        <div className="mt-12 grid gap-6 md:grid-cols-3">
          {latest.map((p) => (
            <Link
              key={p.slug}
              to="/blog/$slug"
              params={{ slug: p.slug }}
              className="group overflow-hidden rounded-2xl hairline bg-background transition-colors hover:border-primary/60"
            >
              <img
                src={p.cover}
                alt={p.coverAlt}
                loading="lazy"
                width={1280}
                height={720}
                className="h-40 w-full object-cover opacity-85 transition-opacity group-hover:opacity-100"
              />
              <div className="p-6">
                <span className="text-[11px] font-semibold uppercase tracking-[0.16em] text-primary">
                  {p.category}
                </span>
                <h3 className="mt-2.5 font-display text-lg font-semibold leading-snug">
                  {p.title}
                </h3>
                <p className="mt-2 text-sm leading-relaxed text-muted-foreground">
                  {p.excerpt}
                </p>
              </div>
            </Link>
          ))}
        </div>
      </div>
    </section>
  );
}
