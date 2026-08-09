import { useEffect, useState } from "react";
import { Moon, Sun } from "lucide-react";

type Mode = "night" | "day";

export function ThemeToggle() {
  const [mode, setMode] = useState<Mode>("night");

  useEffect(() => {
    const saved = (localStorage.getItem("pawtech-theme") as Mode | null) ?? "night";
    setMode(saved);
  }, []);

  useEffect(() => {
    document.documentElement.classList.toggle("light", mode === "day");
    localStorage.setItem("pawtech-theme", mode);
  }, [mode]);

  const next = mode === "night" ? "day" : "night";

  return (
    <button
      type="button"
      onClick={() => setMode(next)}
      aria-label={`Switch to ${next} mode`}
      title={`Switch to ${next} mode`}
      className="relative flex h-9 w-9 items-center justify-center rounded-full hairline bg-surface/70 text-muted-foreground transition-all duration-300 hover:-translate-y-0.5 hover:border-primary hover:text-primary"
    >
      <Sun
        className={`absolute h-4 w-4 transition-all duration-500 ${
          mode === "day" ? "rotate-0 scale-100 opacity-100" : "-rotate-90 scale-50 opacity-0"
        }`}
      />
      <Moon
        className={`absolute h-4 w-4 transition-all duration-500 ${
          mode === "night" ? "rotate-0 scale-100 opacity-100" : "rotate-90 scale-50 opacity-0"
        }`}
      />
    </button>
  );
}
