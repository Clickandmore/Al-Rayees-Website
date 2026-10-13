@php
    // Home keeps the group's full meta title; every other page is
    // "{Page} — {Group}". Descriptions come from the page map in config/site.php.
    $pageMeta = config("site.pages.{$page}");
    $title = $page === 'home'
        ? __('site.meta.title')
        : __($pageMeta['label']) . ' — ' . $groupName;
    $description = \Illuminate\Support\Str::limit(__($pageMeta['description']), 160);
@endphp
<!DOCTYPE html>
<html lang="{{ $locale }}" dir="{{ $dir }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#FFFFFF">

    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}">

    {{-- Each language has its own canonical URL. --}}
    <link rel="canonical" href="{{ url()->current() }}">
    @foreach (config('site.locales') as $code => $config)
        <link rel="alternate" hreflang="{{ $code }}" href="{{ route("{$code}.{$page}") }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ route("en.{$page}") }}">

    {{-- Social preview --}}
    <meta property="og:type" content="website">
    <meta property="og:locale" content="{{ $locale === 'ar' ? 'ar_JO' : 'en_US' }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="twitter:card" content="summary">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="48x48">
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

    {{-- One family per script, two weights each. --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;700&family=IBM+Plex+Sans:wght@400;700&display=swap"
    >

    @stack('head')

    {{-- AOS hides [data-aos] elements until it runs; without JS, show everything. --}}
    <noscript><style>[data-aos]{opacity:1!important;transform:none!important}.world-map__route{stroke-dashoffset:0!important}.world-map__pin circle{scale:1!important}</style></noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-theme="{{ $theme }}">
    <a class="skip-link" href="#main">{{ __('site.nav.skip') }}</a>

    @include('partials.header')

    <main id="main">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Back to top: appears after the first screen; the ring fills with scroll progress. --}}
    <button class="to-top" type="button" data-to-top aria-label="{{ __('site.footer.top') }}" title="{{ __('site.footer.top') }}">
        <svg class="to-top__ring" viewBox="0 0 52 52" aria-hidden="true">
            <circle class="to-top__track" cx="26" cy="26" r="24" />
            <circle class="to-top__progress" cx="26" cy="26" r="24" pathLength="100" />
        </svg>
        <x-icon name="arrow-up" />
    </button>
</body>
</html>
