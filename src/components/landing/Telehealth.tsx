import featureTelehealth from "@/assets/feature-telehealth.jpg";

const points = [
  "Licensed veterinarians on call 24/7/365, median connect under four minutes.",
  "Your pet's 60-day vitals trend is attached to the consult before it starts.",
  "Triage guidance that tells you plainly: wait, book, or drive now.",
  "Unlimited consults on Signal and Clinic plans — no per-call fee.",
];

export function Telehealth() {
  return (
    <section id="telehealth" className="scroll-mt-20 border-y border-hairline bg-surface">
      <div className="mx-auto grid max-w-6xl items-center gap-14 px-5 py-24 lg:grid-cols-2">
        <img
          src={featureTelehealth}
          alt="Veterinarian on a holographic video consult screen with live pet vitals beside a cat"
          loading="lazy"
          width={1024}
          height={1024}
          className="w-full rounded-3xl hairline object-cover"
        />

        <div>
          <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
            Pet telehealth
          </span>
          <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
            A vet on the line before you're in the car
          </h2>
          <p className="mt-4 text-muted-foreground">
            Most late-night worries resolve on a call. Vetra telehealth pairs a licensed
            vet with the data your collar already collected, so the consult starts from
            evidence instead of guesswork.
          </p>

          <ul className="mt-8 space-y-4">
            {points.map((p) => (
              <li key={p} className="flex gap-3 text-sm text-muted-foreground">
                <span className="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-signal" />
                <span>{p}</span>
              </li>
            ))}
          </ul>
        </div>
      </div>
    </section>
  );
}
