const stats = [
  { value: "2.4s", label: "Live location refresh" },
  { value: "18 days", label: "Battery, passive mode" },
  { value: "94%", label: "Anomalies flagged early" },
  { value: "< 4 min", label: "Median vet response" },
];

export function StatBand() {
  return (
    <section aria-label="Platform performance" className="border-y border-hairline bg-surface">
      <div className="mx-auto grid max-w-6xl grid-cols-2 gap-px px-5 md:grid-cols-4">
        {stats.map((s) => (
          <div key={s.label} className="px-2 py-8">
            <div className="font-display text-3xl font-bold text-primary sm:text-4xl">
              {s.value}
            </div>
            <div className="mt-1.5 text-xs uppercase tracking-[0.16em] text-muted-foreground">
              {s.label}
            </div>
          </div>
        ))}
      </div>
    </section>
  );
}
