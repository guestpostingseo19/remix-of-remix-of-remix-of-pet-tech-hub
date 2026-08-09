import { Link } from "@tanstack/react-router";
import heroCollar from "@/assets/hero-collar.jpg";

export function Hero() {
  return (
    <section className="relative overflow-hidden aurora">
      <div className="pointer-events-none absolute inset-0 grid-field opacity-40" />
      <div className="relative mx-auto grid max-w-6xl items-center gap-14 px-5 py-20 lg:grid-cols-[1.05fr_1fr] lg:py-28">
        <div>
          <span className="inline-flex items-center gap-2 rounded-full hairline bg-surface/70 px-3 py-1.5 text-xs font-medium tracking-wide text-muted-foreground">
            <span className="pulse-dot h-1.5 w-1.5 rounded-full bg-signal" />
            Live telemetry · 142 countries
          </span>

          <h1 className="mt-6 font-display text-4xl font-bold leading-[1.05] sm:text-5xl lg:text-6xl">
            <span className="text-gradient">Pet GPS tracking</span> and AI health
            monitoring in one collar
          </h1>

          <p className="mt-6 max-w-xl text-base leading-relaxed text-muted-foreground sm:text-lg">
            Vetra streams your pet's location, heart rate, respiration and sleep to a
            model that learns their personal baseline — then connects you to a licensed
            vet the moment something drifts.
          </p>

          <div className="mt-9 flex flex-wrap items-center gap-4">
            <a
              href="#pricing"
              className="rounded-full bg-primary px-6 py-3 text-sm font-semibold text-primary-foreground transition-shadow hover:glow-ring"
            >
              Start monitoring
            </a>
            <Link
              to="/blog"
              className="rounded-full hairline px-6 py-3 text-sm font-semibold text-foreground transition-colors hover:border-primary hover:text-primary"
            >
              Read the journal
            </Link>
          </div>
        </div>

        <div className="relative">
          <div className="absolute -inset-6 rounded-4xl bg-primary/10 blur-3xl" />
          <img
            src={heroCollar}
            width={1600}
            height={1200}
            alt="Dog wearing a Vetra smart collar with glowing aqua LED and floating health telemetry readouts"
            className="relative w-full rounded-3xl hairline object-cover glow-soft"
          />
        </div>
      </div>
    </section>
  );
}
