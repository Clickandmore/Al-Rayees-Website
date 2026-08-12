@props(['card'])

{{-- One contact block per division / location. --}}

@php
    // Maps a row type to its icon and whether the link leaves the site.
    $icons = [
        'tel' => 'phone',
        'mail' => 'mail',
        'web' => 'web',
        'chat' => 'chat',
        'social' => 'social',
    ];
@endphp

<article class="card contact-card u-accent-{{ $card['key'] }}" data-reveal>
    <header class="contact-card__head">
        <h3 class="contact-card__name">{{ $card['name'] }}</h3>
        <span class="contact-card__place">
            <x-icon name="pin" />
            {{ $card['place'] }}
        </span>
    </header>

    <div class="contact-card__rows">
        @foreach ($card['rows'] as $row)
            @php
                $external = str_starts_with($row['href'], 'http');
            @endphp

            <a
                class="contact-row"
                href="{{ $row['href'] }}"
                @if ($external) target="_blank" rel="noopener noreferrer" @endif
            >
                <span class="contact-row__icon">
                    <x-icon :name="$icons[$row['type']] ?? 'web'" />
                </span>

                <span class="sr-only">{{ $row['label'] }}:</span>
                <span class="contact-row__value">{{ $row['value'] }}</span>

                <span class="contact-row__go" aria-hidden="true">
                    <x-icon name="arrow" />
                </span>
            </a>
        @endforeach
    </div>
</article>
