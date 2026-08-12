@php
    // Nav links: the group-level sections plus each division.
    $navSections = collect(config('site.sections'))->where('nav', true);
    $altRoute = config("site.locales.{$altLocale}.route");
@endphp

<header class="header" data-header>
    <div class="header__bar">
        <a class="brand" href="{{ route(config("site.locales.{$locale}.route")) }}" aria-label="{{ config('site.company.name') }}">
            <span class="brand__mark"><x-logo /></span>
            <span class="brand__text">
                <span class="brand__name">{{ __('site.brand.name') }}</span>
                <span class="brand__suffix">{{ __('site.brand.suffix') }}</span>
            </span>
        </a>

        <nav class="nav" aria-label="{{ __('site.nav.menu') }}">
            @foreach ($navSections as $section)
                <a class="nav__link" href="#{{ $section['id'] }}" data-nav-link>
                    {{ __($section['label']) }}
                </a>
            @endforeach
        </nav>

        <div class="header__actions">
            <a class="lang-switch" href="{{ route($altRoute) }}" hreflang="{{ $altLocale }}" title="{{ __('site.nav.lang_full') }}">
                <x-icon name="languages" />
                {{ __('site.nav.lang') }}
            </a>

            <a class="btn btn--primary btn--sm header__cta" href="#contact" data-magnetic>
                {{ __('site.nav.cta') }}
            </a>

            <button
                class="nav-toggle"
                type="button"
                data-nav-toggle
                aria-expanded="false"
                aria-controls="site-drawer"
                aria-label="{{ __('site.nav.menu') }}"
            >
                <span class="nav-toggle__bars" aria-hidden="true"><i></i><i></i><i></i></span>
            </button>
        </div>
    </div>

    <span class="header__progress" data-progress aria-hidden="true"></span>
</header>

{{-- Mobile drawer: every section, including the individual divisions. --}}
<div class="drawer" id="site-drawer" data-drawer aria-hidden="true">
    <nav class="container drawer__list" aria-label="{{ __('site.nav.menu') }}">
        @foreach (config('site.sections') as $i => $section)
            <a class="drawer__link" href="#{{ $section['id'] }}" style="--i: {{ $i }}">
                <span class="drawer__index num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                {{ __($section['label']) }}
            </a>
        @endforeach
    </nav>
</div>
