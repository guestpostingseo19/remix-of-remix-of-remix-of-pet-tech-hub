import featureGps from "@/assets/feature-gps.jpg";
import featureCamera from "@/assets/feature-camera.jpg";
import featureFeeder from "@/assets/feature-feeder.jpg";
import heroCollar from "@/assets/hero-collar.jpg";
import { Reveal } from "@/components/Reveal";

const services = [
  {
    title: "Live pet tracking",
    copy: "See where your pet is on a map, updated every few seconds. Draw a safe zone around your home and get a text if they leave it.",
    image: featureGps,
    alt: "Dog walking on a golden trail while the PawTech app tracks the route",
  },
  {
    title: "Daily health watch",
    copy: "We check heart rate, breathing and sleep every day. When the numbers change, we let you know in plain words.",
    image: heroCollar,
    alt: "Dog resting on linen while PawTech checks daily health numbers",
  },
  {
    title: "Home check-ins",
    copy: "Send us a short clip from your home camera and our team tells you what your pet's behaviour means.",
    image: featureCamera,
    alt: "Cat sitting in warm afternoon light during a PawTech home check-in",
  },
  {
    title: "Food and routine coaching",
    copy: "Get a simple feeding and walking plan built around your pet's age, weight and how busy their day was.",
    image: featureFeeder,
    alt: "Bowl of food being measured for a PawTech feeding plan",
  },
];

export function Features() {
  return (
    <section id="platform" className="mx-auto max-w-6xl scroll-mt-20 px-5 py-24">
      <Reveal className="max-w-2xl">
        <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
          Our services
        </span>
        <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
          Four services, one caring team
        </h2>
        <p className="mt-4 text-muted-foreground">
          Everything we do goes into one simple timeline, so you can see location, health,
          behaviour and food in one place.
        </p>
      </Reveal>

      <div className="mt-14 grid gap-6 sm:grid-cols-2">
        {services.map((f, i) => (
          <Reveal key={f.title} delay={i * 90}>
            <article className="group h-full overflow-hidden rounded-2xl hairline bg-surface transition-all duration-500 hover:-translate-y-1.5 hover:border-primary/60 hover:glow-soft">
              <div className="overflow-hidden">
                <img
                  src={f.image}
                  alt={f.alt}
                  loading="lazy"
                  width={1024}
                  height={1024}
                  className="h-56 w-full object-cover opacity-90 transition-all duration-700 group-hover:scale-105 group-hover:opacity-100"
                />
              </div>
              <div className="p-6">
                <h3 className="font-display text-xl font-semibold transition-colors group-hover:text-primary">
                  {f.title}
                </h3>
                <p className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                  {f.copy}
                </p>
              </div>
            </article>
          </Reveal>
        ))}
      </div>
    </section>
  );
}
