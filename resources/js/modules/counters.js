/**
 * Count-up figures
 * Every [data-count] element counts from 0 to its value the first time it
 * scrolls into view. The final number is already in the markup, so without
 * JavaScript (or with reduced motion) the figure simply reads as written.
 */
export default function initCounters(reducedMotion = false) {
    const items = document.querySelectorAll('[data-count]');

    if (!items.length || reducedMotion || !('IntersectionObserver' in window)) return;

    const run = (el) => {
        const target = Number(el.dataset.count);
        const duration = 1600;
        const start = performance.now();

        const tick = (now) => {
            const t = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - t, 3);
            el.textContent = Math.round(target * eased);
            if (t < 1) requestAnimationFrame(tick);
        };

        requestAnimationFrame(tick);
    };

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

    items.forEach((el) => {
        el.textContent = '0';
        observer.observe(el);
    });
}
