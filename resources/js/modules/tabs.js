/**
 * Tabs
 * Accessible tab list with a sliding marker. Markup contract:
 *
 *   [data-tabs]
 *     [role=tablist] > button[role=tab][aria-controls][aria-selected]
 *     [data-tabs-marker]
 *     [role=tabpanel][id]
 */
export default function initTabs() {
    document.querySelectorAll('[data-tabs]').forEach((root) => {
        const tabs = [...root.querySelectorAll('[role="tab"]')];
        const marker = root.querySelector('[data-tabs-marker]');

        if (!tabs.length) return;

        const moveMarker = (tab) => {
            if (!marker) return;
            // offsetLeft is relative to the tab list's border box; the marker is
            // placed against its padding box, so drop the border width.
            const offset = tab.offsetLeft - tab.parentElement.clientLeft;
            marker.style.setProperty('--marker-w', `${tab.offsetWidth}px`);
            marker.style.setProperty('--marker-x', `${offset}px`);
        };

        const select = (tab, focus = true) => {
            tabs.forEach((t) => {
                const on = t === tab;
                t.setAttribute('aria-selected', String(on));
                t.setAttribute('tabindex', on ? '0' : '-1');
                document.getElementById(t.getAttribute('aria-controls'))?.classList.toggle('is-active', on);
            });

            moveMarker(tab);
            if (focus) tab.focus();
        };

        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => select(tab, false));

            tab.addEventListener('keydown', (event) => {
                const rtl = document.dir === 'rtl';
                const forward = rtl ? 'ArrowLeft' : 'ArrowRight';
                const back = rtl ? 'ArrowRight' : 'ArrowLeft';

                let next = null;
                if (event.key === forward) next = tabs[(index + 1) % tabs.length];
                if (event.key === back) next = tabs[(index - 1 + tabs.length) % tabs.length];
                if (event.key === 'Home') next = tabs[0];
                if (event.key === 'End') next = tabs[tabs.length - 1];

                if (next) {
                    event.preventDefault();
                    select(next);
                }
            });
        });

        const initial = tabs.find((t) => t.getAttribute('aria-selected') === 'true') || tabs[0];
        select(initial, false);

        // The marker is measured from layout, so re-run once fonts settle.
        window.addEventListener('resize', () => moveMarker(
            tabs.find((t) => t.getAttribute('aria-selected') === 'true') || tabs[0]
        ), { passive: true });

        document.fonts?.ready.then(() => moveMarker(initial));
    });
}
