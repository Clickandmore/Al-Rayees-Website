@extends('layouts.division')

{{--
    Amtech Dental Laboratory — company profile. Follows the PDF's look:
    white slides with bright-teal blocks, photos in tilted diamond frames,
    numbered teal chips, the ▶▷▶ motif and dot grids.
    Copy: lang/{locale}/amtech_profile.php.
--}}

@push('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;700;800&display=swap">
@endpush

@php
    $p = 'amtech_profile';
    $num = fn (int $i) => str_pad($i + 1, 2, '0', STR_PAD_LEFT);
    $chevrons = '<span class="am-chevrons" aria-hidden="true"><i></i><i></i><i></i></span>';
@endphp

@section('hero')
    <header class="ap-hero">
        <span class="ap-block ap-block--start" aria-hidden="true"></span>
        <span class="ap-dots ap-dots--hero" aria-hidden="true"></span>

        <div class="container ap-hero__grid">
            <div class="ap-hero__text">
                <x-breadcrumb :current="__('site.nav.amtech_profile_short')" :trail="[[__('site.nav.amtech'), route($locale . '.amtech')]]" data-aos="fade-down" />

                <img class="ap-hero__logo" src="{{ asset('assets/images/amtech-profile/logo-mark.jpg') }}" alt="" width="330" height="300" data-aos="zoom-in" data-aos-delay="100">

                <p class="ap-hero__name ltr" data-aos="fade-up" data-aos-delay="200">
                    {{ __("{$p}.hero.name") }}
                    <span>{{ __("{$p}.hero.sub") }}</span>
                </p>
                <h1 class="ap-hero__title" data-aos="fade-up" data-aos-delay="300">{{ __("{$p}.hero.title") }}</h1>

                <div class="btn-row" data-aos="fade-up" data-aos-delay="400">
                    <x-download page="amtech-profile" variant="teal" />
                    {!! $chevrons !!}
                </div>
            </div>

            <div class="ap-diamonds" data-aos="zoom-in" data-aos-delay="150" data-aos-duration="1000">
                <figure class="ap-diamond ap-diamond--lg"><img src="{{ asset('assets/images/amtech-profile/lab.jpg') }}" alt="" width="1600" height="900" fetchpriority="high"></figure>
                <figure class="ap-diamond ap-diamond--sm"><img src="{{ asset('assets/images/amtech-profile/patient.jpg') }}" alt="" width="1200" height="800"></figure>
                <span class="ap-hero__circles" aria-hidden="true"><i></i><i></i><i></i></span>
            </div>
        </div>
    </header>

    {{-- Table of contents: in-page navigation --}}
    <nav class="ap-toc" aria-label="{{ __("{$p}.toc.title") }}">
        <div class="container">
            <ol class="ap-toc__list">
                @foreach (__("{$p}.toc.items") as $anchor => $label)
                    <li>
                        <a href="#{{ $anchor }}"><span class="ap-chip ltr">{{ $num($loop->index) }}</span>{{ $label }}</a>
                    </li>
                @endforeach
            </ol>
        </div>
    </nav>
@endsection

@section('division')
    {{-- Introduction --}}
    <section class="section ap-band" id="intro">
        <span class="ap-block ap-block--top-end" aria-hidden="true"></span>

        <div class="container ap-intro">
            <div data-aos="{{ $aosStart }}">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.intro.title") }}</h2>
                <p>{{ __("{$p}.intro.body")[0] }}</p>
                <span class="ap-dots" aria-hidden="true"></span>
            </div>

            <div class="ap-intro__more" data-aos="{{ $aosEnd }}" data-aos-delay="150">
                @foreach (array_slice(__("{$p}.intro.body"), 1) as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
                {!! $chevrons !!}
            </div>
        </div>
    </section>

    {{-- Vision & mission --}}
    <section class="section ap-band ap-band--rail" id="vision">
        <div class="container">
            <div class="ap-center" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.vision.title") }}</h2>
                @foreach (__("{$p}.vision.body") as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="ap-center ap-mission" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.mission.title") }}</h2>
                <p>{{ __("{$p}.mission.lead") }}</p>
            </div>

            <ol class="ap-commitments">
                @foreach (__("{$p}.mission.items") as $i => $item)
                    <li data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 120 }}">
                        <span class="ap-commitments__num ltr">{{ $num($i) }}</span>
                        <div>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Core values --}}
    <section class="section ap-band ap-band--stripes" id="values">
        <div class="container ap-values">
            <div data-aos="{{ $aosStart }}">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.values.title") }}</h2>
                <figure class="ap-photo ap-photo--offset">
                    <img src="{{ asset('assets/images/amtech-profile/xray.jpg') }}" alt="" width="1200" height="800" loading="lazy">
                </figure>
            </div>

            <ol class="ap-numbered">
                @foreach (__("{$p}.values.items") as $i => $value)
                    <li data-aos="{{ $aosEnd }}" data-aos-delay="{{ $i * 90 }}">
                        <span class="ap-chip ap-chip--lg ltr">{{ $num($i) }}</span>
                        {{ $value }}
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Services --}}
    <section class="section ap-band ap-band--wash" id="services">
        <div class="container">
            <header class="ap-head" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.services.title") }}</h2>
                {!! $chevrons !!}
            </header>

            <div class="ap-strip">
                @foreach (['s-xray', 's-denture', 's-shade'] as $i => $photo)
                    <figure class="ap-photo ap-photo--tab" data-aos="zoom-in" data-aos-delay="{{ $i * 120 }}">
                        <img src="{{ asset("assets/images/amtech-profile/{$photo}.jpg") }}" alt="" width="600" height="450" loading="lazy">
                    </figure>
                @endforeach
            </div>

            <ol class="ap-services">
                @foreach (__("{$p}.services.items") as $i => $service)
                    <li data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <span class="ap-chip ltr">{{ $num($i) }}</span>
                        {{ $service }}
                    </li>
                @endforeach
            </ol>
        </div>
    </section>

    {{-- Materials --}}
    <section class="section ap-band">
        <div class="container">
            <header class="ap-head" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.materials.title") }}</h2>
            </header>

            <div class="ap-materials">
                @foreach (__("{$p}.materials.items") as $i => $material)
                    <article class="ap-material" data-aos="fade-up" data-aos-delay="{{ $i * 140 }}">
                        <figure class="ap-photo ap-photo--tab">
                            <img src="{{ asset($material['image']) }}" alt="{{ $material['name'] }}" width="600" height="450" loading="lazy">
                        </figure>
                        <h3><span class="ap-chip ltr">{{ $num($i) }}</span> <span class="ltr">{{ $material['name'] }}</span></h3>
                        @isset($material['full'])
                            <p class="ap-material__full">{{ $material['full'] }}</p>
                        @endisset
                        <p>{{ $material['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Premium crown & bridge --}}
    <section class="section ap-band ap-band--rail">
        <div class="container">
            <header class="ap-head ap-head--center" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.crown.title") }}</h2>
            </header>

            <div class="ap-crown">
                <figure class="ap-photo ap-photo--offset" data-aos="{{ $aosStart }}">
                    <img src="{{ asset('assets/images/amtech-profile/implant.jpg') }}" alt="" width="900" height="1100" loading="lazy">
                </figure>

                <div class="ap-crown__text" data-aos="fade-up" data-aos-delay="100">
                    <p class="ap-kicker">{{ __("{$p}.crown.kicker") }}</p>
                    <p>{{ __("{$p}.crown.text") }}</p>
                    <p class="ap-crown__tagline">{{ __("{$p}.crown.tagline") }}</p>
                    <x-checklist :items="__($p . '.crown.points')" />
                </div>

                <figure class="ap-photo ap-photo--offset" data-aos="{{ $aosEnd }}">
                    <img src="{{ asset('assets/images/amtech-profile/bridge.jpg') }}" alt="" width="900" height="1100" loading="lazy">
                </figure>
            </div>
        </div>
    </section>

    {{-- Anatomy of a full metal crown --}}
    <section class="section ap-band">
        <span class="ap-block ap-block--top-end" aria-hidden="true"></span>

        <div class="container">
            <header class="ap-head" data-aos="fade-up">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.anatomy.title") }}</h2>
                <p class="ap-kicker">{{ __("{$p}.anatomy.lead") }}</p>
            </header>

            <div class="ap-anatomy">
                <figure class="ap-photo ap-photo--offset" data-aos="zoom-in">
                    <img src="{{ asset('assets/images/amtech-profile/metal-crown.jpg') }}" alt="{{ __("{$p}.anatomy.title") }}" width="600" height="694" loading="lazy">
                </figure>

                <dl class="ap-terms">
                    @foreach (__("{$p}.anatomy.items") as $i => $item)
                        <div data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 100 }}">
                            <dt>{{ $item['term'] }}</dt>
                            <dd>{{ $item['text'] }}</dd>
                        </div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    {{-- Future vision: teal band over the office --}}
    <section class="section ap-future" id="future">
        <div class="ap-future__bg" aria-hidden="true">
            <img src="{{ asset('assets/images/amtech-profile/office.jpg') }}" alt="" width="1600" height="900" loading="lazy">
        </div>

        <div class="container ap-future__inner">
            <h2 class="ap-title ap-title--hero" data-aos="fade-up">{{ __("{$p}.future.title") }}</h2>
            @foreach (__("{$p}.future.body") as $i => $paragraph)
                <p data-aos="fade-up" data-aos-delay="{{ 100 + $i * 120 }}">{{ $paragraph }}</p>
            @endforeach
            {!! $chevrons !!}
        </div>
    </section>

    {{-- Key clients --}}
    <section class="section ap-band" id="clients">
        <div class="container ap-split">
            <figure class="ap-photo ap-photo--offset ap-photo--tall" data-aos="{{ $aosStart }}">
                <img src="{{ asset('assets/images/amtech-profile/reception.jpg') }}" alt="" width="900" height="1100" loading="lazy">
            </figure>

            <div>
                <h2 class="ap-title ap-title--xl" data-aos="fade-up">{{ __("{$p}.clients.title") }}</h2>
                <p data-aos="fade-up">{{ __("{$p}.clients.lead") }}</p>

                <ol class="ap-commitments ap-commitments--stack">
                    @foreach (__("{$p}.clients.items") as $i => $item)
                        <li data-aos="{{ $aosEnd }}" data-aos-delay="{{ $i * 100 }}">
                            <span class="ap-commitments__num ltr">{{ $num($i) }}</span>
                            <div>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ol>

                <p class="ap-closing" data-aos="fade-up">{{ __("{$p}.clients.closing") }}</p>
            </div>
        </div>
    </section>

    {{-- Expansion across the Philippines --}}
    <section class="section ap-band ap-band--wash" id="expansion">
        <div class="container ap-split ap-split--flip">
            <div>
                <h2 class="ap-title ap-title--xl" data-aos="fade-up">{{ __("{$p}.expansion.title") }}</h2>

                <ul class="ap-regions" data-aos="fade-up">
                    @foreach (__("{$p}.expansion.regions") as $region)
                        <li><x-icon name="pin" /> {{ $region }}</li>
                    @endforeach
                </ul>

                @foreach (__("{$p}.expansion.body") as $i => $paragraph)
                    <p data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="ap-expansion__visual">
                <figure class="ap-photo ap-photo--offset ap-photo--tall" data-aos="{{ $aosEnd }}">
                    <img src="{{ asset('assets/images/amtech-profile/model.jpg') }}" alt="" width="900" height="1100" loading="lazy">
                </figure>

                <x-world-map
                    variant="light"
                    hub="manila"
                    :highlight="['ph']"
                    :pins="['davao']"
                    :routes="[['manila', 'davao']]"
                    viewBox="745 260 110 110"
                    class="ap-expansion__map world-map--framed"
                    data-aos="zoom-in"
                    data-aos-delay="300"
                />
            </div>
        </div>
    </section>

    {{-- Why partner --}}
    <section class="section ap-band">
        <div class="container ap-split">
            <figure class="ap-photo ap-photo--offset ap-photo--tall" data-aos="{{ $aosStart }}">
                <img src="{{ asset('assets/images/amtech-profile/handpiece.jpg') }}" alt="" width="900" height="1100" loading="lazy">
            </figure>

            <div data-aos="{{ $aosEnd }}">
                <h2 class="ap-title ap-title--xl">{{ __("{$p}.partner.title") }}</h2>
                <p class="ap-kicker">{{ __("{$p}.partner.kicker") }}</p>

                <div class="ap-partner">
                    <div class="ap-partner__card ap-partner__card--teal">
                        <h3>{{ __("{$p}.partner.free_title") }}</h3>
                        <x-checklist :items="__($p . '.partner.free')" />
                    </div>
                    <div class="ap-partner__card">
                        <h3>{{ __("{$p}.partner.more_title") }}</h3>
                        <x-checklist :items="__($p . '.partner.more')" />
                    </div>
                </div>

                <p class="ap-closing ap-closing--strong">{{ __("{$p}.partner.closing") }}</p>
            </div>
        </div>
    </section>

    {{-- Crafted with precision: before / after --}}
    <section class="section ap-band ap-band--rail">
        <div class="container ap-split ap-split--flip ap-crafted">
            <h2 class="ap-crafted__lines" data-aos="fade-up">
                @foreach (__("{$p}.crafted.lines") as $line)
                    <span>{{ $line }}</span>
                @endforeach
                {!! $chevrons !!}
            </h2>

            <div class="compare" data-compare data-aos="zoom-in" data-aos-delay="150">
                <img class="compare__img" src="{{ asset('assets/images/amtech-profile/after.jpg') }}" alt="{{ __("{$p}.crafted.after") }}" width="900" height="445" loading="lazy">
                <div class="compare__before">
                    <img class="compare__img" src="{{ asset('assets/images/amtech-profile/before.jpg') }}" alt="{{ __("{$p}.crafted.before") }}" width="900" height="445" loading="lazy">
                </div>
                <span class="compare__tag compare__tag--before">{{ __("{$p}.crafted.before") }}</span>
                <span class="compare__tag compare__tag--after">{{ __("{$p}.crafted.after") }}</span>
                <span class="compare__handle" aria-hidden="true"></span>
                <input class="compare__range" type="range" min="0" max="100" value="50" aria-label="{{ __("{$p}.crafted.drag") }}">
            </div>
        </div>
    </section>

    {{-- Social --}}
    <section class="section ap-band">
        <div class="container ap-social">
            <div data-aos="fade-up">
                <p class="ap-social__title">{{ __("{$p}.social.title") }}</p>
                <p class="ap-social__name ltr">{{ __("{$p}.social.name") }}</p>
                <a class="ap-social__handle ltr" href="https://www.instagram.com/amtechdentlabph" target="_blank" rel="noopener noreferrer">
                    <x-icon name="social" />
                    {{ __("{$p}.social.handle") }}
                </a>
            </div>

            <figure class="ap-photo ap-photo--offset" data-aos="zoom-in">
                <img src="{{ asset('assets/images/amtech-profile/cast.jpg') }}" alt="" width="900" height="1100" loading="lazy">
            </figure>
        </div>
    </section>

    {{-- Get in touch --}}
    <section class="section ap-band ap-band--wash" id="contact">
        <div class="container ap-touch">
            <div>
                <h2 class="ap-title ap-title--hero" data-aos="fade-up">{{ __("{$p}.contact.title") }}</h2>
                <x-contact-block :items="__($p . '.contact.rows')" class="contact-block--accent" />
                <div class="ap-touch__download" data-aos="fade-up">
                    <x-download page="amtech-profile" variant="teal" />
                </div>
            </div>

            <div class="ap-diamonds ap-diamonds--sm" data-aos="zoom-in" aria-hidden="true">
                <figure class="ap-diamond ap-diamond--lg"><img src="{{ asset('assets/images/amtech-profile/lab.jpg') }}" alt="" width="1600" height="900" loading="lazy"></figure>
                <figure class="ap-diamond ap-diamond--sm"><img src="{{ asset('assets/images/amtech-profile/patient.jpg') }}" alt="" width="1200" height="800" loading="lazy"></figure>
            </div>
        </div>
    </section>
@endsection
