import featureGps from "@/assets/feature-gps.jpg";
import featureCamera from "@/assets/feature-camera.jpg";
import featureFeeder from "@/assets/feature-feeder.jpg";
import heroCollar from "@/assets/hero-collar.jpg";

const features = [
  {
    title: "Pet GPS tracker",
    copy: "LTE-M and NB-IoT dual-band positioning with a 2.4-second live mode. Geofences that understand a nap by the fence isn't an escape.",
    image: featureGps,
    alt: "Dog on a golden-hour trail tracked by the Vetra GPS collar",
  },
  {
    title: "Smart collar for dogs and cats",
    copy: "Resting heart rate, respiration, temperature and sleep fragmentation sampled continuously. 22 grams, IP68, 18-day battery.",
    image: heroCollar,
    alt: "Vetra smart collar in warm ceramic with an amber status light on linen",
  },
  {
    title: "Pet camera",
    copy: "Night-vision 2K with on-device behaviour detection. Get a clip when your pet paces, not every time a curtain moves.",
    image: featureCamera,
    alt: "Vetra home camera on a wooden shelf watching a cat in warm afternoon light",
  },
  {
    title: "Smart pet feeder",
    copy: "Portion control that adapts to the activity load your collar recorded that day. Refill alerts before the hopper runs dry.",
    image: featureFeeder,
    alt: "Ceramic Vetra smart feeder dispensing a portion into a matching bowl",
  },
];

export function Features() {
  return (
    <section id="platform" className="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
      <div className="max-w-2xl">
        <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
          The platform
        </span>
        <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
          Four devices, one continuous record of your pet
        </h2>
        <p className="mt-4 text-muted-foreground">
          Every Vetra device writes into the same timeline, so location, vitals, behaviour
          and nutrition are read together instead of in four disconnected apps.
        </p>
      </div>

      <div className="mt-14 grid gap-6 sm:grid-cols-2">
        {features.map((f) => (
          <article
            key={f.title}
            className="group overflow-hidden rounded-2xl hairline bg-surface transition-colors hover:border-primary/60"
          >
            <img
              src={f.image}
              alt={f.alt}
              loading="lazy"
              width={1024}
              height={1024}
              className="h-56 w-full object-cover opacity-90 transition-opacity group-hover:opacity-100"
            />
            <div className="p-6">
              <h3 className="font-display text-xl font-semibold">{f.title}</h3>
              <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                {f.copy}
              </p>
            </div>
          </article>
        ))}
      </div>
    </section>
  );
}
