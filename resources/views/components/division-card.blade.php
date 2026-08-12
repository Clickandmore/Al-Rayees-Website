@props(['card'])

{{-- Entry card for a division, linking down to its detail band. --}}

<a
    href="#{{ $card['anchor'] }}"
    class="card card--tilt division-card u-accent-{{ $card['key'] }}"
    data-reveal="scale"
>
    <span class="division-card__glow" aria-hidden="true"></span>

    <span class="division-card__head">
        <span class="icon-chip"><x-icon :name="$card['icon']" /></span>
        <span class="card__index num">{{ $card['index'] }}</span>
    </span>

    <span class="division-card__body">
        <span class="card__title">{{ $card['title'] }}</span>
        <span class="card__text">{{ $card['text'] }}</span>

        <span class="division-card__cta">
            {{ __('site.common.discover') }}
            <x-icon name="arrow" />
        </span>
    </span>
</a>
