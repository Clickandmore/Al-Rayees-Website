/**
 * Hero ember field
 * A lightweight canvas particle system: slow-rising sparks that nod to the
 * Group's charcoal industry without ever competing with the headline.
 * Particle count scales with the viewport, and the whole thing shuts down
 * when the hero scrolls out of view or the tab is hidden.
 */
const DENSITY = 0.000035; // particles per px²
const MAX_PARTICLES = 90;

export default function initEmbers() {
    const canvas = document.querySelector('[data-embers]');

    if (!canvas || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const ctx = canvas.getContext('2d', { alpha: true });
    if (!ctx) return;

    let width = 0;
    let height = 0;
    let dpr = 1;
    let particles = [];
    let raf = null;
    let visible = true;

    const random = (min, max) => min + Math.random() * (max - min);

    const spark = (seeded = false) => ({
        x: random(0, width),
        y: seeded ? random(0, height) : height + random(0, 60),
        r: random(0.6, 2.1),
        vy: random(0.16, 0.62),
        vx: random(-0.22, 0.22),
        life: 0,
        span: random(260, 620),
        hue: random(24, 44),
        drift: random(0.004, 0.014),
    });

    const resize = () => {
        const rect = canvas.getBoundingClientRect();
        dpr = Math.min(window.devicePixelRatio || 1, 2);
        width = rect.width;
        height = rect.height;
        canvas.width = Math.round(width * dpr);
        canvas.height = Math.round(height * dpr);
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);

        const count = Math.min(Math.round(width * height * DENSITY), MAX_PARTICLES);
        particles = Array.from({ length: count }, () => spark(true));
    };

    const frame = () => {
        ctx.clearRect(0, 0, width, height);

        particles.forEach((p, i) => {
            p.life += 1;
            p.y -= p.vy;
            p.x += p.vx + Math.sin(p.life * p.drift) * 0.4;

            // Fade in over the first fifth of the life, out over the last third.
            const t = p.life / p.span;
            const alpha = t < 0.2 ? t / 0.2 : t > 0.68 ? Math.max(0, (1 - t) / 0.32) : 1;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `hsla(${p.hue}, 92%, 62%, ${(alpha * 0.85).toFixed(3)})`;
            ctx.shadowBlur = 12;
            ctx.shadowColor = `hsla(${p.hue}, 95%, 58%, ${(alpha * 0.5).toFixed(3)})`;
            ctx.fill();

            if (p.life > p.span || p.y < -20) particles[i] = spark();
        });

        ctx.shadowBlur = 0;
        raf = requestAnimationFrame(frame);
    };

    const start = () => {
        if (raf === null && visible) raf = requestAnimationFrame(frame);
    };

    const stop = () => {
        if (raf !== null) cancelAnimationFrame(raf);
        raf = null;
    };

    resize();
    canvas.classList.add('is-ready');
    start();

    let resizeTimer;
    window.addEventListener(
        'resize',
        () => {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(resize, 180);
        },
        { passive: true }
    );

    document.addEventListener('visibilitychange', () => {
        document.hidden ? stop() : start();
    });

    // Pause once the hero has fully scrolled away.
    if ('IntersectionObserver' in window) {
        new IntersectionObserver(
            ([entry]) => {
                visible = entry.isIntersecting;
                visible ? start() : stop();
            },
            { threshold: 0 }
        ).observe(canvas);
    }
}
