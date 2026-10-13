@props([
    // Number of parallel contour lines.
    'lines' => 14,
    // Corner the ribbon sweeps from: 'top-end' or 'bottom-start'.
    'corner' => 'top-end',
])

{{--
    The flowing gold contour ribbon from the Jordan profile: a fan of
    parallel curves, each offset a little from the last. Purely decorative;
    the lines draw themselves in on load (css: .gold-waves).
--}}

<svg {{ $attributes->class(['gold-waves', "gold-waves--{$corner}"]) }} viewBox="0 0 400 400" aria-hidden="true" focusable="false">
    @for ($i = 0; $i < $lines; $i++)
        @php
            $o = $i * 7;
            $d = sprintf(
                'M%d -10 C %d 90, %d 140, %d 210 S %d 330, 410 %d',
                120 + $o, 60 + $o * 1.4, 300 - $o * .6, 230 - $o * .2, 360 - $o * .8, 300 + $o * 1.2
            );
        @endphp
        <path d="{{ $d }}" pathLength="1" style="--i: {{ $i }}" />
    @endfor
</svg>
