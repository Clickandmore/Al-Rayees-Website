/**
 * Footer watermark
 *
 * The oversized wordmark has to sit on a single line and fill its container
 * whatever the language. CSS gets close from the character count alone (see
 * `--fit` in layout/_footer.css, which is what a JS-less visit gets); this
 * measures the text as actually rendered and corrects the size to match.
 */

// Share of the container width the wordmark should occupy, and its ceiling.
const TARGET = 0.98;
const MAX_PX = 176;

export default function initWatermark() {
    const mark = document.querySelector('[data-watermark]');

    if (!mark || !mark.textContent.trim()) return;

    const fit = () => {
        const available = mark.clientWidth;

        if (!available) return;

        // Measure at a known size, then scale that size by the shortfall.
        mark.style.fontSize = '100px';

        const range = document.createRange();
        range.selectNodeContents(mark);

        const width = range.getBoundingClientRect().width;

        mark.style.fontSize = width
            ? `${Math.min(MAX_PX, (available * TARGET * 100) / width)}px`
            : '';
    };

    fit();

    // Web fonts land after first paint and change the measurement.
    if (document.fonts?.ready) document.fonts.ready.then(fit);

    if ('ResizeObserver' in window) {
        let frame = 0;

        new ResizeObserver(() => {
            cancelAnimationFrame(frame);
            frame = requestAnimationFrame(fit);
        }).observe(mark.parentElement ?? mark);
    }
}
