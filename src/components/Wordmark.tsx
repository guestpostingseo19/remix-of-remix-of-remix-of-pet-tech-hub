export function Wordmark({ className }: { className?: string }) {
  return (
    <span className={`inline-flex items-center gap-2.5 ${className ?? ""}`}>
      <svg
        viewBox="0 0 32 32"
        aria-hidden="true"
        className="h-7 w-7 text-primary"
        fill="none"
      >
        <circle cx="16" cy="16" r="14.5" stroke="currentColor" strokeOpacity="0.35" />
        <path
          d="M6 17.5h4.2l2.3-6.2 3.3 10.4 2.6-7.4 1.7 3.2H26"
          stroke="currentColor"
          strokeWidth="1.8"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
      </svg>
      <span className="font-display text-lg font-bold tracking-tight text-foreground">
        Vetra
      </span>
    </span>
  );
}
