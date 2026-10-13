/**
 * Before / after comparison
 * A native range input sits over two stacked photos and sets --pos, which
 * the CSS uses to clip the "before" layer. Keyboard and touch work through
 * the input itself. On first view the handle sweeps once to hint at it.
 *
 *   [data-compare] > .compare__before, input.compare__range
 */
export default function initCompare(reducedMotion = false) {
    document.querySelectorAll('[data-compare]').forEach((root) => {
        const range = root.querySelector('input[type="range"]');

        if (!range) return;

        const set = (value) => root.style.setProperty('--pos', `${value}%`);
        set(range.value);
        range.addEventListener('input', () => set(range.value));

        if (reducedMotion || !('IntersectionObserver' in window)) return;

        const observer = new IntersectionObserver(([entry]) => {
            if (!entry.isIntersecting) return;
            observer.disconnect();

            const start = performance.now();
            const tick = (now) => {
                const t = Math.min((now - start) / 1800, 1);
                const value = 50 + Math.sin(t * Math.PI * 2) * 30 * (1 - t);
                range.value = value;
                set(value);
                if (t < 1) requestAnimationFrame(tick);
            };
            setTimeout(() => requestAnimationFrame(tick), 900);
        }, { threshold: 0.6 });

        observer.observe(root);
    });
}
