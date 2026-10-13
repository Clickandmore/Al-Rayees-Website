@props(['card'])

{{-- One contact card per division / location, used on the contact page. --}}

@php
    $icons = [
        'tel' => 'phone',
        'mail' => 'mail',
        'web' => 'web',
        'chat' => 'chat',
        'social' => 'social',
    ];
@endphp

<article {{ $attributes->class(['card', 'contact-card', "theme-{$card['key']}"])->merge(['data-aos' => 'fade-up']) }}>
    <header class="contact-card__head">
        <span class="contact-card__icon"><x-icon :name="config('site.divisions.' . $card['key'] . '.icon')" /></span>
        <h2 class="card__title">{{ $card['name'] }}</h2>
        <span class="contact-card__place">
            <x-icon name="pin" />
            {{ $card['place'] }}
        </span>
    </header>

    <ul class="contact-card__rows">
        @foreach ($card['rows'] as $row)
            <li>
                <a
                    class="contact-row"
                    href="{{ $row['href'] }}"
                    @if (str_starts_with($row['href'], 'http')) target="_blank" rel="noopener noreferrer" @endif
                >
                    <x-icon :name="$icons[$row['type']] ?? 'web'" />
                    <span class="sr-only">{{ $row['label'] }}:</span>
                    <span class="ltr">{{ $row['value'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</article>
