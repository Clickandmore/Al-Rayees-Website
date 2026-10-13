@props([
    'title' => null,
    'lead' => null,
    'alt' => false,
    'headingLevel' => 2,
])

{{--
    A full-width page band: one solid background (white, or off-white with
    `alt`), the shared container, an optional heading + lead, then the slot.

    <x-section :title="…" :lead="…" alt> … </x-section>
--}}

<section {{ $attributes->class(['section', 'section--alt' => $alt]) }}>
    <div class="container">
        @if ($title || $lead)
            <header class="section__head" data-aos="fade-up">
                @if ($title)
                    <h{{ $headingLevel }} class="section__title">{{ $title }}</h{{ $headingLevel }}>
                @endif

                @if ($lead)
                    <p class="section__lead">{{ $lead }}</p>
                @endif
            </header>
        @endif

        {{ $slot }}
    </div>
</section>
