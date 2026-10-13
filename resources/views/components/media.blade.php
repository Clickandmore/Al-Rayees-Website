@props([
    'src' => null,
    'alt' => '',
    // CSS aspect-ratio: '4/3' or '16/9'.
    'ratio' => '4/3',
    'eager' => false,
])

{{--
    A photo at a fixed aspect ratio, cropped to fill — or, when no photo has
    been supplied yet, a neutral grey placeholder at the same size.
--}}

<figure {{ $attributes->class('media') }} style="aspect-ratio: {{ $ratio }}">
    @if ($src)
        <img
            src="{{ asset($src) }}"
            alt="{{ $alt }}"
            width="1200"
            height="{{ $ratio === '16/9' ? 675 : 900 }}"
            loading="{{ $eager ? 'eager' : 'lazy' }}"
            decoding="async"
        >
    @else
        <!-- TODO: صورة حقيقية -->
        <div class="media__placeholder" role="img" aria-label="{{ $alt }}">
            <x-icon name="image" />
        </div>
    @endif
</figure>
