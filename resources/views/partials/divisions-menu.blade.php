{{--
    The divisions menu, shared by the header dropdown and the mobile drawer.
    One card per division — icon in the division's colour, name, a line of
    description — with its profile pages as chips underneath.

    Expects: $current (fn(key) → 'page'|null) from the header.
--}}

@php
    $profiles = collect(config('site.pages'))->whereNotNull('parent')->groupBy('parent', true);
@endphp

<ul class="divmenu__grid">
    @foreach (config('site.divisions') as $key => $division)
        @php
            $card = __('site.cards')[$division['card']];
            $active = $current($key) || $profiles->get($key, collect())->keys()->contains(fn ($sub) => $current($sub));
        @endphp

        <li @class(['divmenu__card', "theme-{$key}", 'is-active' => $active])>
            <span class="divmenu__icon"><x-icon :name="$division['icon']" /></span>

            <div class="divmenu__body">
                <a class="divmenu__title" href="{{ route("{$locale}.{$key}") }}" aria-current="{{ $current($key) }}">
                    {{ __(config("site.pages.{$key}.label")) }}
                    <x-icon name="arrow" class="icon-flip divmenu__arrow" />
                </a>
                <p class="divmenu__text">{{ $card['text'] }}</p>

                @if ($profiles->has($key))
                    <div class="divmenu__chips">
                        @foreach ($profiles->get($key) as $sub => $profile)
                            <a class="divmenu__chip" href="{{ route("{$locale}.{$sub}") }}" aria-current="{{ $current($sub) }}">
                                <x-icon name="file" />
                                {{ __($profile['short']) }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </li>
    @endforeach
</ul>
