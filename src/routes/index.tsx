import { createFileRoute } from "@tanstack/react-router";
import { SiteHeader } from "@/components/SiteHeader";
import { SiteFooter } from "@/components/SiteFooter";
import { Hero } from "@/components/landing/Hero";
import { StatBand } from "@/components/landing/StatBand";
import { Features } from "@/components/landing/Features";
import { Telehealth } from "@/components/landing/Telehealth";
import { HowItWorks } from "@/components/landing/HowItWorks";
import { Pricing } from "@/components/landing/Pricing";
import { Faq, faqs } from "@/components/landing/Faq";
import { BlogPreview } from "@/components/landing/BlogPreview";

const title = "Vetra — Pet GPS Tracker & AI Health Monitoring Collar";
const description =
  "Vetra is a pet GPS tracker and AI health monitoring collar with 24/7 pet telehealth. Live location, vitals, sleep and vet access in one connected platform.";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      { title },
      { name: "description", content: description },
      { property: "og:title", content: title },
      { property: "og:description", content: description },
      { property: "og:type", content: "website" },
      { property: "og:url", content: "/" },
      { name: "twitter:card", content: "summary_large_image" },
    ],
    links: [{ rel: "canonical", href: "/" }],
    scripts: [
      {
        type: "application/ld+json",
        children: JSON.stringify({
          "@context": "https://schema.org",
          "@type": "FAQPage",
          mainEntity: faqs.map((f) => ({
            "@type": "Question",
            name: f.q,
            acceptedAnswer: { "@type": "Answer", text: f.a },
          })),
        }),
      },
    ],
  }),
  component: Index,
});

function Index() {
  return (
    <div className="min-h-screen bg-background">
      <SiteHeader />
      <main>
        <Hero />
        <StatBand />
        <Features />
        <Telehealth />
        <HowItWorks />
        <Pricing />
        <Faq />
        <BlogPreview />
      </main>
      <SiteFooter />
    </div>
  );
}
