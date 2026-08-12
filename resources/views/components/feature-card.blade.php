@props(['title', 'text' => null, 'icon' => null, 'index' => null])

{{-- Generic icon + title + text card (why-us, guarantees, services). --}}

<article class="card" data-reveal>
    @if ($icon)
        <span class="icon-chip"><x-icon :name="$icon" /></span>
    @elseif ($index)
        <span class="card__index num">{{ $index }}</span>
    @endif

    <h4 class="card__title">{{ $title }}</h4>

    @isset($text)
        <p class="card__text">{{ $text }}</p>
    @endisset

    {{ $slot }}
</article>
