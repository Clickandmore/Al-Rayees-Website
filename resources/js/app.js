/**
 * Al Rayees Group — front-end entry point
 *
 * The site is a static single page, so there is no data layer here: every
 * module is a self-contained progressive enhancement over server-rendered
 * markup. If JavaScript never runs, the page still reads correctly.
 */
import initPreloader from './modules/preloader';
import initHeader from './modules/header';
import initReveal from './modules/reveal';
import initAccent from './modules/accent';
import initCounters from './modules/counters';
import initPointer from './modules/pointer';
import initTabs from './modules/tabs';
import initEmbers from './modules/embers';
import initToTop from './modules/to-top';

const boot = () => {
    initPreloader();
    initHeader();
    initReveal();
    initAccent();
    initCounters();
    initPointer();
    initTabs();
    initEmbers();
    initToTop();
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
} else {
    boot();
}
