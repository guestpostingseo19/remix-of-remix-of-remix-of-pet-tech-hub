import { Reveal } from "@/components/Reveal";

const tiers = [
  {
    name: "Track",
    price: "$9",
    tagline: "Just know where they are.",
    features: [
      "Live map, updated every 2.4 seconds",
      "As many safe zones as you like",
      "Alerts when your pet wanders off",
      "90 days of past routes",
    ],
    featured: false,
  },
  {
    name: "Care",
    price: "$19",
    tagline: "Tracking plus daily health checks.",
    features: [
      "Everything in Track",
      "Daily heart, breathing and sleep checks",
      "Early warnings in plain words",
      "Unlimited vet video calls",
      "A health summary you can share with your vet",
    ],
    featured: true,
  },
  {
    name: "Family",
    price: "$34",
    tagline: "For homes with more than one pet.",
    features: [
      "Everything in Care",
      "Up to 8 pets on one account",
      "Home check-ins and feeding plans",
      "You skip the line for vet calls",
      "A yearly health review",
    ],
    featured: false,
  },
];

export function Pricing() {
  return (
    <section id="pricing" className="scroll-mt-20 border-y border-hairline bg-surface">
      <div className="mx-auto max-w-6xl px-5 py-24">
        <Reveal className="max-w-xl">
          <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
            Plans
          </span>
          <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
            Simple monthly service. Stop any time.
          </h2>
          <p className="mt-4 text-muted-foreground">
            There is nothing to buy. Prices are per pet, per month. No long contract and no
            setup fee.
          </p>
        </Reveal>

        <div className="mt-14 grid gap-6 lg:grid-cols-3">
          {tiers.map((t, i) => (
            <Reveal key={t.name} delay={i * 110}>
              <div
                className={`h-full rounded-2xl p-7 transition-all duration-500 hover:-translate-y-2 ${
                  t.featured
                    ? "border border-primary/60 bg-background glow-ring"
                    : "hairline bg-background hover:border-primary/60"
                }`}
              >
                <div className="flex items-center justify-between">
                  <h3 className="font-display text-xl font-semibold">{t.name}</h3>
                  {t.featured && (
                    <span className="rounded-full bg-signal px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em] text-signal-foreground">
                      Most picked
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
                  className={`mt-8 block rounded-full px-5 py-3 text-center text-sm font-semibold transition-all duration-300 ${
                    t.featured
                      ? "bg-primary text-primary-foreground hover:glow-ring"
                      : "hairline text-foreground hover:border-primary hover:text-primary"
                  }`}
                >
                  Start {t.name}
                </a>
              </div>
            </Reveal>
          ))}
        </div>
      </div>
    </section>
  );
}
