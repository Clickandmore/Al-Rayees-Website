/**
 * Header behaviour
 *  - compact/frosted state once the page is scrolled
 *  - reading-progress bar (shared with the back-to-top ring)
 *  - scroll-spy that highlights the active nav link
 *  - mobile drawer with focus containment
 */
export default function initHeader() {
    const header = document.querySelector('[data-header]');
    const toggle = document.querySelector('[data-nav-toggle]');
    const drawer = document.querySelector('[data-drawer]');
    const progressTargets = document.querySelectorAll('[data-progress]');
    const links = document.querySelectorAll('[data-nav-link]');

    /* ---- Scroll state + progress ---------------------------------------- */

    let ticking = false;

    const onScroll = () => {
        const y = window.scrollY;
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const progress = max > 0 ? Math.min(y / max, 1) : 0;

        header?.classList.toggle('is-stuck', y > 40);
        progressTargets.forEach((el) => el.style.setProperty('--progress', progress.toFixed(4)));

        ticking = false;
    };

    const requestScroll = () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(onScroll);
    };

    window.addEventListener('scroll', requestScroll, { passive: true });
    window.addEventListener('resize', requestScroll, { passive: true });
    onScroll();

    /* ---- Scroll spy ------------------------------------------------------ */

    const spied = [...links]
        .map((link) => {
            const id = link.getAttribute('href')?.replace(/^.*#/, '');
            const section = id ? document.getElementById(id) : null;
            return section ? { link, section } : null;
        })
        .filter(Boolean);

    if (spied.length && 'IntersectionObserver' in window) {
        const spy = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    const match = spied.find((s) => s.section === entry.target);
                    links.forEach((l) => l.classList.remove('is-active'));
                    match?.link.classList.add('is-active');
                });
            },
            { rootMargin: '-45% 0px -50% 0px' }
        );

        spied.forEach(({ section }) => spy.observe(section));
    }

    /* ---- Mobile drawer --------------------------------------------------- */

    if (!toggle || !drawer) return;

    const setDrawer = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        drawer.classList.toggle('is-open', open);
        drawer.setAttribute('aria-hidden', String(!open));
        document.body.classList.toggle('is-locked', open);
    };

    toggle.addEventListener('click', () => {
        setDrawer(toggle.getAttribute('aria-expanded') !== 'true');
    });

    drawer.addEventListener('click', (event) => {
        if (event.target.closest('a')) setDrawer(false);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && drawer.classList.contains('is-open')) {
            setDrawer(false);
            toggle.focus();
        }
    });

    // Close when the viewport grows back to the desktop nav.
    const desktop = window.matchMedia('(min-width: 1081px)');
    desktop.addEventListener('change', (event) => {
        if (event.matches) setDrawer(false);
    });
}
