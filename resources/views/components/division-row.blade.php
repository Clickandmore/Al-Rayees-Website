@props(['division', 'index' => 0])

{{--
    Home-page showcase row for a division: a large visual beside its
    number, name, summary and link — painted in the division's own theme
    colour (.theme-{division}). Rows alternate sides.
--}}

@php
    $locale = app()->getLocale();
    $config = config("site.divisions.{$division}");
    $card = __('site.cards')[$config['card']];
    $even = $index % 2 === 0;
@endphp

<article @class(['division-row', "theme-{$division}", 'division-row--flip' => ! $even])>
    <a class="division-row__visual" href="{{ route("{$locale}.{$division}") }}" tabindex="-1" aria-hidden="true"
       data-aos="{{ $even ? $aosStart : $aosEnd }}">
        @if ($config['image'])
            <img src="{{ asset($config['image']) }}" alt="" width="1200" height="900" loading="lazy">
        @elseif ($config['visual'] === 'carpet')
            <span class="division-row__art division-row__art--carpet">
                <img src="{{ asset('assets/illustrations/danaroz-carpet.svg') }}" alt="" width="480" height="640" loading="lazy">
            </span>
        @elseif ($config['visual'] === 'map')
            <span class="division-row__art division-row__art--map">
                <x-world-map
                    variant="dark"
                    hub="manila"
                    :highlight="['ph', 'kw', 'jo', 'om', 'qa', 'sa']"
                    :routes="[['manila', 'kuwait'], ['manila', 'amman'], ['manila', 'muscat'], ['manila', 'doha'], ['manila', 'riyadh']]"
                    viewBox="330 120 520 260"
                />
            </span>
        @endif
    </a>

    <div class="division-row__body" data-aos="fade-up" data-aos-delay="150">
        <span class="division-row__num" aria-hidden="true">{{ $card['index'] }}</span>

        <span class="division-row__icon"><x-icon :name="$config['icon']" /></span>

        <h3 class="division-row__title">
            <a href="{{ route("{$locale}.{$division}") }}">{{ $card['title'] }}</a>
        </h3>

        <p class="division-row__text">{{ $card['text'] }}</p>

        <span class="link-arrow division-row__link" aria-hidden="true">
            {{ __('site.common.discover') }}
            <x-icon name="arrow" />
        </span>
    </div>
</article>
