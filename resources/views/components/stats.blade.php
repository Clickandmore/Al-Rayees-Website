@props(['items' => [], 'inline' => false])

{{--
    Animated counter strip. Each item: value, optional prefix/suffix, label.
    The number itself is counted up by js/modules/counters.js.
--}}

<dl {{ $attributes->class(['stats', 'stats--inline' => $inline]) }} data-reveal-group>
    @foreach ($items as $item)
        <div class="stat" data-reveal="scale">
            <dd class="stat__value">
                @isset($item['prefix'])
                    <span aria-hidden="true">{{ $item['prefix'] }}</span>
                @endisset
                <span class="num" data-count="{{ $item['value'] }}">{{ $item['value'] }}</span>
                @if (! empty($item['suffix']))
                    <span aria-hidden="true">{{ $item['suffix'] }}</span>
                @endif
            </dd>
            <dt class="stat__label">{{ $item['label'] }}</dt>
        </div>
    @endforeach
</dl>
