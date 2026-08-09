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
              Connected pet care. GPS tracking, AI health monitoring and 24/7 veterinary
              telehealth in one collar.
            </p>
          </div>

          <div className="grid grid-cols-2 gap-10 text-sm sm:grid-cols-3">
            <div>
              <h3 className="mb-3 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
                Platform
              </h3>
              <ul className="space-y-2 text-muted-foreground">
                <li>
                  <a href="/#platform" className="hover:text-foreground">
                    GPS tracker
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="hover:text-foreground">
                    Smart collar
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="hover:text-foreground">
                    Pet camera
                  </a>
                </li>
                <li>
                  <a href="/#platform" className="hover:text-foreground">
                    Smart feeder
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
                  <a href="/#telehealth" className="hover:text-foreground">
                    Pet telehealth
                  </a>
                </li>
                <li>
                  <a href="/#how" className="hover:text-foreground">
                    How it works
                  </a>
                </li>
                <li>
                  <a href="/#faq" className="hover:text-foreground">
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
                  <Link to="/blog" className="hover:text-foreground">
                    Journal
                  </Link>
                </li>
                <li>
                  <a href="/#pricing" className="hover:text-foreground">
                    Pricing
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <p className="mt-12 border-t border-hairline pt-6 text-xs text-muted-foreground">
          © {new Date().getFullYear()} Vetra Pet Technologies. Vetra is not a substitute
          for emergency veterinary care.
        </p>
      </div>
    </footer>
  );
}
