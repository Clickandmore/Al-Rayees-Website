/**
 * Counters
 * Counts [data-count] elements up to their target the first time they are
 * seen.
 *
 * Digits are pinned to the Latin numbering system in both languages: the
 * Arabic copy already writes its figures that way, and the display face
 * (Sora) carries no Arabic-Indic glyphs, so letting the locale decide would
 * swap in a fallback font mid-number.
 */
const DURATION = 1600;
const easeOut = (t) => 1 - Math.pow(1 - t, 3);

export default function initCounters() {
    const nodes = document.querySelectorAll('[data-count]');

    if (!nodes.length) return;

    const format = new Intl.NumberFormat('en-US');
    const still = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const run = (el) => {
        const target = Number(el.dataset.count) || 0;

        if (still || !('IntersectionObserver' in window)) {
            el.textContent = format.format(target);
            return;
        }

        const start = performance.now();

        const step = (now) => {
            const t = Math.min((now - start) / DURATION, 1);
            el.textContent = format.format(Math.round(easeOut(t) * target));
            if (t < 1) requestAnimationFrame(step);
        };

        requestAnimationFrame(step);
    };

    if (!('IntersectionObserver' in window)) {
        nodes.forEach(run);
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                run(entry.target);
                observer.unobserve(entry.target);
            });
        },
        { threshold: 0.6 }
    );

    nodes.forEach((el) => {
        el.textContent = format.format(0);
        observer.observe(el);
    });
}
