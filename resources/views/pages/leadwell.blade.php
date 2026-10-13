@extends('layouts.division')

{{--
    Leadwell International — global manpower: royal-blue bands, a routes
    map from Manila to the Gulf that draws itself in, and the founding
    year set large.
    TODO: صور حقيقية للشركة عند توفرها.
--}}

@php
    $founded = config('site.company.founded');
@endphp

@section('hero')
    <header class="lw-hero">
        <div class="container lw-hero__grid">
            <div class="lw-hero__text">
                <x-breadcrumb :current="__('site.nav.leadwell')" :division="true" class="breadcrumb--dark" data-aos="fade-down" />

                <h1 class="lw-hero__title" data-aos="fade-up" data-aos-delay="100">{{ __('site.leadwell.name') }}</h1>
                <p class="lw-hero__tagline" data-aos="fade-up" data-aos-delay="200">{{ __('site.leadwell.tagline') }}</p>

                <a class="btn btn--light" href="#contact" data-aos="fade-up" data-aos-delay="300">
                    {{ __('site.common.contact') }}
                    <x-icon name="arrow" class="icon-flip btn__arrow" />
                </a>
            </div>

            <x-world-map
                variant="dark"
                hub="manila"
                :label="__('site.leadwell.markets_label')"
                :highlight="['ph', 'kw', 'jo', 'om', 'qa', 'sa', 'ae', 'bh']"
                :routes="[['manila', 'kuwait'], ['manila', 'amman'], ['manila', 'muscat'], ['manila', 'doha'], ['manila', 'riyadh']]"
                viewBox="330 110 540 290"
                class="lw-hero__map"
                data-aos="fade-in"
                data-aos-delay="200"
            />
        </div>
    </header>
@endsection

@section('division')
    {{-- Introduction with the founding year --}}
    <section class="section">
        <div class="container lw-intro">
            <div class="lw-year" data-aos="{{ $aosStart }}" aria-hidden="true">
                <span class="lw-year__value ltr">{{ $founded }}</span>
            </div>

            <div class="prose prose--lead" data-aos="{{ $aosEnd }}">
                @foreach (__('site.leadwell.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Licences & highlights --}}
    <section class="section section--alt">
        <div class="container">
            <header class="section__head section__head--center" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.leadwell.highlights_title') }}</h2>
            </header>

            <div class="lw-cards">
                @foreach (__('site.leadwell.highlights') as $i => $item)
                    <article class="lw-card" data-aos="flip-up" data-aos-delay="{{ $i * 100 }}">
                        <span class="lw-card__icon"><x-icon :name="['badge', 'calendar', 'globe', 'briefcase', 'user'][$i] ?? 'badge'" /></span>
                        <h3 class="lw-card__title">{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Markets + contact --}}
    <section class="section" id="contact">
        <div class="container grid grid--2 grid--gap-lg">
            <div data-aos="{{ $aosStart }}">
                <h2 class="section__title">{{ __('site.leadwell.markets_label') }}</h2>

                <ul class="lw-markets">
                    @foreach (__('site.leadwell.markets') as $i => $market)
                        <li data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                            <x-icon name="pin" />
                            {{ $market }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="section__title" data-aos="fade-up">{{ __('site.common.contact') }}</h2>
                <x-contact-block :items="__('site.leadwell.contact')" class="contact-block--accent" />
            </div>
        </div>
    </section>
@endsection
