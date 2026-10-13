@props([
    // Country keys from config/map.php to fill with the accent colour.
    'highlight' => [],
    // Animated arcs: [[fromPoint, toPoint], …] using config/map.php point keys.
    'routes' => [],
    // Extra point keys to mark with a pin (route ends are pinned automatically).
    'pins' => [],
    // The hub is drawn larger; usually the routes' common origin.
    'hub' => null,
    // 'light' (on white / off-white) or 'dark' (on navy / ink bands).
    'variant' => 'light',
    // Optional crop of the 1000×520 frame: "x y w h".
    'viewBox' => null,
    'label' => null,
])

{{--
    Flat map of the group's markets: real coastlines (Natural Earth, see
    config/map.php), highlighted countries, and arcs that draw themselves in
    when AOS reveals the map (CSS: .aos-animate .world-map__route).
--}}

@php
    $map = config('map');
    $points = $map['points'];
    $viewBox ??= "0 0 {$map['width']} {$map['height']}";

    $pinned = collect($routes)->flatten()->merge($pins)->merge($hub ? [$hub] : [])->unique()->values();

    // A gentle arc: the control point sits above the chord's midpoint,
    // lifted in proportion to the distance travelled.
    $arc = function (string $from, string $to) use ($points): string {
        [$x1, $y1] = $points[$from];
        [$x2, $y2] = $points[$to];
        $mx = ($x1 + $x2) / 2;
        $my = ($y1 + $y2) / 2 - hypot($x2 - $x1, $y2 - $y1) * 0.28;

        return sprintf('M%.1f %.1fQ%.1f %.1f %.1f %.1f', $x1, $y1, $mx, $my, $x2, $y2);
    };
@endphp

<div {{ $attributes->class(['world-map', "world-map--{$variant}"]) }}>
    <svg viewBox="{{ $viewBox }}" @if ($label) role="img" aria-label="{{ $label }}" @else aria-hidden="true" @endif>
        <image href="{{ asset("assets/illustrations/map-land-{$variant}.svg") }}" x="0" y="0" width="{{ $map['width'] }}" height="{{ $map['height'] }}" />

        <g class="world-map__countries">
            @foreach ($highlight as $country)
                <path d="{{ $map['countries'][$country] }}" />
            @endforeach
        </g>

        <g class="world-map__routes">
            @foreach ($routes as $i => [$from, $to])
                <path class="world-map__route" d="{{ $arc($from, $to) }}" pathLength="1" style="--i: {{ $i }}" />
            @endforeach
        </g>

        <g class="world-map__pins">
            @foreach ($pinned as $i => $point)
                <g @class(['world-map__pin', 'world-map__pin--hub' => $point === $hub]) style="--i: {{ $i }}">
                    <circle cx="{{ $points[$point][0] }}" cy="{{ $points[$point][1] }}" r="{{ $point === $hub ? 7 : 4.5 }}" />
                </g>
            @endforeach
        </g>
    </svg>
</div>
