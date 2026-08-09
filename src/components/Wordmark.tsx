export function Wordmark({ className }: { className?: string }) {
  return (
    <span className={`inline-flex items-center gap-2.5 ${className ?? ""}`}>
      <svg
        viewBox="0 0 32 32"
        aria-hidden="true"
        className="h-7 w-7 text-primary"
        fill="none"
      >
        <path
          d="M16 27.5C10.2 23.4 4.5 19.6 4.5 14.1A6.6 6.6 0 0 1 16 9.6a6.6 6.6 0 0 1 11.5 4.5c0 5.5-5.7 9.3-11.5 13.4Z"
          stroke="currentColor"
          strokeOpacity="0.4"
          strokeWidth="1.4"
        />
        <path
          d="M9 16.2h3.4l1.9-4.6 2.7 8.2 2.1-5.1 1.3 1.5H23"
          stroke="currentColor"
          strokeWidth="1.9"
          strokeLinecap="round"
          strokeLinejoin="round"
        />
      </svg>
      <span className="font-display text-lg font-semibold tracking-[-0.04em] text-foreground">
        Vetra
      </span>
    </span>
  );
}
