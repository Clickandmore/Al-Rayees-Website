@props(['title' => null, 'items' => []])

{{-- A division's contact details: a bordered card holding a label/value list. --}}

<div {{ $attributes->class('contact-block')->merge(['data-aos' => 'fade-up']) }}>
    @if ($title)
        <h3 class="contact-block__title">{{ $title }}</h3>
    @endif

    <x-meta-list :items="$items" />
</div>
