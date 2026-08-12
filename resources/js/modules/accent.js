/**
 * Accent takeover
 * Each division band declares `data-accent="charcoal|danaroz|amtech|leadwell"`.
 * As one crosses the middle of the viewport its palette is promoted to the
 * document root, repainting the aurora, buttons, borders and highlights.
 * Sections without an accent hand the page back to the brand gold.
 */
export default function initAccent() {
    const zones = document.querySelectorAll('[data-accent]');

    if (!zones.length || !('IntersectionObserver' in window)) return;

    const root = document.documentElement;
    const active = new Set();

    const paint = () => {
        // Last zone to enter wins; empty set falls back to the brand gold.
        const current = [...active].pop();
        if (current) {
            root.setAttribute('data-accent', current);
        } else {
            root.removeAttribute('data-accent');
        }
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                const key = entry.target.dataset.accent;
                if (entry.isIntersecting) {
                    active.add(key);
                } else {
                    active.delete(key);
                }
            });
            paint();
        },
        { rootMargin: '-40% 0px -40% 0px' }
    );

    zones.forEach((zone) => observer.observe(zone));
}
