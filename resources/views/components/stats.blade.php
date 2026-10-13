@props(['items' => []])

{{--
    Key figures in a row, separated by thin rules — large number counting
    up on first view (js/modules/counters.js), small label underneath.
    Each item: value, optional prefix/suffix, label.
--}}

<dl {{ $attributes->class('stats') }}>
    @foreach ($items as $i => $item)
        <div class="stat" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <dt class="stat__label">{{ $item['label'] }}</dt>
            <dd class="stat__value">
                <span class="ltr">{{ $item['prefix'] ?? '' }}<span data-count="{{ $item['value'] }}">{{ $item['value'] }}</span>{{ $item['suffix'] ?? '' }}</span>
            </dd>
        </div>
    @endforeach
</dl>
