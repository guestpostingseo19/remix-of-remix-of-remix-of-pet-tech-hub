const steps = [
  {
    n: "01",
    title: "Clip it on",
    copy: "The collar pairs in about forty seconds and starts streaming immediately. No hub, no base station.",
  },
  {
    n: "02",
    title: "Let it learn",
    copy: "Two to four weeks of baseline building. Vetra learns your animal's rhythm rather than a breed average.",
  },
  {
    n: "03",
    title: "Get told early",
    copy: "When several signals drift together, you get one clear alert — and a vet you can call about it.",
  },
];

export function HowItWorks() {
  return (
    <section id="how" className="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
      <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
        How it works
      </span>
      <h2 className="mt-4 max-w-xl font-display text-3xl font-bold sm:text-4xl">
        Three steps, then it stays out of your way
      </h2>

      <ol className="mt-14 grid gap-6 md:grid-cols-3">
        {steps.map((s) => (
          <li key={s.n} className="rounded-2xl hairline bg-surface p-7">
            <span className="font-display text-sm font-bold tracking-[0.2em] text-primary">
              {s.n}
            </span>
            <h3 className="mt-4 font-display text-xl font-semibold">{s.title}</h3>
            <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">{s.copy}</p>
          </li>
        ))}
      </ol>
    </section>
  );
}
