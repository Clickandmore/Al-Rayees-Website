@props([
    'current',
    // Intermediate steps between Home and this page: [[label, url], …]
    'trail' => [],
    // Division pages: insert "Divisions" (home#divisions) before the current page.
    'division' => false,
])

{{-- Home / … / current page. Colours follow the surrounding band (see _page-header.css). --}}

<nav {{ $attributes->class('breadcrumb') }} aria-label="Breadcrumb">
    <ol>
        <li><a href="{{ route(app()->getLocale() . '.home') }}">{{ __('site.nav.home') }}</a></li>
        @if ($division)
            <li><a href="{{ route(app()->getLocale() . '.home') }}#divisions">{{ __('site.nav.divisions') }}</a></li>
        @endif
        @foreach ($trail as [$label, $url])
            <li><a href="{{ $url }}">{{ $label }}</a></li>
        @endforeach
        <li aria-current="page">{{ $current }}</li>
    </ol>
</nav>
