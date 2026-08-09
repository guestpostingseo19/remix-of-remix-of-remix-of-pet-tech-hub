import { Link } from "@tanstack/react-router";
import { Wordmark } from "./Wordmark";
import { ThemeToggle } from "./ThemeToggle";


const links = [
  { label: "Services", href: "/#platform" },
  { label: "Vet calls", href: "/#telehealth" },
  { label: "Plans", href: "/#pricing" },
];

export function SiteHeader() {
  return (
    <header className="sticky top-0 z-50 border-b border-hairline bg-background/80 backdrop-blur-xl">
      <div className="mx-auto flex h-16 max-w-6xl items-center justify-between px-5">
        <Link to="/" aria-label="PawTech home">
          <Wordmark />
        </Link>

        <nav aria-label="Primary" className="hidden items-center gap-8 md:flex">
          {links.map((l) => (
            <a
              key={l.href}
              href={l.href}
              className="story-link text-sm text-muted-foreground transition-colors hover:text-primary"
            >
              {l.label}
            </a>
          ))}
          <Link
            to="/blog"
            className="story-link text-sm text-muted-foreground transition-colors hover:text-primary"
            activeProps={{ className: "text-sm text-primary" }}
          >
            Journal
          </Link>
        </nav>

        <div className="flex items-center gap-3">
          <ThemeToggle />
          <a
            href="/#pricing"
            className="rounded-full bg-primary px-4 py-2 text-sm font-semibold text-primary-foreground transition-all duration-300 hover:-translate-y-0.5 hover:glow-ring"
          >
            Join PawTech
          </a>
        </div>

      </div>
    </header>
  );
}
