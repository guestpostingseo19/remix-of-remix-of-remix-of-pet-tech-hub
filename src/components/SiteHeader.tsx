import { Link } from "@tanstack/react-router";
import { Wordmark } from "./Wordmark";

const links = [
  { label: "Platform", href: "/#platform" },
  { label: "Telehealth", href: "/#telehealth" },
  { label: "Pricing", href: "/#pricing" },
];

export function SiteHeader() {
  return (
    <header className="sticky top-0 z-50 border-b border-hairline bg-background/80 backdrop-blur-xl">
      <div className="mx-auto flex h-16 max-w-6xl items-center justify-between px-5">
        <Link to="/" aria-label="Vetra home">
          <Wordmark />
        </Link>

        <nav aria-label="Primary" className="hidden items-center gap-8 md:flex">
          {links.map((l) => (
            <a
              key={l.href}
              href={l.href}
              className="text-sm text-muted-foreground transition-colors hover:text-primary"
            >
              {l.label}
            </a>
          ))}
          <Link
            to="/blog"
            className="text-sm text-muted-foreground transition-colors hover:text-primary"
            activeProps={{ className: "text-sm text-primary" }}
          >
            Journal
          </Link>
        </nav>

        <a
          href="/#pricing"
          className="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground transition-shadow hover:glow-ring"
        >
          Get Vetra
        </a>
      </div>
    </header>
  );
}
