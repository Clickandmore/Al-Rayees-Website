@extends('layouts.division')

{{--
    Dana Roz — luxury furnishings: ivory and burgundy, a classical display
    face for headings, ornamental dividers and the rug illustration
    (public/assets/illustrations/danaroz-carpet.svg).
    TODO: صور حقيقية للمنتجات عند توفرها.
--}}

@push('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Playfair+Display:wght@400;700&display=swap">
@endpush

@php
    // Small diamond ornament used as a divider throughout the page.
    $ornament = '<svg class="dr-ornament" viewBox="0 0 120 16" aria-hidden="true"><path d="M0 8h46M74 8h46" stroke="currentColor" stroke-width="1"/><path d="M60 1l7 7-7 7-7-7z" fill="currentColor"/><path d="M48 8l4-4 4 4-4 4zM64 8l4-4 4 4-4 4z" fill="currentColor" opacity=".55"/></svg>';
@endphp

@section('hero')
    <header class="dr-hero">
        <div class="container dr-hero__grid">
            <div class="dr-hero__text">
                <x-breadcrumb :current="__('site.nav.danaroz')" :division="true" data-aos="fade-down" />

                <div data-aos="fade-up" data-aos-delay="100">{!! $ornament !!}</div>

                <h1 class="dr-hero__title" data-aos="fade-up" data-aos-delay="200">{{ __('site.danaroz.name') }}</h1>
                <p class="dr-hero__tagline" data-aos="fade-up" data-aos-delay="300">{{ __('site.danaroz.tagline') }}</p>

                <div class="dr-hero__body" data-aos="fade-up" data-aos-delay="400">
                    @foreach (__('site.danaroz.body') as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>

            <div class="dr-hero__art" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1100">
                <span class="dr-hero__frame" aria-hidden="true"></span>
                <img src="{{ asset('assets/illustrations/danaroz-carpet.svg') }}" alt="{{ __('site.danaroz.name') }}" width="480" height="640">
            </div>
        </div>
    </header>
@endsection

@section('division')
    {{-- Products & highlights --}}
    <section class="section dr-band">
        <div class="container">
            <header class="section__head section__head--center" data-aos="fade-up">
                {!! $ornament !!}
                <h2 class="section__title dr-title">{{ __('site.danaroz.highlights_title') }}</h2>
            </header>

            <div class="dr-highlights">
                @foreach (__('site.danaroz.highlights') as $i => $item)
                    <article class="dr-highlight" data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">
                        <span class="dr-highlight__icon"><x-icon :name="['sofa', 'award', 'gem'][$i] ?? 'gem'" /></span>
                        <h3 class="dr-highlight__title">{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Markets --}}
    <section class="section dr-ivory">
        <div class="container dr-markets">
            <header data-aos="fade-up">
                {!! $ornament !!}
                <h2 class="section__title dr-title">{{ __('site.danaroz.markets_label') }}</h2>
            </header>

            <ul class="dr-markets__list">
                @foreach (__('site.danaroz.markets') as $i => $market)
                    <li data-aos="zoom-in" data-aos-delay="{{ $i * 120 }}">{{ $market }}</li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Contact --}}
    <section class="section">
        <div class="container dr-contact">
            <h2 class="section__title dr-title" data-aos="fade-up">{{ __('site.common.contact') }}</h2>
            <x-contact-block :items="__('site.danaroz.contact')" class="contact-block--accent" />
        </div>
    </section>
@endsection
