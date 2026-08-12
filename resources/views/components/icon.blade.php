@props(['name', 'class' => null])

{{--
    Inline icon set. Keeping every glyph in one component means no sprite
    request, no icon package, and one place to audit the markup.
    Usage: <x-icon name="flame" />
--}}

@php
    $attributes = $attributes->merge([
        'viewBox' => '0 0 24 24',
        'fill' => 'none',
        'stroke' => 'currentColor',
        'stroke-width' => '1.6',
        'stroke-linecap' => 'round',
        'stroke-linejoin' => 'round',
        'aria-hidden' => 'true',
        'focusable' => 'false',
    ]);
@endphp

<svg {{ $class ? $attributes->class($class) : $attributes }} xmlns="http://www.w3.org/2000/svg">
    @switch($name)
        @case('flame')
            <path d="M12 2.7c.9 3 3 3.9 4.4 6.1a6.6 6.6 0 1 1-11.4 4.5c0-2.3 1.1-3.9 2.3-5.2" />
            <path d="M12 20.5a3.2 3.2 0 0 0 3.2-3.2c0-2-1.6-2.9-2.3-4.4-.9 1.3-2.4 2-3.4 3.4a3.1 3.1 0 0 0 2.5 4.2Z" />
            @break

        @case('weave')
            <rect x="3" y="3" width="18" height="18" rx="3" />
            <path d="M3 9h18M3 15h18M9 3v18M15 3v18" />
            @break

        @case('tooth')
            <path d="M8 2.8c1.3 0 1.8.8 4 .8s2.7-.8 4-.8c2 0 3.4 1.6 3.4 4 0 2.1-.8 3.2-1.2 5.3-.3 1.6-.4 3.3-.8 5-.3 1.3-.8 2.4-1.7 2.4-1.2 0-1.4-1.5-1.7-3.3-.3-1.7-.6-3.2-2-3.2s-1.7 1.5-2 3.2c-.3 1.8-.5 3.3-1.7 3.3-.9 0-1.4-1.1-1.7-2.4-.4-1.7-.5-3.4-.8-5C5.4 10 4.6 8.9 4.6 6.8c0-2.4 1.4-4 3.4-4Z" />
            @break

        @case('people')
            <path d="M16.5 20v-1.6a3.4 3.4 0 0 0-3.4-3.4H6.9a3.4 3.4 0 0 0-3.4 3.4V20" />
            <circle cx="10" cy="7.4" r="3.4" />
            <path d="M20.5 20v-1.6a3.4 3.4 0 0 0-2.5-3.3M15.4 4.2a3.4 3.4 0 0 1 0 6.5" />
            @break

        @case('layers')
            <path d="m12 2.6 9 4.7-9 4.7-9-4.7 9-4.7Z" />
            <path d="m3 12.4 9 4.7 9-4.7M3 17.1l9 4.7 9-4.7" />
            @break

        @case('globe')
            <circle cx="12" cy="12" r="9.2" />
            <path d="M3 12h18M12 2.8c2.4 2.6 3.6 5.8 3.6 9.2s-1.2 6.6-3.6 9.2c-2.4-2.6-3.6-5.8-3.6-9.2S9.6 5.4 12 2.8Z" />
            @break

        @case('badge')
            <path d="m12 2.6 2.5 1.8 3-.3 1 2.9 2.5 1.7-1 2.9 1 2.9-2.5 1.7-1 2.9-3-.3L12 21.4l-2.5-1.8-3 .3-1-2.9L3 15.3l1-2.9-1-2.9 2.5-1.7 1-2.9 3 .3L12 2.6Z" />
            <path d="m8.8 12.2 2.2 2.2 4.2-4.5" />
            @break

        @case('clock')
            <circle cx="12" cy="12" r="9.2" />
            <path d="M12 6.8V12l3.4 2" />
            @break

        @case('target')
            <circle cx="12" cy="12" r="9.2" />
            <circle cx="12" cy="12" r="5" />
            <circle cx="12" cy="12" r="1.1" fill="currentColor" stroke="none" />
            @break

        @case('map')
            <path d="m9 3.4 6 2.8 5-2.4v14.8l-5 2.4-6-2.8-5 2.4V6.2l5-2.8Z" />
            <path d="M9 3.4v14.8M15 6.2V21" />
            @break

        @case('droplet')
            <path d="M12 2.9c3.3 3.6 6.2 6.4 6.2 10a6.2 6.2 0 1 1-12.4 0c0-3.6 2.9-6.4 6.2-10Z" />
            <path d="M9.4 14.4a2.7 2.7 0 0 0 2.6 2.6" />
            @break

        @case('package')
            <path d="M20.4 7.9v8.2a1.8 1.8 0 0 1-.9 1.6l-6.6 3.7a1.8 1.8 0 0 1-1.8 0l-6.6-3.7a1.8 1.8 0 0 1-.9-1.6V7.9a1.8 1.8 0 0 1 .9-1.6l6.6-3.7a1.8 1.8 0 0 1 1.8 0l6.6 3.7a1.8 1.8 0 0 1 .9 1.6Z" />
            <path d="m3.9 7 8.1 4.6L20.1 7M12 21.2v-9.6" />
            @break

        @case('leaf')
            <path d="M11 20.5c-4.2 0-7-2.8-7-7 0-6.2 6-10 16-10 0 10-3.8 17-9 17Z" />
            <path d="M4.5 20.5c1.5-5 5-9 11-11.5" />
            @break

        @case('star')
            <path d="m12 3.1 2.8 5.7 6.3.9-4.6 4.4 1.1 6.2-5.6-3-5.6 3 1.1-6.2L3 9.7l6.3-.9L12 3.1Z" />
            @break

        @case('check')
            <path d="m4.5 12.5 5 5 10-11" />
            @break

        @case('arrow')
            <path d="M4.5 12h15M13.5 6l6 6-6 6" />
            @break

        @case('arrow-up')
            <path d="M12 19.5v-15M6 10.5l6-6 6 6" />
            @break

        @case('chevron-down')
            <path d="m6 9.5 6 6 6-6" />
            @break

        @case('phone')
            <path d="M21 16.9v2.6a1.7 1.7 0 0 1-1.9 1.7 17.3 17.3 0 0 1-7.5-2.7 17 17 0 0 1-5.2-5.2A17.3 17.3 0 0 1 3.7 5.7 1.7 1.7 0 0 1 5.4 3.8H8a1.7 1.7 0 0 1 1.7 1.5c.1.8.3 1.7.6 2.5a1.7 1.7 0 0 1-.4 1.8L8.8 10.8a14 14 0 0 0 5.2 5.2l1.2-1.1a1.7 1.7 0 0 1 1.8-.4c.8.3 1.6.5 2.5.6A1.7 1.7 0 0 1 21 16.9Z" />
            @break

        @case('mail')
            <rect x="2.8" y="4.8" width="18.4" height="14.4" rx="2.4" />
            <path d="m3.4 6.6 7.6 5.3a1.8 1.8 0 0 0 2 0l7.6-5.3" />
            @break

        @case('web')
            <circle cx="12" cy="12" r="9.2" />
            <path d="M3.4 9.4h17.2M3.4 14.6h17.2M12 2.8c2.2 2.6 3.3 5.8 3.3 9.2s-1.1 6.6-3.3 9.2c-2.2-2.6-3.3-5.8-3.3-9.2S9.8 5.4 12 2.8Z" />
            @break

        @case('chat')
            <path d="M20.8 11.6a8.3 8.3 0 0 1-11.9 7.5L3.2 20.8l1.7-5.6a8.3 8.3 0 1 1 15.9-3.6Z" />
            @break

        @case('social')
            <circle cx="17.5" cy="5.8" r="2.8" />
            <circle cx="6.5" cy="12" r="2.8" />
            <circle cx="17.5" cy="18.2" r="2.8" />
            <path d="m8.9 10.6 6.2-3.4M8.9 13.4l6.2 3.4" />
            @break

        @case('pin')
            <path d="M20 10.4c0 5.6-8 11-8 11s-8-5.4-8-11a8 8 0 0 1 16 0Z" />
            <circle cx="12" cy="10.2" r="2.8" />
            @break

        @case('languages')
            <path d="M3.4 5.6h8.2M7.3 3.4v2.2M9.6 5.6c-.4 3.6-2.6 6.8-5.6 8.4M6.2 9.9c1 1.9 2.6 3.4 4.6 4.2" />
            <path d="m12.6 20.6 4-9.4 4 9.4M14.2 17.2h4.8" />
            @break

        @case('quote')
            <path d="M9.4 6.6C6.8 8 5.4 10.2 5.4 13v4.4h5.2V12H8.2c0-1.8.8-3.2 2.4-4.2l-1.2-1.2ZM18 6.6C15.4 8 14 10.2 14 13v4.4h5.2V12h-2.4c0-1.8.8-3.2 2.4-4.2L18 6.6Z" />
            @break

        @case('sparkle')
            <path d="M12 3.2 13.7 9l5.8 1.7-5.8 1.7L12 18.2l-1.7-5.8L4.5 10.7 10.3 9 12 3.2Z" />
            @break

        @case('shield')
            <path d="M12 2.8l7.4 3v5.6c0 4.5-3 8.4-7.4 9.8-4.4-1.4-7.4-5.3-7.4-9.8V5.8l7.4-3Z" />
            <path d="m8.9 12 2.1 2.1 4.1-4.4" />
            @break

        @case('doc')
            <path d="M14 2.9H7.2a2 2 0 0 0-2 2v14.2a2 2 0 0 0 2 2h9.6a2 2 0 0 0 2-2V7.9L14 2.9Z" />
            <path d="M14 2.9v5h4.8M8.8 13.2h6.4M8.8 16.8h4.4" />
            @break

        @case('ship')
            <path d="M3.4 16.4c1.6 0 1.6 1.4 3.2 1.4s1.6-1.4 3.2-1.4 1.6 1.4 3.2 1.4 1.6-1.4 3.2-1.4 1.6 1.4 3.2 1.4" />
            <path d="M4.6 13.2 12 10.8l7.4 2.4-1.5 3.5M12 10.8V6.2M8.6 6.2h6.8" />
            @break

        @default
            <circle cx="12" cy="12" r="9" />
    @endswitch
</svg>
