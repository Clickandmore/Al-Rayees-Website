<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="theme-color" content="#07080C">

    <title>@yield('title', __('site.meta.title'))</title>
    <meta name="description" content="@yield('description', __('site.meta.description'))">

    {{-- Each language has its own canonical URL. --}}
    <link rel="canonical" href="{{ url()->current() }}">
    @foreach (config('site.locales') as $code => $config)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ route($config['route']) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ route('home.en') }}">

    {{-- Social preview --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ $locale === 'ar' ? 'ar_JO' : 'en_US' }}">
    <meta property="og:title" content="{{ __('site.meta.title') }}">
    <meta property="og:description" content="{{ __('site.meta.description') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    {{-- Fonts: Sora for Latin, IBM Plex Sans Arabic for Arabic. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@300;400;500;600;700&family=Sora:wght@200;300;400;500;600;700&display=swap"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('partials.preloader')

    <a class="skip-link" href="#main">{{ __('site.nav.skip') }}</a>

    @include('partials.background')
    @include('partials.header')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')

    <button class="to-top" type="button" data-to-top data-progress aria-label="{{ __('site.footer.top') }}">
        <svg class="to-top__ring" viewBox="0 0 48 48" aria-hidden="true">
            <circle cx="24" cy="24" r="23" pathLength="1" />
        </svg>
        <x-icon name="arrow-up" />
    </button>
</body>
</html>
