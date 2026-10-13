@props(['title', 'text' => null, 'icon' => null, 'card' => true])

{{--
    Icon + title + text. As a bordered card (default) or, with
    :card="false", as a plain column item separated by a top rule.
--}}

<article {{ $attributes->class(['feature', 'card' => $card, 'feature--plain' => ! $card])->merge(['data-aos' => 'fade-up']) }}>
    @if ($icon)
        <x-icon :name="$icon" class="feature__icon" />
    @endif

    <h3 class="card__title">{{ $title }}</h3>

    @isset($text)
        <p class="card__text">{{ $text }}</p>
    @endisset

    {{ $slot }}
</article>
