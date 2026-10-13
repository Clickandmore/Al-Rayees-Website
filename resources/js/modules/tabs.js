/**
 * Tabs
 * Accessible tab list. Markup contract:
 *
 *   [data-tabs]
 *     [role=tablist] > button[role=tab][aria-controls][aria-selected]
 *     [role=tabpanel][id]   (all but the selected one carry `hidden`)
 */
export default function initTabs() {
    document.querySelectorAll('[data-tabs]').forEach((root) => {
        const tabs = [...root.querySelectorAll('[role="tab"]')];

        if (!tabs.length) return;

        const select = (tab, focus = true) => {
            tabs.forEach((t) => {
                const on = t === tab;
                t.setAttribute('aria-selected', String(on));
                t.setAttribute('tabindex', on ? '0' : '-1');

                const panel = document.getElementById(t.getAttribute('aria-controls'));
                if (panel) panel.hidden = !on;
            });

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
    });
}
