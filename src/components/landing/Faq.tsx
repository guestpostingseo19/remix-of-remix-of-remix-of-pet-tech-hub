import { Reveal } from "@/components/Reveal";

export const faqs = [
  {
    q: "How close is the pet tracking?",
    a: "In open sky we can place your pet within about three metres, and the map updates every 2.4 seconds. In a city or under thick trees it can be closer to eight metres. If the signal drops, we fall back to phone towers so you still get a rough spot.",
  },
  {
    q: "Does the service work for cats?",
    a: "Yes. It works with light cat tags and safe break-away collars. We use different health ranges for cats, because a cat's normal heart rate and sleep are not the same as a dog's.",
  },
  {
    q: "What can the health watch really see?",
    a: "It sees change, not illness. We learn what is normal for your pet, then tell you when a few things move at once. That often shows up days before you would notice anything. It is an early heads-up, not a diagnosis.",
  },
  {
    q: "Do vet video calls replace my own vet?",
    a: "No. Video calls are great for advice, small worries, behaviour, food and follow-ups. Anything that needs hands, X-rays or blood tests needs a clinic, and our vets will say so on the call.",
  },
  {
    q: "Do I need to buy anything?",
    a: "No. PawTech is a service only. It works with most common pet trackers, tags and home cameras you may already own, and we help you set it up on your first call.",
  },
  {
    q: "Can I stop when I want?",
    a: "Yes. Plans are month to month. You can pause or cancel from your account page and you will not be charged again.",
  },
];

export function Faq() {
  return (
    <section id="faq" className="mx-auto max-w-3xl scroll-mt-20 px-5 py-24">
      <Reveal>
        <span className="text-xs font-semibold uppercase tracking-[0.22em] text-signal">
          Questions
        </span>
        <h2 className="mt-4 font-display text-3xl font-bold sm:text-4xl">
          Answers before you join
        </h2>
      </Reveal>

      <dl className="mt-12 divide-y divide-hairline border-y border-hairline">
        {faqs.map((f, i) => (
          <Reveal key={f.q} delay={i * 70}>
            <div className="group py-7">
              <dt className="font-display text-lg font-semibold transition-colors group-hover:text-primary">
                {f.q}
              </dt>
              <dd className="mt-2.5 text-sm leading-relaxed text-muted-foreground">
                {f.a}
              </dd>
            </div>
          </Reveal>
        ))}
      </dl>
    </section>
  );
}
