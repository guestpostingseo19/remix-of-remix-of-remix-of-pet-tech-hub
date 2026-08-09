import { Reveal } from "@/components/Reveal";

const steps = [
  {
    n: "01",
    title: "Sign up",
    copy: "Tell us about your pet and link the tracker or tag you already use. It takes about two minutes.",
  },
  {
    n: "02",
    title: "We learn their normal",
    copy: "For the first few weeks we learn how your pet moves, sleeps and rests. Every pet is different.",
  },
  {
    n: "03",
    title: "We tell you early",
    copy: "If things start to change, you get one clear message and a vet you can call about it.",
  },
];

export function HowItWorks() {
  return (
    <section id="how" className="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
      <Reveal>
        <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
          How it works
        </span>
        <h2 className="mt-4 max-w-xl font-display text-3xl font-bold sm:text-4xl">
          Three easy steps, then we stay quiet
        </h2>
      </Reveal>

      <div className="mt-14 grid gap-6 md:grid-cols-3">
        {steps.map((s, i) => (
          <Reveal key={s.n} delay={i * 110}>
            <div className="group h-full rounded-2xl hairline bg-surface p-7 transition-all duration-500 hover:-translate-y-1.5 hover:border-primary/60">
              <span className="font-display text-sm font-bold tracking-[0.2em] text-primary">
                {s.n}
              </span>
              <h3 className="mt-4 font-display text-xl font-semibold transition-colors group-hover:text-primary">
                {s.title}
              </h3>
              <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                {s.copy}
              </p>
            </div>
          </Reveal>
        ))}
      </div>
    </section>
  );
}
