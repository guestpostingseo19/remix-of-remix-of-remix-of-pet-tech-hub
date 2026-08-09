const tiers = [
  {
    name: "Track",
    price: "$9",
    tagline: "Location, nothing more.",
    features: [
      "Live GPS at 2.4s refresh",
      "Unlimited geofences",
      "Escape alerts",
      "90-day location history",
    ],
    featured: false,
  },
  {
    name: "Signal",
    price: "$19",
    tagline: "Tracking plus AI health monitoring.",
    features: [
      "Everything in Track",
      "Continuous vitals + sleep analysis",
      "AI baseline anomaly alerts",
      "Unlimited vet telehealth calls",
      "Shareable vet health report",
    ],
    featured: true,
  },
  {
    name: "Clinic",
    price: "$34",
    tagline: "Multi-pet households and breeders.",
    features: [
      "Everything in Signal",
      "Up to 8 pets on one account",
      "Camera + feeder automation",
      "Priority vet routing",
      "Annual veterinary data review",
    ],
    featured: false,
  },
];

export function Pricing() {
  return (
    <section id="pricing" className="scroll-mt-20 border-y border-hairline bg-surface">
      <div className="mx-auto max-w-6xl px-5 py-24">
        <div className="max-w-xl">
          <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
            Pricing
          </span>
          <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
            Hardware included. Cancel any month.
          </h2>
          <p className="mt-4 text-muted-foreground">
            Every plan ships the collar at no upfront cost. Prices are per pet, per month,
            billed annually.
          </p>
        </div>

        <div className="mt-14 grid gap-6 lg:grid-cols-3">
          {tiers.map((t) => (
            <div
              key={t.name}
              className={`rounded-2xl p-7 ${
                t.featured
                  ? "border border-primary/60 bg-background glow-ring"
                  : "hairline bg-background"
              }`}
            >
              <div className="flex items-center justify-between">
                <h3 className="font-display text-xl font-semibold">{t.name}</h3>
                {t.featured && (
                  <span className="rounded-full bg-signal px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-signal-foreground">
                    Most chosen
                  </span>
                )}
              </div>
              <p className="mt-2 text-sm text-muted-foreground">{t.tagline}</p>

              <div className="mt-6 flex items-baseline gap-1.5">
                <span className="font-display text-4xl font-bold text-primary">
                  {t.price}
                </span>
                <span className="text-sm text-muted-foreground">/mo</span>
              </div>

              <ul className="mt-7 space-y-3">
                {t.features.map((f) => (
                  <li key={f} className="flex gap-3 text-sm text-muted-foreground">
                    <span className="mt-2 h-1 w-1 shrink-0 rounded-full bg-primary" />
                    <span>{f}</span>
                  </li>
                ))}
              </ul>

              <a
                href="#pricing"
                className={`mt-8 block rounded-full px-5 py-3 text-center text-sm font-semibold transition-colors ${
                  t.featured
                    ? "bg-primary text-primary-foreground"
                    : "hairline text-foreground hover:border-primary hover:text-primary"
                }`}
              >
                Choose {t.name}
              </a>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
