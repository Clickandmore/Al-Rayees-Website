@extends('layouts.division')

{{--
    Al Rayees Charcoal — industrial: charcoal-black bands, ember accent,
    full-bleed factory photography, big product numerals, an export map
    out of Davao.
--}}

@section('hero')
    <header class="ch-hero">
        <div class="ch-hero__bg" aria-hidden="true">
            <img src="{{ asset('assets/images/charcoal-hero.jpg') }}" alt="" width="1280" height="720" fetchpriority="high">
        </div>

        <div class="container ch-hero__inner">
            <x-breadcrumb :current="__('site.nav.charcoal')" :division="true" class="breadcrumb--dark" data-aos="fade-down" />

            <h1 class="ch-hero__title" data-aos="fade-up" data-aos-delay="100">{{ __('site.charcoal.name') }}</h1>
            <p class="ch-hero__tagline" data-aos="fade-up" data-aos-delay="200">{{ __('site.charcoal.tagline') }}</p>

            <ul class="ch-specs">
                @foreach (__('site.charcoal.badges') as $i => $badge)
                    <li data-aos="fade-up" data-aos-delay="{{ 350 + $i * 100 }}">
                        <x-icon :name="['droplet', 'package', 'leaf', 'factory'][$i] ?? 'check'" />
                        {{ $badge }}
                    </li>
                @endforeach
            </ul>
        </div>
    </header>
@endsection

@section('division')
    {{-- Introduction --}}
    <section class="section section--ink">
        <div class="container split split--media">
            <div class="prose prose--on-dark" data-aos="{{ $aosStart }}">
                @foreach (__('site.charcoal.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>

            <div class="ch-glow" data-aos="{{ $aosEnd }}">
                <figure class="ch-glow__photo">
                    <img src="{{ asset('assets/images/charcoal-glow.jpg') }}" alt="{{ __('site.charcoal.products.2.title') }}" width="720" height="960" loading="lazy">
                </figure>
                <figure class="ch-glow__inset" data-aos="zoom-in" data-aos-delay="300">
                    <img src="{{ asset('assets/images/group-factory.jpg') }}" alt="{{ __('site.charcoal.factory.4.value') }}" width="1200" height="900" loading="lazy">
                </figure>
            </div>
        </div>
    </section>

    {{-- Products --}}
    <section class="section section--alt">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.charcoal.products_title') }}</h2>
                <p class="section__lead">{{ __('site.charcoal.products_sub') }}</p>
            </header>

            <div class="grid grid--3">
                @foreach (__('site.charcoal.products') as $i => $product)
                    <article @class(['ch-product', 'ch-product--featured' => $product['featured'] ?? false])
                             data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">
                        <span class="ch-product__num ltr" aria-hidden="true">{{ $product['index'] }}</span>
                        <h3 class="ch-product__title">{{ $product['title'] }}</h3>
                        <p class="ch-product__text">{{ $product['text'] }}</p>
                        <x-checklist :items="$product['specs']" class="checklist--sm ch-product__specs" />
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Quality guarantees --}}
    <section class="section section--ink">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.charcoal.guarantees_title') }}</h2>
            </header>

            <div class="grid grid--4 ch-guarantees">
                @foreach (__('site.charcoal.guarantees') as $i => $item)
                    <article class="ch-guarantee" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
                        <span class="ch-guarantee__icon"><x-icon :name="$item['icon']" /></span>
                        <h3 class="ch-guarantee__title">{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Services (as a path from factory to port) + shipment documents --}}
    <section class="section">
        <div class="container grid grid--2 grid--gap-lg">
            <div>
                <header data-aos="fade-up">
                    <h2 class="section__title">{{ __('site.charcoal.services_title') }}</h2>
                    <p class="section__lead">{{ __('site.charcoal.services_sub') }}</p>
                </header>

                <ol class="steps">
                    @foreach (__('site.charcoal.services') as $i => $service)
                        <li class="steps__item" data-aos="{{ $aosStart }}" data-aos-delay="{{ $i * 120 }}">
                            <span class="steps__dot ltr" aria-hidden="true">{{ $i + 1 }}</span>
                            <h3 class="steps__title">{{ $service['title'] }}</h3>
                            <p class="steps__text">{{ $service['text'] }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>

            <div class="ch-docs" data-aos="{{ $aosEnd }}">
                <x-icon name="file" class="ch-docs__icon" />
                <h2 class="section__title">{{ __('site.charcoal.documents_title') }}</h2>
                <p class="section__lead">{{ __('site.charcoal.documents_sub') }}</p>
                <x-checklist :items="__('site.charcoal.documents')" />
            </div>
        </div>
    </section>

    {{-- Coverage & certifications: figures + export map out of Davao --}}
    <section class="section section--ink">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.charcoal.coverage_title') }}</h2>
                <p class="section__lead">{{ __('site.charcoal.coverage_text') }}</p>
            </header>

            <x-stats :items="__('site.charcoal.coverage_stats')" class="stats--on-dark" />

            <div class="ch-export">
                <x-world-map
                    variant="dark"
                    :label="__('site.charcoal.coverage_title')"
                    :highlight="['eg', 'iq', 'lb', 'jo', 'sy', 'sa', 'kw', 'om', 'qa', 'ae', 'bh', 'dz', 'ly']"
                    hub="davao"
                    :routes="[['davao', 'aqaba'], ['davao', 'cairo'], ['davao', 'baghdad'], ['davao', 'beirut'], ['davao', 'damascus'], ['davao', 'riyadh'], ['davao', 'tripoli']]"
                    class="ch-export__map"
                    data-aos="fade-in"
                />

                <div class="ch-export__markets" data-aos="fade-up" data-aos-delay="200">
                    <x-icon name="ship" />
                    <x-inline-list :items="__('site.charcoal.coverage_markets')" :label="__('site.common.markets')" />
                </div>
            </div>
        </div>
    </section>

    {{-- Markets (tabbed) --}}
    <section class="section section--alt">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.charcoal.markets_title') }}</h2>
            </header>

            <div class="tabs" data-tabs data-aos="fade-up">
                <div class="tabs__list" role="tablist" aria-label="{{ __('site.charcoal.markets_title') }}">
                    @foreach (__('site.charcoal.markets') as $i => $market)
                        <button
                            class="tabs__tab"
                            type="button"
                            role="tab"
                            id="tab-{{ $market['key'] }}"
                            aria-controls="panel-{{ $market['key'] }}"
                            aria-selected="{{ $i === 0 ? 'true' : 'false' }}"
                            tabindex="{{ $i === 0 ? '0' : '-1' }}"
                        >{{ $market['name'] }}</button>
                    @endforeach
                </div>

                @foreach (__('site.charcoal.markets') as $i => $market)
                    <div
                        class="tabs__panel"
                        id="panel-{{ $market['key'] }}"
                        role="tabpanel"
                        aria-labelledby="tab-{{ $market['key'] }}"
                        tabindex="0"
                        @if ($i !== 0) hidden @endif
                    >
                        <div class="grid grid--2 grid--gap-lg">
                            <ul class="bullets">
                                @foreach ($market['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>

                            <x-contact-block :items="$market['meta']" :data-aos="false" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Factory contact --}}
    <section class="section">
        <div class="container split split--media">
            <div>
                <h2 class="section__title" data-aos="fade-up">{{ __('site.charcoal.factory_title') }}</h2>
                <x-contact-block :items="__('site.charcoal.factory')" class="contact-block--accent" />
            </div>

            <x-media src="assets/images/charcoal-product.jpg" :alt="__('site.charcoal.name')" ratio="4/3" data-aos="{{ $aosEnd }}" />
        </div>
    </section>

    {{-- Market profiles (Jordan, Syria) with their PDFs --}}
    <x-profile-links division="charcoal" class="section--alt" />
@endsection
