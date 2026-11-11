@extends('layouts.app')

{{--
    Home: hero → key figures → group overview → the four divisions (one
    row each, in its own colour) → markets map → contact CTA.
--}}

@section('content')
    {{-- Hero --}}
    <section class="home-hero">
        <img class="home-hero__mark" src="{{ asset('assets/brand/mark.svg') }}" alt="" aria-hidden="true" width="263" height="463">

        <div class="container home-hero__grid">
            <div class="home-hero__text">
                <p class="home-hero__group" data-aos="fade-up">
                    <span class="home-hero__rule" aria-hidden="true"></span>
                    {{ $groupName }}
                </p>

                <h1 class="home-hero__title">
                    @foreach (__('site.hero.headline') as $i => $line)
                        <span class="line" style="--i: {{ $i }}"><span>{{ $line }}</span></span>
                    @endforeach
                </h1>

                <p class="home-hero__lead" data-aos="fade-up" data-aos-delay="500">{{ __('site.hero.sub') }}</p>

                <div class="btn-row" data-aos="fade-up" data-aos-delay="650">
                    <a class="btn btn--primary" href="#divisions">
                        {{ __('site.hero.primary') }}
                        <x-icon name="arrow" class="icon-flip btn__arrow" />
                    </a>
                    <a class="btn btn--outline" href="{{ route("{$locale}.contact") }}">{{ __('site.hero.secondary') }}</a>
                </div>
            </div>

            <div class="home-hero__visual">
                <figure class="home-hero__photo">
                    <img
                        src="{{ asset('assets/images/charcoal-glow.jpg') }}"
                        alt="{{ __('site.charcoal.name') }}"
                        width="720" height="960" fetchpriority="high"
                    >
                </figure>

                <figure class="home-hero__photo home-hero__photo--small photo--product" data-aos="zoom-in" data-aos-delay="700">
                    <img src="{{ asset('assets/images/jordan/product-3.jpg') }}" alt="" width="720" height="655" loading="lazy">
                </figure>

                @php $years = __('site.stats')[2]; @endphp
                <div class="home-hero__badge" data-aos="fade-up" data-aos-delay="900">
                    <span class="home-hero__badge-value ltr"><span data-count="{{ $years['value'] }}">{{ $years['value'] }}</span>{{ $years['suffix'] }}</span>
                    <span class="home-hero__badge-label">{{ $years['label'] }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Key figures --}}
    <section class="section section--navy section--tight">
        <div class="container">
            <x-stats :items="__('site.stats')" class="stats--on-dark" />
        </div>
    </section>

    {{-- Group overview --}}
    <section class="section overview">
        <div class="container overview__grid">
            <div class="overview__media" aria-hidden="true">
                <figure class="overview__photo" data-aos="{{ $aosStart }}">
                    <img src="{{ asset('assets/images/charcoal-sorting.jpg') }}" alt="" width="1200" height="900" loading="lazy">
                </figure>
                <figure class="overview__photo overview__photo--inset photo--product" data-aos="zoom-in" data-aos-delay="250">
                    <img src="{{ asset('assets/images/jordan/product-2.jpg') }}" alt="" width="720" height="465" loading="lazy">
                </figure>
            </div>

            <div class="overview__text" data-aos="{{ $aosEnd }}">
                <h2 class="section__title">{{ __('site.overview.title') }}</h2>
                <p class="section__lead">{{ __('site.overview.text') }}</p>

                <blockquote class="quote quote--accent">
                    <p>{{ __('site.about.quote') }}</p>
                </blockquote>

                <a class="link-arrow" href="{{ route("{$locale}.about") }}">
                    {{ __('site.overview.cta') }}
                    <x-icon name="arrow" />
                </a>
            </div>
        </div>
    </section>

    {{-- Divisions: one row each, alternating sides, in the division's colour --}}
    <section class="section section--alt" id="divisions">
        <div class="container">
            <header class="section__head section__head--center" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.divisions_intro.title') }}</h2>
                <p class="section__lead">{{ __('site.divisions_intro.text') }}</p>
            </header>

            <div class="division-rows">
                @foreach (array_keys(config('site.divisions')) as $i => $division)
                    <x-division-row :division="$division" :index="$i" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Markets --}}
    <section class="section section--navy markets">
        <div class="container markets__grid">
            <div class="markets__text" data-aos="{{ $aosStart }}">
                <h2 class="section__title">{{ __('site.coverage.title') }}</h2>
                <p class="section__lead">{{ __('site.coverage.text') }}</p>

                <ul class="markets__list">
                    @foreach (__('site.coverage.pins') as $i => $pin)
                        <li data-aos="fade-up" data-aos-delay="{{ 150 + $i * 80 }}">
                            <x-icon name="pin" />
                            {{ $pin }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <x-world-map
                variant="dark"
                :label="__('site.coverage.title')"
                :highlight="['jo', 'sy', 'eg', 'ph', 'sa', 'kw', 'om', 'qa', 'ae', 'bh']"
                hub="amman"
                :routes="[['amman', 'cairo'], ['amman', 'damascus'], ['amman', 'riyadh'], ['amman', 'kuwait'], ['amman', 'doha'], ['amman', 'muscat'], ['amman', 'manila'], ['davao', 'manila']]"
                viewBox="200 90 680 330"
                class="markets__map"
                data-aos="fade-in"
                data-aos-duration="600"
            />
        </div>
    </section>

    <x-cta />
@endsection
