export const faqs = [
  {
    q: "How accurate is the pet GPS tracker?",
    a: "Vetra resolves to roughly three metres in open sky and refreshes every 2.4 seconds in live mode. In dense urban or heavy tree cover, accuracy widens to about eight metres, and the collar falls back to cell-tower triangulation if satellites drop entirely.",
  },
  {
    q: "Does the smart collar work for cats?",
    a: "Yes. The collar weighs 22 grams and uses a breakaway safety clasp, which keeps it under the 5% body-weight guideline for cats above roughly 4.5 kg. Vitals modelling is tuned separately for feline baselines.",
  },
  {
    q: "What can AI pet health monitoring actually detect?",
    a: "It detects deviation, not disease. Vetra learns your pet's personal baseline for heart rate, respiration, activity and sleep, then flags when several of those drift together — a pattern that frequently precedes visible symptoms by several days. It is an early-warning system, not a diagnosis.",
  },
  {
    q: "Is pet telehealth a replacement for my vet?",
    a: "No. Telehealth handles triage, minor conditions, behaviour, nutrition and follow-ups. Anything needing hands, imaging or bloodwork goes to a clinic, and our vets will tell you that directly on the call.",
  },
  {
    q: "How long does the battery last?",
    a: "Eighteen days in passive mode with periodic pings. Continuous live tracking draws far more power and gives roughly six hours, which is the figure worth planning around during an actual escape.",
  },
  {
    q: "Do I need a subscription?",
    a: "Yes — cellular connectivity, vet access and model hosting are ongoing costs. The collar hardware is included with every plan and there is no upfront device fee.",
  },
];

export function Faq() {
  return (
    <section id="faq" className="mx-auto max-w-3xl scroll-mt-20 px-5 py-24">
      <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
        Questions
      </span>
      <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
        Answers before you commit
      </h2>

      <dl className="mt-12 divide-y divide-hairline border-y border-hairline">
        {faqs.map((f) => (
          <div key={f.q} className="py-7">
            <dt className="font-display text-lg font-semibold">{f.q}</dt>
            <dd className="mt-2.5 text-sm leading-relaxed text-muted-foreground">{f.a}</dd>
          </div>
        ))}
      </dl>
    </section>
  );
}
