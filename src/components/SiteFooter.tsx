import { Link } from "@tanstack/react-router";
import { Wordmark } from "./Wordmark";

export function SiteFooter() {
  return (
    <footer className="border-t border-hairline bg-surface">
      <div className="mx-auto max-w-6xl px-5 py-14">
        <div className="flex flex-col gap-10 md:flex-row md:justify-between">
          <div className="max-w-xs">
            <Wordmark />
            <p className="mt-4 text-sm leading-relaxed text-muted-foreground">
              A pet care service. We track your pet, watch their health every day, and put
              a real vet on the line when you need one.
            </p>
          </div>

          <div className="grid grid-cols-2 gap-10 text-sm sm:grid-cols-3">
            <div>
              <h3 className="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                Services
              </h3>
              <ul className="space-y-2 text-muted-foreground">
                <li>
                  <a href="/#platform" className="transition-colors hover:text-foreground">
                    Live tracking
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="transition-colors hover:text-foreground">
                    Daily health watch
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="transition-colors hover:text-foreground">
                    Home check-ins
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="transition-colors hover:text-foreground">
                    Food coaching
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                Care
              </h3>
              <ul className="space-y-2 text-muted-foreground">
                <li>
                  <a
                    href="/#telehealth"
                    className="transition-colors hover:text-foreground"
                  >
                    Vet video calls
                  </a>
                </li>
                <li>
                  <a href="/#how" className="transition-colors hover:text-foreground">
                    How it works
                  </a>
                </li>
                <li>
                  <a href="/#faq" className="transition-colors hover:text-foreground">
                    FAQ
                  </a>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                Company
              </h3>
              <ul className="space-y-2 text-muted-foreground">
                <li>
                  <Link to="/blog" className="transition-colors hover:text-foreground">
                    Journal
                  </Link>
                </li>
                <li>
                  <a href="/#pricing" className="transition-colors hover:text-foreground">
                    Plans
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <p className="mt-12 border-t border-hairline pt-6 text-xs text-muted-foreground">
          © {new Date().getFullYear()} PawTech Pet Care Services. PawTech does not replace
          emergency vet care.
        </p>
      </div>
    </footer>
  );
}
