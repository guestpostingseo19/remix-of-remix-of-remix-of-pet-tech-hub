import logo from "@/assets/pawtech-logo.png";

export function Wordmark({ className }: { className?: string }) {
  return (
    <span className={`group inline-flex items-center gap-2.5 ${className ?? ""}`}>
      <img
        src={logo}
        alt="PawTech logo"
        width={64}
        height={64}
        className="h-9 w-9 object-contain transition-transform duration-500 group-hover:scale-110 group-hover:-rotate-6"
      />
      <span className="font-display text-lg font-semibold tracking-[-0.04em] text-foreground">
        PawTech
      </span>
    </span>
  );
}
