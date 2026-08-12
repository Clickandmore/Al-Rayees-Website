@props(['items' => []])

{{-- Label / value rows. Values are isolated so Latin numbers read correctly
     inside Arabic (RTL) copy. --}}

<dl class="meta-list" {{ $attributes }}>
    @foreach ($items as $item)
        <div class="meta-row">
            <dt>{{ $item['label'] }}</dt>
            <dd><span class="ltr">{{ $item['value'] }}</span></dd>
        </div>
    @endforeach
</dl>
