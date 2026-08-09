import blogMonitoring from "@/assets/blog-monitoring.jpg";
import blogAi from "@/assets/blog-ai.jpg";
import blogGps from "@/assets/blog-gps.jpg";
import blogTelehealth from "@/assets/blog-telehealth.jpg";

export interface PostSection {
  heading: string;
  paragraphs: string[];
  bullets?: string[];
}

export interface Post {
  slug: string;
  title: string;
  description: string;
  excerpt: string;
  date: string;
  readingTime: string;
  category: string;
  cover: string;
  coverAlt: string;
  sections: PostSection[];
}

export const posts: Post[] = [
  {
    slug: "pet-health-monitoring-what-the-data-tells-you",
    title: "Pet Health Monitoring: What the Data Actually Tells You",
    description:
      "A plain-language guide to pet health monitoring — which signals from a smart collar matter, what a normal baseline looks like, and when the numbers are worth a vet call.",
    excerpt:
      "Resting heart rate, respiration, sleep fragmentation and activity load. Here is how to read each signal without turning into a hypochondriac pet parent.",
    date: "2026-07-28",
    readingTime: "7 min read",
    category: "Health",
    cover: blogMonitoring,
    coverAlt:
      "Dog sleeping on warm linen bedding wearing a PawTech sensor",
    sections: [
      {
        heading: "Continuous data beats the annual checkup",
        paragraphs: [
          "A yearly exam captures one snapshot of your pet on one unusually stressful morning. Continuous pet health monitoring captures thousands of snapshots taken while your animal is relaxed at home, which is where deviations actually show up first.",
          "The value is not any single reading. It is the baseline — the private, personal range your specific animal lives in. A resting heart rate of 92 bpm means nothing on its own. A resting heart rate of 92 bpm in a dog whose 60-day baseline is 74 bpm means something.",
        ],
      },
      {
        heading: "The four signals worth watching",
        paragraphs: [
          "Modern collars stream dozens of derived metrics. Most are noise. These four carry the clearest clinical signal for everyday owners:",
        ],
        bullets: [
          "Resting heart rate — the earliest mover in pain, fever, cardiac and endocrine conditions.",
          "Respiratory rate while sleeping — one of the most reliable early markers of heart failure in dogs and cats.",
          "Sleep fragmentation — rising night-time wake events often precede visible signs of arthritis or cognitive decline.",
          "Activity load — a sustained drop of 20% or more against baseline is a genuine reason to book an appointment.",
        ],
      },
      {
        heading: "When to act, and when to wait",
        paragraphs: [
          "One odd day is weather. Three consecutive days outside baseline is a pattern. Treat single-day spikes as context, not emergencies — a thunderstorm, a house guest, or a hot afternoon will move every one of these numbers.",
          "The exception is sleeping respiratory rate. A sustained sleeping rate above roughly 30 breaths per minute in a resting dog or cat is one of the few home measurements that warrants a same-week veterinary call regardless of how the animal looks.",
        ],
      },
      {
        heading: "What monitoring cannot do",
        paragraphs: [
          "No collar diagnoses anything. It narrows the search. The realistic win is not a machine telling you your dog has pancreatitis — it is you walking into a clinic with 60 days of trend data instead of the sentence 'he's been a bit off lately.' That changes the quality of the consult enormously.",
        ],
      },
    ],
  },
  {
    slug: "ai-pet-health-early-illness-detection",
    title: "AI Pet Health: How Machine Learning Spots Illness Early",
    description:
      "How AI pet health models turn raw collar sensor data into early illness detection — what the models actually learn, where they fail, and how to judge a vendor's claims.",
    excerpt:
      "Anomaly detection, not diagnosis. A look inside how AI pet health models learn a per-animal baseline and flag deviations days before symptoms surface.",
    date: "2026-07-14",
    readingTime: "8 min read",
    category: "AI",
    cover: blogAi,
    coverAlt:
      "Layered amber glass forms refracting light, evoking machine learning",
    sections: [
      {
        heading: "The model is learning your pet, not pets in general",
        paragraphs: [
          "The useful architecture in AI pet health is per-animal anomaly detection. The model spends its first two to four weeks building a personal baseline of your pet's rhythm — when they sleep, how hard they move, how their heart rate responds to activity — and then scores every subsequent day against that private model.",
          "This is why breed-average benchmarks are close to useless. A whippet and a bulldog share almost no physiological profile, and two bulldogs of the same age can differ by 30%.",
        ],
      },
      {
        heading: "What the signal actually looks like",
        paragraphs: [
          "Illness rarely announces itself with one dramatic number. It shows up as several small correlated drifts at once: slightly elevated resting heart rate, slightly reduced activity, slightly more fragmented sleep. Each alone falls inside normal variance. Together they form a pattern a model can catch several days before an owner notices behaviour changes.",
        ],
      },
      {
        heading: "Where these systems fail",
        paragraphs: [
          "Three honest failure modes are worth knowing before you trust an alert:",
        ],
        bullets: [
          "Cold start — the first month of data is baseline-building, not monitoring. Alerts in that window are unreliable.",
          "Lifestyle shifts — a house move, a new puppy or a season change looks identical to a slow decline until the model re-baselines.",
          "Silent conditions — anything that does not alter movement, cardiac or sleep behaviour is invisible to a collar, full stop.",
        ],
      },
      {
        heading: "How to judge a vendor's claim",
        paragraphs: [
          "Ask two questions. First: what is the false-positive rate per animal per month? A system that alerts weekly will be ignored within a month, which makes its sensitivity irrelevant. Second: is the alert actionable — does it tell you which signals moved and by how much, or does it just say 'something seems off'?",
          "Any product that markets diagnosis rather than early warning is overselling. The correct framing for AI pet health today is a smoke detector, not a radiologist.",
        ],
      },
    ],
  },
  {
    slug: "choosing-a-pet-gps-tracker",
    title: "Choosing a Pet GPS Tracker: The Six Things That Matter",
    description:
      "A practical buyer's guide to choosing a pet GPS tracker — update rate, battery life, network coverage, subscription cost, geofencing accuracy and collar fit.",
    excerpt:
      "Most pet GPS tracker comparisons obsess over accuracy in metres. The specs that decide whether you actually find your dog are elsewhere.",
    date: "2026-06-30",
    readingTime: "6 min read",
    category: "Gear",
    cover: blogGps,
    coverAlt:
      "Aerial view of a winding countryside path at golden hour",
    sections: [
      {
        heading: "Update rate beats raw accuracy",
        paragraphs: [
          "Every modern pet GPS tracker resolves to roughly three to ten metres in open sky. That difference is irrelevant when a dog is moving at 25 km/h. What matters is how often the device reports its position.",
          "A tracker on a two-minute update cycle puts your animal somewhere inside an 800-metre radius by the time you look. A live-mode tracker reporting every two to five seconds keeps you on an actual trail. Check whether live mode is standard or a premium tier.",
        ],
      },
      {
        heading: "Battery life is measured in the wrong units",
        paragraphs: [
          "Marketed battery figures assume passive mode with infrequent pings. Live tracking typically drains a tracker in two to six hours. The number to ask for is live-mode runtime, because that is the only mode that matters during the one event you bought the device for.",
        ],
      },
      {
        heading: "The rest of the checklist",
        paragraphs: ["Once update rate and battery check out, work through these:"],
        bullets: [
          "Network — LTE-M and NB-IoT reach far further into rural areas than standard LTE. Bluetooth-only tags are not trackers.",
          "Subscription — nearly every cellular tracker requires one. Compare three-year total cost, not hardware price.",
          "Geofencing — ask about the false-alert rate at the boundary; poor implementations fire every time your pet naps near a fence.",
          "Weight and fit — anything above roughly 5% of body weight will not stay on a cat or a small dog.",
          "Waterproofing — IP67 minimum, IP68 if your animal swims.",
        ],
      },
      {
        heading: "The honest recommendation",
        paragraphs: [
          "For a suburban dog that occasionally slips a gate, a mid-tier cellular tracker with a five-second live mode is more than sufficient. For a rural or working animal, prioritise network band coverage over every other spec — a perfectly accurate tracker with no signal is a bead on a collar.",
        ],
      },
    ],
  },
  {
    slug: "pet-telehealth-vs-clinic-visit",
    title: "Pet Telehealth vs. the Clinic Visit: Which One, When",
    description:
      "A clear breakdown of pet telehealth versus in-person veterinary care — what a remote consult can genuinely resolve, what it cannot, and how to triage at 2am.",
    excerpt:
      "Pet telehealth resolves a surprising share of consults outright. Here is the triage line between a video call and a car journey.",
    date: "2026-06-16",
    readingTime: "6 min read",
    category: "Care",
    cover: blogTelehealth,
    coverAlt:
      "Hands holding a phone during a warm-lit vet video consultation",
    sections: [
      {
        heading: "What a remote consult genuinely handles",
        paragraphs: [
          "Pet telehealth is strongest wherever the decision depends on history and observation rather than touch. That covers a wide slice of everyday veterinary contact: minor skin irritations, mild digestive upset, behaviour and anxiety questions, diet and weight planning, medication side effects, post-operative check-ins and — most valuably — triage.",
          "Triage alone justifies the service. Knowing at 2am whether a symptom is a wait-until-morning problem or a drive-now problem is worth the consult fee on its own.",
        ],
      },
      {
        heading: "What it cannot replace",
        paragraphs: [
          "Anything requiring hands, imaging or samples has to happen in a room. That means suspected fractures, breathing difficulty, collapse, bloat, seizures, deep wounds, toxin ingestion, urinary blockage, and any condition needing bloodwork, radiographs or ultrasound.",
        ],
        bullets: [
          "Difficulty breathing, pale gums or collapse — clinic, immediately.",
          "Distended abdomen with unproductive retching — emergency, immediately.",
          "Straining to urinate, especially a male cat — emergency, immediately.",
          "Anything sustained over 24 hours that telehealth has already flagged — book in person.",
        ],
      },
      {
        heading: "Where connected devices change the equation",
        paragraphs: [
          "A remote vet's biggest handicap is missing objective data. When a consult opens with two weeks of resting heart rate, respiration and activity trend from a smart collar, the conversation starts from evidence rather than recollection. That single change moves a meaningful number of consults from 'come in so we can look' to a resolution on the call.",
        ],
      },
      {
        heading: "The practical rule",
        paragraphs: [
          "Use pet telehealth as the front door and the clinic as the operating theatre. Call first, unless the symptom is on the emergency list above — in which case drive, and call from the car.",
        ],
      },
    ],
  },
];

export const getPost = (slug: string) => posts.find((p) => p.slug === slug);
