import featureTelehealth from "@/assets/feature-telehealth.jpg";
import { Reveal } from "@/components/Reveal";

const points = [
  "Real vets on video, day and night. Most calls start in under four minutes.",
  "Your pet's last 60 days of health notes are shared with the vet before the call.",
  "Clear advice: wait at home, book a visit, or go now.",
  "As many calls as you need on the Care and Family plans.",
];

export function Telehealth() {
  return (
    <section id="telehealth" className="scroll-mt-20 border-y border-hairline bg-surface">
      <div className="mx-auto grid max-w-6xl items-center gap-14 px-5 py-24 lg:grid-cols-2">
        <Reveal>
          <img
            src={featureTelehealth}
            alt="Pet owner on a video call with a vet while their dog sits beside the desk"
            loading="lazy"
            width={1024}
            height={1024}
            className="w-full rounded-3xl hairline object-cover transition-transform duration-700 hover:scale-[1.02]"
          />
        </Reveal>

        <Reveal delay={120}>
          <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
            Vet video calls
          </span>
          <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
            Talk to a vet before you get in the car
          </h2>
          <p className="mt-4 text-muted-foreground">
            Most late-night worries can be sorted out on a call. Our vets already have your
            pet's health notes, so you don't have to explain everything from the start.
          </p>

          <ul className="mt-8 space-y-4">
            {points.map((p, i) => (
              <li
                key={p}
                style={{ animationDelay: `${i * 120}ms` }}
                className="flex gap-3 text-sm text-muted-foreground"
              >
                <span className="pulse-dot mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-signal" />
                <span>{p}</span>
              </li>
            ))}
          </ul>
        </Reveal>
      </div>
    </section>
  );
}
