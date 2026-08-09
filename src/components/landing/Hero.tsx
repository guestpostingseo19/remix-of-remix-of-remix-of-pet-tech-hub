import { Link } from "@tanstack/react-router";
import heroCollar from "@/assets/hero-collar.jpg";
import logo from "@/assets/pawtech-logo.png";

export function Hero() {
  return (
    <section className="relative overflow-hidden aurora">
      <div className="pointer-events-none absolute inset-0 grid-field opacity-40" />
      <div className="pointer-events-none absolute -left-24 top-10 h-72 w-72 rounded-full bg-primary/15 blur-3xl float-slow" />
      <div className="pointer-events-none absolute -right-16 bottom-0 h-64 w-64 rounded-full bg-signal/10 blur-3xl float-slow [animation-delay:1.5s]" />

      <div className="relative mx-auto grid max-w-6xl items-center gap-14 px-5 py-20 lg:grid-cols-[1.05fr_1fr] lg:py-28">
        <div className="rise-in">
          <span className="inline-flex items-center gap-2 rounded-full hairline bg-surface/70 px-3 py-1.5 text-xs font-medium tracking-wide text-muted-foreground">
            <span className="pulse-dot h-1.5 w-1.5 rounded-full bg-signal" />
            Pet care service · open 24 hours
          </span>

          <h1 className="mt-6 font-display text-4xl font-bold leading-[1.05] sm:text-5xl lg:text-6xl">
            <span className="text-gradient shimmer">Watch your pet</span> and talk to a vet,
            any time
          </h1>

          <p className="mt-6 max-w-xl text-base leading-relaxed text-muted-foreground sm:text-lg">
            PawTech is a pet care service. We keep an eye on where your pet is and how they
            feel. If something looks wrong, we tell you and a real vet joins the call.
          </p>

          <div className="mt-9 flex flex-wrap items-center gap-4">
            <a
              href="#pricing"
              className="rounded-full bg-primary px-6 py-3 text-sm font-semibold text-primary-foreground transition-all duration-300 hover:-translate-y-0.5 hover:glow-ring"
            >
              See our plans
            </a>
            <Link
              to="/blog"
              className="rounded-full hairline px-6 py-3 text-sm font-semibold text-foreground transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary"
            >
              Read the journal
            </Link>
          </div>

          <p className="mt-6 text-xs text-muted-foreground">
            No gear to buy. Works with the collar or tag you already have.
          </p>
        </div>

        <div className="group relative rise-in [animation-delay:150ms]">
          <div className="absolute -inset-6 rounded-4xl bg-primary/10 blur-3xl transition-all duration-700 group-hover:bg-primary/20" />
          <img
            src={heroCollar}
            width={1600}
            height={1200}
            alt="Happy dog resting in warm evening light while the PawTech care service watches over them"
            className="relative w-full rounded-3xl hairline object-cover glow-soft transition-transform duration-700 group-hover:scale-[1.02]"
          />
          <div className="absolute -bottom-6 -left-4 flex items-center gap-3 rounded-2xl hairline bg-surface/90 px-4 py-3 backdrop-blur-md float-slow">
            <img
              src={logo}
              alt=""
              width={64}
              height={64}
              className="h-8 w-8 object-contain"
            />
            <div>
              <div className="text-xs font-semibold text-foreground">All good today</div>
              <div className="text-[11px] text-muted-foreground">Heart rate is normal</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
