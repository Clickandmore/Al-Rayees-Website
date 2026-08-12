@props(['animated' => true])

{{--
    Brand mark: four quadrants set inside a rotating ring — one facet per
    division, held together by a single centre. Pure SVG, no image request.
--}}

<svg viewBox="0 0 48 48" aria-hidden="true" focusable="false">
    <defs>
        <linearGradient id="ar-mark-{{ $animated ? 'a' : 'b' }}" x1="0" y1="0" x2="1" y2="1">
            <stop offset="0%" stop-color="var(--accent-2)" />
            <stop offset="100%" stop-color="var(--accent)" />
        </linearGradient>
    </defs>

    <circle
        @class(['mark-ring' => $animated])
        cx="24" cy="24" r="21"
        stroke="var(--accent)" stroke-opacity=".38"
        stroke-width="1" stroke-dasharray="3 7" fill="none"
    />

    <g stroke="url(#ar-mark-{{ $animated ? 'a' : 'b' }})" stroke-width="1.8" stroke-linejoin="round" fill="none">
        <path d="M24 7 41 24 24 41 7 24 24 7Z" />
        <path d="M24 15.5 32.5 24 24 32.5 15.5 24 24 15.5Z" stroke-opacity=".55" />
    </g>

    <circle cx="24" cy="24" r="2.6" fill="var(--accent)" />
</svg>
