/**
 * Scroll reveal
 * Adds `.is-revealed` to every [data-reveal] element the first time it
 * enters the viewport. Children of a [data-reveal-group] get an index so
 * the CSS can stagger them.
 */
export default function initReveal() {
    const items = document.querySelectorAll('[data-reveal]');

    if (!items.length) return;

    // Stagger index per group.
    document.querySelectorAll('[data-reveal-group]').forEach((group) => {
        group.querySelectorAll(':scope > [data-reveal]').forEach((child, i) => {
            child.style.setProperty('--i', i);
        });
    });

    if (!('IntersectionObserver' in window)) {
        items.forEach((el) => el.classList.add('is-revealed'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add('is-revealed');
                observer.unobserve(entry.target);
            });
        },
        { rootMargin: '0px 0px -12% 0px', threshold: 0.12 }
    );

    items.forEach((el) => observer.observe(el));
}
