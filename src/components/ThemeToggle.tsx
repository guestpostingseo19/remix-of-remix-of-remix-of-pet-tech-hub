import { useEffect, useState } from "react";
import { Moon, Sun } from "lucide-react";

type Mode = "night" | "day";

const KEY = "pawtech-theme";

function apply(mode: Mode) {
  const root = document.documentElement;
  root.classList.toggle("light", mode === "day");
  root.classList.toggle("dark", mode === "night");
  try {
    localStorage.setItem(KEY, mode);
  } catch {
    /* storage blocked — theme still applies for this visit */
  }
}

export function ThemeToggle({ className }: { className?: string }) {
  const [mode, setMode] = useState<Mode>("night");

  useEffect(() => {
    let saved: Mode = "night";
    try {
      if (localStorage.getItem(KEY) === "day") saved = "day";
    } catch {
      /* ignore */
    }
    setMode(saved);
    apply(saved);
  }, []);

  function toggle() {
    const next: Mode = mode === "night" ? "day" : "night";
    setMode(next);
    apply(next);
  }

  const isDay = mode === "day";

  return (
    <button
      type="button"
      onClick={toggle}
      role="switch"
      aria-checked={isDay}
      aria-label={`Switch to ${isDay ? "night" : "day"} mode`}
      title={`Switch to ${isDay ? "night" : "day"} mode`}
      className={`group inline-flex items-center gap-1.5 rounded-full hairline bg-surface/70 p-1 transition-all duration-300 hover:-translate-y-0.5 hover:border-primary ${className ?? ""}`}
    >
      <span
        className={`flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 ${
          isDay
            ? "bg-primary text-primary-foreground"
            : "text-muted-foreground group-hover:text-primary"
        }`}
      >
        <Sun className="h-3.5 w-3.5" />
      </span>
      <span
        className={`flex h-7 w-7 items-center justify-center rounded-full transition-all duration-300 ${
          !isDay
            ? "bg-primary text-primary-foreground"
            : "text-muted-foreground group-hover:text-primary"
        }`}
      >
        <Moon className="h-3.5 w-3.5" />
      </span>
      <span className="sr-only">{isDay ? "Day mode on" : "Night mode on"}</span>
    </button>
  );
}
