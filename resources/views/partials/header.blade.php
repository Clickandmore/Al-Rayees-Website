@php
    $divisions = array_keys(config('site.divisions'));
    $parent = config("site.pages.{$page}.parent");
    $inDivisions = in_array($page, $divisions, true) || $parent !== null;

    $current = fn (string $key) => $page === $key ? 'page' : null;
@endphp

<header class="header" data-header>
    <div class="container header__bar">
        <a class="header__brand" href="{{ route("{$locale}.home") }}">
            <x-logo />
        </a>

        <nav class="nav" aria-label="{{ __('site.nav.menu') }}">
            <ul class="nav__list">
                <li><a class="nav__link" href="{{ route("{$locale}.home") }}" aria-current="{{ $current('home') }}">{{ __('site.nav.home') }}</a></li>
                <li><a class="nav__link" href="{{ route("{$locale}.about") }}" aria-current="{{ $current('about') }}">{{ __('site.nav.about') }}</a></li>

                <li class="nav__item" data-dropdown>
                    <button
                        @class(['nav__link', 'nav__link--trigger', 'is-active' => $inDivisions])
                        type="button"
                        aria-expanded="false"
                        aria-controls="nav-divisions"
                    >
                        {{ __('site.nav.divisions') }}
                        <x-icon name="chevron-down" />
                    </button>

                    <div class="dropdown divmenu" id="nav-divisions">
                        @include('partials.divisions-menu')

                        <a class="divmenu__all" href="{{ route("{$locale}.home") }}#divisions">
                            {{ __('site.nav.all_divisions') }}
                            <x-icon name="arrow" class="icon-flip" />
                        </a>
                    </div>
                </li>

                <li><a class="nav__link" href="{{ route("{$locale}.contact") }}" aria-current="{{ $current('contact') }}">{{ __('site.nav.contact') }}</a></li>
            </ul>
        </nav>

        <div class="header__actions">
            <a
                class="lang-switch"
                href="{{ route("{$altLocale}.{$page}") }}"
                hreflang="{{ $altLocale }}"
                lang="{{ $altLocale }}"
                title="{{ __('site.nav.lang_full') }}"
            >
                <x-icon name="languages" />
                {{ __('site.nav.lang') }}
            </a>

            <a class="btn btn--primary btn--sm header__cta" href="{{ route("{$locale}.contact") }}">
                {{ __('site.nav.cta') }}
            </a>

            <button
                class="nav-toggle"
                type="button"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="site-drawer"
            >
                <span class="sr-only">{{ __('site.nav.menu') }}</span>
                <x-icon name="menu" class="nav-toggle__open" />
                <x-icon name="x" class="nav-toggle__close" />
            </button>
        </div>
    </div>
</header>

{{-- Mobile drawer: the same links, with the divisions listed inline. --}}
<div class="drawer" id="site-drawer" data-drawer hidden>
    <nav class="container" aria-label="{{ __('site.nav.menu') }}">
        <ul class="drawer__list">
            <li><a class="drawer__link" href="{{ route("{$locale}.home") }}" aria-current="{{ $current('home') }}">{{ __('site.nav.home') }}</a></li>
            <li><a class="drawer__link" href="{{ route("{$locale}.about") }}" aria-current="{{ $current('about') }}">{{ __('site.nav.about') }}</a></li>
            <li>
                <span class="drawer__group">{{ __('site.nav.divisions') }}</span>
                <div class="divmenu divmenu--drawer">
                    @include('partials.divisions-menu')
                </div>
            </li>
            <li><a class="drawer__link" href="{{ route("{$locale}.contact") }}" aria-current="{{ $current('contact') }}">{{ __('site.nav.contact') }}</a></li>
        </ul>

        <div class="drawer__actions">
            <a class="btn btn--primary" href="{{ route("{$locale}.contact") }}">{{ __('site.nav.cta') }}</a>
            <a class="btn btn--outline" href="{{ route("{$altLocale}.{$page}") }}" hreflang="{{ $altLocale }}" lang="{{ $altLocale }}">
                <x-icon name="languages" />
                {{ __('site.nav.lang') }}
            </a>
        </div>
    </nav>
</div>
