/**
 * Al Rayees Group — front-end entry point
 *
 * Every page is server-rendered; each module is a progressive enhancement.
 * Scroll animations come from AOS ([data-aos] attributes in the views);
 * reduced-motion users get the content without movement.
 */
import AOS from 'aos';
import 'aos/dist/aos.css';

import initHeader from './modules/header';
import initTabs from './modules/tabs';
import initCounters from './modules/counters';
import initCompare from './modules/compare';
import initToTop from './modules/to-top';

const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const boot = () => {
    initHeader();
    initTabs();
    initCounters(reducedMotion);
    initCompare(reducedMotion);
    initToTop(reducedMotion);

    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        offset: 60,
        once: true,
        disable: reducedMotion,
    });

    // Layout shifts once web fonts and images land; re-measure trigger points.
    window.addEventListener('load', () => AOS.refresh());
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
} else {
    boot();
}
