@props([
    'eyebrow' => null,
    'title' => null,
    'highlight' => null,
    'lead' => null,
    'center' => false,
])

{{--
    Eyebrow + title + lead.
    `highlight` is a substring of `title` that gets the accent gradient —
    this keeps the language files free of markup while still allowing a
    typographic emphasis. Everything is escaped.
--}}

@php
    $before = $title;
    $after = null;

    if ($title && $highlight && ($at = mb_strpos($title, $highlight)) !== false) {
        $before = mb_substr($title, 0, $at);
        $after = mb_substr($title, $at + mb_strlen($highlight));
    } else {
        $highlight = null;
    }
@endphp

<div @class(['section-head', 'section-head--center' => $center]) data-reveal-group>
    @isset($eyebrow)
        <span class="eyebrow" data-reveal="fade">{{ $eyebrow }}</span>
    @endisset

    @isset($title)
        <h2 class="section-title" data-reveal>
            {{ $before }}@if ($highlight)<em>{{ $highlight }}</em>@endif{{ $after }}
        </h2>
    @endisset

    @isset($lead)
        <p class="section-lead" data-reveal>{{ $lead }}</p>
    @endisset

    {{ $slot }}
</div>
