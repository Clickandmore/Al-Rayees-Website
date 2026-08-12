{{--
    Decorative wireframe globe with pulsing location pins — one per market
    listed in site.coverage.pins. Purely ornamental, hidden from assistive
    technology; the countries are also written out beside it.
--}}

@php
    // Fixed pin coordinates on the 120×120 sphere — arranged to read as a
    // spread across the group's regions rather than a literal map.
    $pins = [[46, 44], [54, 36], [40, 52], [86, 62], [62, 50]];
@endphp

<div class="coverage__globe" aria-hidden="true">
    <svg viewBox="0 0 120 120">
        <g class="globe-grid">
            <circle cx="60" cy="60" r="46" />
            <ellipse cx="60" cy="60" rx="46" ry="16" />
            <ellipse cx="60" cy="60" rx="46" ry="31" />
            <ellipse cx="60" cy="60" rx="16" ry="46" />
            <ellipse cx="60" cy="60" rx="31" ry="46" />
            <path d="M14 60h92M60 14v92" />
        </g>

        <circle class="globe-ring" cx="60" cy="60" r="54" stroke-dasharray="2 9" />

        @foreach ($pins as $i => [$x, $y])
            <g style="--i: {{ $i }}">
                <circle class="globe-pin-halo" cx="{{ $x }}" cy="{{ $y }}" r="3" />
                <circle class="globe-pin" cx="{{ $x }}" cy="{{ $y }}" r="2.2" />
            </g>
        @endforeach
    </svg>
</div>
