@props([
    'title',
    'lead' => null,
    // Intermediate breadcrumb steps between Home and this page: [[label, url], …]
    'trail' => [],
    // Breadcrumb label for this page, when it should differ from the H1.
    'crumb' => null,
])

{{--
    Inner-page header for the group pages (about, contact): a navy band
    with breadcrumb, H1, short description and the monogram as an outline
    watermark. Division pages build their own heroes instead.
--}}

<header class="page-header">
    <img class="page-header__mark" src="{{ asset('assets/brand/mark.svg') }}" alt="" aria-hidden="true" width="263" height="463">

    <div class="container page-header__inner">
        <x-breadcrumb :current="$crumb ?? $title" :trail="$trail" data-aos="fade-down" />

        <h1 class="page-header__title" data-aos="fade-up" data-aos-delay="100">{{ $title }}</h1>

        @if ($lead)
            <p class="page-header__lead" data-aos="fade-up" data-aos-delay="200">{{ $lead }}</p>
        @endif

        {{ $slot }}
    </div>
</header>
