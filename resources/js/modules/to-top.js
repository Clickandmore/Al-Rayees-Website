/**
 * Back to top
 * Shows [data-to-top] once the page has scrolled past most of the first
 * screen, fills its ring with the scroll progress, and scrolls back up on
 * click (instantly when the visitor prefers reduced motion).
 */
export default function initToTop(reducedMotion = false) {
    const button = document.querySelector('[data-to-top]');

    if (!button) return;

    let ticking = false;

    const update = () => {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const progress = max > 0 ? Math.min(window.scrollY / max, 1) : 0;

        button.style.setProperty('--progress', (progress * 100).toFixed(1));
        button.classList.toggle('is-visible', window.scrollY > window.innerHeight * 0.6);
        ticking = false;
    };

    window.addEventListener('scroll', () => {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    }, { passive: true });

    window.addEventListener('resize', update, { passive: true });

    button.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: reducedMotion ? 'auto' : 'smooth' });
    });

    update();
}
