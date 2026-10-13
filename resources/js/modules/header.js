/**
 * Header
 * - Mobile drawer: toggled by [data-nav-toggle]; Escape or a link closes it.
 * - Divisions dropdown ([data-dropdown]): opens on hover via CSS; the
 *   button toggles it for click / keyboard users, Escape and outside
 *   clicks close it.
 */
export default function initHeader() {
    initScrolled();
    initDrawer();
    initDropdowns();
}

// Adds .is-scrolled once the page leaves the top, for the header's shadow.
function initScrolled() {
    const header = document.querySelector('[data-header]');

    if (!header) return;

    const update = () => header.classList.toggle('is-scrolled', window.scrollY > 8);
    update();
    window.addEventListener('scroll', update, { passive: true });
}

function initDrawer() {
    const toggle = document.querySelector('[data-nav-toggle]');
    const drawer = document.querySelector('[data-drawer]');

    if (!toggle || !drawer) return;

    const setOpen = (open) => {
        toggle.setAttribute('aria-expanded', String(open));
        drawer.hidden = !open;
        document.body.classList.toggle('is-locked', open);
    };

    toggle.addEventListener('click', () => {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    drawer.addEventListener('click', (event) => {
        if (event.target.closest('a')) setOpen(false);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !drawer.hidden) {
            setOpen(false);
            toggle.focus();
        }
    });

    // The drawer only exists below the desktop breakpoint.
    window.matchMedia('(min-width: 1024px)').addEventListener('change', (event) => {
        if (event.matches) setOpen(false);
    });
}

function initDropdowns() {
    document.querySelectorAll('[data-dropdown]').forEach((item) => {
        const button = item.querySelector('button[aria-controls]');

        if (!button) return;

        const setOpen = (open) => {
            item.classList.toggle('is-open', open);
            button.setAttribute('aria-expanded', String(open));
        };

        button.addEventListener('click', () => {
            setOpen(!item.classList.contains('is-open'));
        });

        item.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && item.classList.contains('is-open')) {
                setOpen(false);
                button.focus();
            }
        });

        item.addEventListener('focusout', (event) => {
            if (!item.contains(event.relatedTarget)) setOpen(false);
        });

        document.addEventListener('click', (event) => {
            if (!item.contains(event.target)) setOpen(false);
        });
    });
}
