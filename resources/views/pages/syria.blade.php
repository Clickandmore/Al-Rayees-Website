@extends('layouts.division')

{{--
    Al Rayees Charcoal — Syria profile. Follows the PDF's look: bright
    white pages, warm yellow-gold discs, photos set in gold rings and a
    yellow ribbon along the foot of each slide. Copy: lang/{locale}/syria.php.
--}}

@push('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alexandria:wght@400;700;800&display=swap">
@endpush

@section('hero')
    <header class="sy-hero">
        <span class="sy-disc sy-disc--a" aria-hidden="true"></span>
        <span class="sy-disc sy-disc--b" aria-hidden="true"></span>
        <span class="sy-disc sy-disc--c" aria-hidden="true"></span>
        <span class="sy-dots sy-dots--hero" aria-hidden="true"></span>

        <div class="container sy-hero__grid">
            <div class="sy-hero__text">
                <x-breadcrumb :current="__('site.nav.syria_short')" :trail="[[__('site.nav.charcoal'), route($locale . '.charcoal')]]" data-aos="fade-down" />

                <img class="sy-hero__brand" src="{{ asset('assets/images/syria/brand.png') }}" alt="ALRAYEES — Natural Coconut Charcoal" width="480" height="220" data-aos="zoom-in" data-aos-delay="100">

                <h1 class="sy-hero__name" data-aos="fade-up" data-aos-delay="200">{{ __('syria.hero.brand') }}</h1>
                <p class="sy-hero__register" data-aos="fade-up" data-aos-delay="300">{{ __('syria.hero.register') }}</p>

                <div class="sy-pill-card" data-aos="fade-up" data-aos-delay="400">
                    <a href="{{ __('syria.hero.whatsapp.href') }}" target="_blank" rel="noopener noreferrer">
                        <x-icon name="chat" />
                        <span>{{ __('syria.hero.whatsapp.label') }}</span>
                        <strong class="ltr">{{ __('syria.hero.whatsapp.value') }}</strong>
                    </a>
                    <div>
                        <x-icon name="award" />
                        <span>{{ __('syria.hero.bags.label') }}</span>
                        <strong>{{ __('syria.hero.bags.value') }}</strong>
                    </div>
                </div>

                <div class="btn-row" data-aos="fade-up" data-aos-delay="500">
                    <x-download page="syria" variant="gold" />
                </div>
            </div>

            <figure class="sy-ring sy-ring--lg sy-hero__photo" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                <img src="{{ asset('assets/images/syria/box.jpg') }}" alt="ALRAYEES — Natural Indonesian Coconut Charcoal" width="1024" height="768">
            </figure>
        </div>

        <div class="sy-strap">
            <div class="container sy-strap__inner">
                <span>{{ __('syria.hero.strap') }} | <span class="ltr">CHARCOAL@ALRAYEES.COM</span></span>
                <span>{{ __('syria.hero.years') }}</span>
            </div>
        </div>
    </header>
@endsection

@section('division')
    {{-- Network in Syria --}}
    <section class="section sy-band">
        <span class="sy-disc sy-disc--edge-end" aria-hidden="true"></span>

        <div class="container">
            <header class="sy-head" data-aos="fade-up">
                <h2 class="sy-title">{{ __('syria.network.title') }}</h2>
                <p class="sy-sub">{{ __('syria.network.lead') }}</p>
            </header>

            <div class="sy-icons">
                @foreach (__('syria.network.items') as $i => $item)
                    <article class="sy-icon-card" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
                        <span class="sy-icon-card__icon"><x-icon :name="$item['icon']" /></span>
                        <h3>{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Who we are --}}
    <section class="section sy-band sy-band--alt">
        <span class="sy-dots" aria-hidden="true"></span>

        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.about.title') }}</h2>
                <p class="sy-sub">{{ __('syria.about.lead') }}</p>
            </header>

            <ol class="sy-chain">
                @foreach (__('syria.about.chain') as $i => $step)
                    <li data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}">
                        <span class="sy-chain__icon"><x-icon :name="$step['icon']" /></span>
                        <h3>{{ $step['title'] }}</h3>
                        <p>{{ $step['note'] }}</p>
                    </li>
                @endforeach
            </ol>

            <ul class="sy-points" data-aos="fade-up">
                @foreach (__('syria.about.points') as $point)
                    <li>{{ $point }}</li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Specifications --}}
    <section class="section sy-band">
        <span class="sy-disc sy-disc--edge-start" aria-hidden="true"></span>

        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.specs.title') }}</h2>
                <p class="sy-sub">{{ __('syria.specs.lead') }}</p>
            </header>

            <div class="sy-specs">
                @foreach (__('syria.specs.items') as $i => $spec)
                    <article class="sy-spec" data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 150 }}">
                        <span class="sy-spec__icon"><x-icon :name="$spec['icon']" /></span>
                        <div>
                            <strong>{{ $spec['value'] }}</strong>
                            <span class="sy-spec__label">{{ $spec['label'] }}</span>
                            <p>{{ $spec['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Product: raw coconut charcoal --}}
    <section class="section sy-band sy-product">
        <div class="sy-product__panel" aria-hidden="true"></div>

        <div class="container sy-product__grid">
            <div data-aos="{{ $aosStart }}">
                <h2 class="sy-title sy-title--xl">{{ __('syria.product.title') }}</h2>
                <p class="sy-product__name">{{ __('syria.product.name') }}</p>
                <p class="sy-product__text">{{ __('syria.product.text') }}</p>

                <ul class="sy-badges">
                    @foreach (__('syria.product.badges') as $i => $badge)
                        <li data-aos="fade-up" data-aos-delay="{{ 200 + $i * 100 }}">
                            <x-icon :name="$badge['icon']" />
                            {{ $badge['label'] }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <figure class="sy-ring sy-ring--lg" data-aos="zoom-in" data-aos-delay="150">
                <img src="{{ asset('assets/images/syria/cubes.jpg') }}" alt="{{ __('syria.product.name') }}" width="720" height="960" loading="lazy">
            </figure>
        </div>
    </section>

    {{-- Shapes & sizes --}}
    <section class="section sy-band sy-band--alt">
        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title">{{ __('site.common.shapes') }}</h2>
                <p class="sy-sub">{{ __('site.common.shapes_lead') }}</p>
            </header>

            <x-charcoal-shapes class="shapes--light" />
        </div>
    </section>

    {{-- Chemistry: animated figures --}}
    <section class="section sy-band">
        <span class="sy-disc sy-disc--edge-end" aria-hidden="true"></span>

        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.chemistry.title') }}</h2>
                <p class="sy-sub">{{ __('syria.chemistry.lead') }}</p>
            </header>

            <dl class="sy-chem">
                @foreach (__('syria.chemistry.items') as $i => $item)
                    <div class="sy-chem__item" data-aos="fade-up" data-aos-delay="{{ $i * 110 }}">
                        <dt>{{ $item['label'] }}</dt>
                        <dd class="sy-chem__value ltr">
                            @if (is_int($item['value']))
                                <span data-count="{{ $item['value'] }}">{{ $item['value'] }}</span>{{ $item['suffix'] }}
                            @else
                                {{ $item['value'] }}{{ $item['suffix'] }}
                            @endif
                        </dd>
                        <dd class="sy-chem__text">{{ $item['text'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- Features --}}
    <section class="section sy-band sy-band--alt">
        <span class="sy-dots" aria-hidden="true"></span>

        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.features.title') }}</h2>
                <p class="sy-sub">{{ __('syria.features.lead') }}</p>
            </header>

            <ul class="sy-features">
                @foreach (__('syria.features.items') as $i => $feature)
                    <li @class(['is-accent' => $i % 4 === 1 || $i % 4 === 3]) data-aos="fade-up" data-aos-delay="{{ ($i % 4) * 80 }}">{{ $feature }}</li>
                @endforeach
            </ul>

            <p class="sy-origin">{{ __('syria.features.origin') }}</p>
        </div>
    </section>

    {{-- Guarantees --}}
    <section class="section sy-band">
        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.guarantees.title') }}</h2>
                <p class="sy-sub">{{ __('syria.guarantees.lead') }}</p>
            </header>

            <div class="sy-guarantees">
                @foreach (__('syria.guarantees.items') as $i => $item)
                    <article class="sy-guarantee" data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 150 }}">
                        <span class="sy-guarantee__icon"><x-icon :name="$item['icon']" /></span>
                        <div>
                            <h3>{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Safety --}}
    <section class="section sy-band sy-band--alt">
        <div class="container">
            <header class="sy-head sy-head--center" data-aos="fade-up">
                <h2 class="sy-title sy-title--xl">{{ __('syria.safety.title') }}</h2>
                <p class="sy-sub">{{ __('syria.safety.lead') }}</p>
            </header>

            <div class="safety safety--light">
                <ul class="safety__rules">
                    @foreach (__('syria.safety.items') as $i => $rule)
                        <li data-aos="{{ $aosStart }}" data-aos-delay="{{ $i * 100 }}">
                            <span class="safety__icon"><x-icon :name="$rule['icon']" /></span>
                            <div>
                                <h3>{{ $rule['title'] }}</h3>
                                <p>{{ $rule['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="safety__warnings">
                    @foreach (__('syria.safety.warnings') as $i => $warning)
                        <div class="safety__warning" data-aos="{{ $aosEnd }}" data-aos-delay="{{ $i * 120 }}">
                            <x-icon name="alert" />
                            <div>
                                <h3>{{ $warning['title'] }}</h3>
                                <p>{{ $warning['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="sy-origin">{{ __('syria.safety.hq') }}</p>
        </div>
    </section>

    {{-- Where to find us --}}
    <section class="section sy-band">
        <span class="sy-disc sy-disc--edge-start" aria-hidden="true"></span>

        <div class="container sy-find">
            <figure class="sy-ring sy-ring--lg" data-aos="zoom-in">
                <img src="{{ asset('assets/images/syria/wrapped.jpg') }}" alt="{{ __('site.nav.charcoal') }}" width="896" height="672" loading="lazy">
            </figure>

            <div>
                <h2 class="sy-title sy-title--xl" data-aos="fade-up">{{ __('syria.locations.title') }}</h2>

                <ul class="sy-locations">
                    @foreach (__('syria.locations.items') as $i => $place)
                        <li data-aos="{{ $aosEnd }}" data-aos-delay="{{ $i * 140 }}">
                            <span class="sy-locations__pin"><x-icon name="pin" /></span>
                            <div>
                                <h3>{{ $place['label'] }}</h3>
                                <p>{{ $place['value'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section class="section sy-band sy-band--alt" id="contact">
        <div class="container sy-contact">
            <div data-aos="{{ $aosStart }}">
                <img class="sy-contact__brand" src="{{ asset('assets/images/syria/brand.png') }}" alt="" width="480" height="220" loading="lazy">
                <h2 class="sy-title sy-title--hero">{{ __('syria.contact.title') }}</h2>
                <p class="sy-contact__lead">{{ __('syria.contact.lead') }}</p>
                <p class="sy-contact__lead">{{ __('syria.contact.note') }}</p>
                <x-download page="syria" variant="gold" />
            </div>

            <div class="sy-contact__panel" data-aos="{{ $aosEnd }}" data-aos-delay="150">
                <h3>{{ __('syria.contact.panel') }}</h3>
                <x-meta-list :items="__('syria.contact.rows')" />
            </div>
        </div>
    </section>
@endsection
