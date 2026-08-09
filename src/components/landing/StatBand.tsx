import { Reveal } from "@/components/Reveal";

const stats = [
  { value: "2.4s", label: "Map updates" },
  { value: "24/7", label: "Team on duty" },
  { value: "94%", label: "Early warnings caught" },
  { value: "< 4 min", label: "Wait for a vet" },
];

export function StatBand() {
  return (
    <section aria-label="Service numbers" className="border-y border-hairline bg-surface">
      <div className="mx-auto grid max-w-6xl grid-cols-2 gap-px px-5 md:grid-cols-4">
        {stats.map((s, i) => (
          <Reveal key={s.label} delay={i * 80}>
            <div className="group px-2 py-8">
              <div className="font-display text-3xl font-bold text-primary transition-transform duration-300 group-hover:scale-105 sm:text-4xl">
                {s.value}
              </div>
              <div className="mt-1.5 text-xs uppercase tracking-[0.16em] text-muted-foreground">
                {s.label}
              </div>
            </div>
          </Reveal>
        ))}
      </div>
    </section>
  );
}
