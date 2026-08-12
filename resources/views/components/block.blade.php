@props(['title', 'sub' => null])

{{-- A titled sub-block inside a division band. --}}

<section class="block">
    <header class="block__head" data-reveal="fade">
        <h3 class="block__title">{{ $title }}</h3>

        @isset($sub)
            <p class="block__sub">{{ $sub }}</p>
        @endisset

        {{ $aside ?? '' }}
    </header>

    {{ $slot }}
</section>
