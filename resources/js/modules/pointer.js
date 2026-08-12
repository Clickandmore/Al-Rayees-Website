/**
 * Pointer effects
 *  - .card        → a highlight that follows the cursor (--mx / --my)
 *  - .card--tilt  → a subtle 3-D tilt (--rx / --ry)
 *  - [data-magnetic] → buttons that lean towards the cursor
 *
 * All of it is skipped on coarse pointers and when reduced motion is on.
 */
const MAX_TILT = 6; // degrees
const MAGNET = 0.28; // fraction of the offset the element travels

export default function initPointer() {
    const fine = window.matchMedia('(hover: hover) and (pointer: fine)');
    const still = window.matchMedia('(prefers-reduced-motion: reduce)');

    if (!fine.matches || still.matches) return;

    /* ---- Cards ----------------------------------------------------------- */

    document.querySelectorAll('.card').forEach((card) => {
        const tilt = card.classList.contains('card--tilt');
        let frame = null;

        const move = (event) => {
            if (frame) return;
            frame = requestAnimationFrame(() => {
                const rect = card.getBoundingClientRect();
                const x = event.clientX - rect.left;
                const y = event.clientY - rect.top;

                card.style.setProperty('--mx', `${x}px`);
                card.style.setProperty('--my', `${y}px`);

                if (tilt) {
                    const px = x / rect.width - 0.5;
                    const py = y / rect.height - 0.5;
                    card.style.setProperty('--ry', `${(px * MAX_TILT).toFixed(2)}deg`);
                    card.style.setProperty('--rx', `${(-py * MAX_TILT).toFixed(2)}deg`);
                }

                frame = null;
            });
        };

        const reset = () => {
            if (frame) cancelAnimationFrame(frame);
            frame = null;
            card.style.removeProperty('--rx');
            card.style.removeProperty('--ry');
        };

        card.addEventListener('pointermove', move);
        card.addEventListener('pointerleave', reset);
    });

    /* ---- Magnetic buttons ------------------------------------------------ */

    document.querySelectorAll('[data-magnetic]').forEach((el) => {
        const move = (event) => {
            const rect = el.getBoundingClientRect();
            const x = (event.clientX - rect.left - rect.width / 2) * MAGNET;
            const y = (event.clientY - rect.top - rect.height / 2) * MAGNET;
            el.style.transform = `translate(${x.toFixed(1)}px, ${y.toFixed(1)}px)`;
        };

        el.addEventListener('pointermove', move);
        el.addEventListener('pointerleave', () => {
            el.style.transform = '';
        });
    });
}
