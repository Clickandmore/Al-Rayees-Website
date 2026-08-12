/**
 * Preloader
 * Hides itself once the window has loaded, with a short minimum so the
 * brand mark is never a flash. Never blocks: a hard 2.4s ceiling releases
 * the page even if an asset stalls.
 */
const MIN_VISIBLE = 700;
const MAX_VISIBLE = 2400;

export default function initPreloader() {
    const el = document.querySelector('[data-preloader]');

    if (!el) return;

    const started = performance.now();
    let done = false;

    const hide = () => {
        if (done) return;
        done = true;
        el.classList.add('is-done');
        document.body.classList.remove('is-locked');
        el.addEventListener('transitionend', () => el.remove(), { once: true });
    };

    const release = () => {
        const elapsed = performance.now() - started;
        setTimeout(hide, Math.max(0, MIN_VISIBLE - elapsed));
    };

    if (document.readyState === 'complete') {
        release();
    } else {
        window.addEventListener('load', release, { once: true });
    }

    setTimeout(hide, MAX_VISIBLE);
}
