/**
 * Back-to-top control
 * Appears past one viewport of scroll. Its progress ring is driven by the
 * same `--progress` variable the header sets (see modules/header.js).
 */
export default function initToTop() {
    const button = document.querySelector('[data-to-top]');

    if (!button) return;

    const toggle = () => {
        button.classList.toggle('is-visible', window.scrollY > window.innerHeight * 0.9);
    };

    window.addEventListener('scroll', toggle, { passive: true });
    toggle();

    button.addEventListener('click', () => {
        const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        window.scrollTo({ top: 0, behavior: reduced ? 'auto' : 'smooth' });
    });
}
