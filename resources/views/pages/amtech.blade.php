@extends('layouts.division')

{{--
    Amtech Dental Laboratory — clinical and digital: white and teal,
    softer radii, floating detail cards over lab photography, a dense
    service grid and a small gallery of the lab's work.
--}}

@php
    $materials = __('site.amtech.materials');
@endphp

@section('hero')
    <header class="am-hero">
        <div class="container am-hero__grid">
            <div class="am-hero__text">
                <x-breadcrumb :current="__('site.nav.amtech')" :division="true" data-aos="fade-down" />

                <span class="am-hero__icon" data-aos="zoom-in" data-aos-delay="100"><x-icon name="tooth" /></span>

                <h1 class="am-hero__title" data-aos="fade-up" data-aos-delay="150">{{ __('site.amtech.name') }}</h1>
                <p class="am-hero__tagline" data-aos="fade-up" data-aos-delay="250">{{ __('site.amtech.tagline') }}</p>

                <div class="btn-row" data-aos="fade-up" data-aos-delay="350">
                    <a class="btn btn--primary" href="#services">{{ __('site.amtech.services_title') }}</a>
                    <a class="btn btn--outline" href="#contact">{{ __('site.common.contact') }}</a>
                </div>
            </div>

            <div class="am-hero__visual">
                <figure class="am-hero__photo" data-aos="zoom-in-up" data-aos-delay="100">
                    <img src="{{ asset('assets/images/amtech-hero.jpg') }}" alt="{{ __('site.amtech.name') }}" width="1600" height="1000" fetchpriority="high">
                </figure>

                <div class="am-float am-float--a" data-aos="fade-up" data-aos-delay="500">
                    <span class="am-float__value ltr">15+</span>
                    <span class="am-float__label">{{ __('site.amtech.services_title') }}</span>
                </div>

                <div class="am-float am-float--b" data-aos="fade-up" data-aos-delay="700">
                    <x-icon name="gem" />
                    <span class="am-float__chips ltr">
                        @foreach ($materials as $material)
                            <span>{{ $material['name'] }}</span>
                        @endforeach
                    </span>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('division')
    {{-- Introduction --}}
    <section class="section">
        <div class="container am-intro">
            @foreach (__('site.amtech.body') as $i => $paragraph)
                <p data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">{{ $paragraph }}</p>
            @endforeach
        </div>
    </section>

    {{-- Vision --}}
    <section class="section am-vision">
        <div class="container">
            <figure data-aos="zoom-in">
                <x-icon name="eye" class="am-vision__icon" />
                <figcaption class="am-vision__label">{{ __('site.amtech.vision.label') }}</figcaption>
                <blockquote><p>{{ __('site.amtech.vision.text') }}</p></blockquote>
            </figure>
        </div>
    </section>

    {{-- Mission commitments --}}
    <section class="section section--alt">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.amtech.mission_title') }}</h2>
            </header>

            <div class="am-tiles">
                @foreach (__('site.amtech.mission') as $i => $item)
                    <article class="am-tile" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                        <span class="am-tile__icon"><x-icon :name="['award', 'users', 'cpu', 'scale', 'refresh'][$i] ?? 'check'" /></span>
                        <h3 class="am-tile__title">{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Core values --}}
    <section class="section">
        <div class="container split">
            <h2 class="section__title" data-aos="{{ $aosStart }}">{{ __('site.amtech.values_title') }}</h2>

            <ul class="am-values">
                @foreach (__('site.amtech.values') as $i => $value)
                    <li data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <x-icon name="check-circle" />
                        {{ $value }}
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Services --}}
    <section class="section section--alt" id="services">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.amtech.services_title') }}</h2>
                <p class="section__lead">{{ __('site.amtech.services_sub') }}</p>
            </header>

            <ul class="am-services">
                @foreach (__('site.amtech.services') as $i => $service)
                    <li data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 80 }}">
                        <x-icon name="check" />
                        <span>{{ $service }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Materials + gallery of the lab's work --}}
    <section class="section">
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.amtech.materials_title') }}</h2>
            </header>

            <div class="am-gallery" aria-hidden="true">
                @foreach (['amtech-crowns', 'amtech-implant', 'amtech-tools'] as $i => $photo)
                    <figure data-aos="zoom-in" data-aos-delay="{{ $i * 120 }}">
                        <img src="{{ asset("assets/images/{$photo}.jpg") }}" alt="" width="900" height="675" loading="lazy">
                    </figure>
                @endforeach
            </div>

            <div class="grid grid--3">
                @foreach ($materials as $i => $material)
                    <article class="am-material" data-aos="fade-up" data-aos-delay="{{ $i * 120 }}">
                        <h3 class="am-material__name ltr">{{ $material['name'] }}</h3>
                        <p>{{ $material['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why partner --}}
    <section class="section section--alt">
        <div class="container split split--media">
            <div data-aos="{{ $aosStart }}">
                <h2 class="section__title">{{ __('site.amtech.why_title') }}</h2>
                <x-checklist :items="__('site.amtech.why')" class="am-checklist" />
            </div>

            <blockquote class="am-quote" data-aos="zoom-in" data-aos-delay="200">
                <x-icon name="quote" />
                <p>{{ __('site.amtech.quote') }}</p>
            </blockquote>
        </div>
    </section>

    {{-- Contact --}}
    <section class="section" id="contact">
        <div class="container">
            <h2 class="section__title" data-aos="fade-up">{{ __('site.common.contact') }}</h2>
            <x-contact-block :items="__('site.amtech.contact')" class="contact-block--accent contact-block--wide" />
        </div>
    </section>

    {{-- Full company profile with its PDF --}}
    <x-profile-links division="amtech" class="section--alt" />
@endsection
