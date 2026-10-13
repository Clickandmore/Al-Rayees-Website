@extends('layouts.app')

@section('content')
    <x-page-header :title="__('site.nav.about')" :lead="__('site.footer.blurb')" />

    {{-- The group --}}
    <section class="section">
        <div class="container split split--media">
            <div data-aos="{{ $aosStart }}">
                <h2 class="section__title">{{ __('site.overview.title') }}</h2>
                <div class="prose">
                    <p>{{ __('site.overview.text') }}</p>
                </div>
            </div>

            <div class="framed" data-aos="{{ $aosEnd }}">
                <x-media src="assets/images/group-factory.jpg" :alt="__('site.charcoal.factory.4.value')" ratio="4/3" />

                @php $years = __('site.stats')[2]; @endphp
                <div class="framed__badge" data-aos="zoom-in" data-aos-delay="300">
                    <span class="framed__badge-value ltr"><span data-count="{{ $years['value'] }}">{{ $years['value'] }}</span>{{ $years['suffix'] }}</span>
                    <span>{{ $years['label'] }}</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Pull quote --}}
    <section class="section section--alt pull-quote">
        <div class="container">
            <figure data-aos="zoom-in">
                <x-icon name="quote" class="pull-quote__icon" />
                <blockquote>
                    <p>{{ __('site.about.quote') }}</p>
                </blockquote>
                <figcaption>{{ __('site.about.quote_source') }}</figcaption>
            </figure>
        </div>
    </section>

    {{-- Quality commitment --}}
    <section class="section">
        <div class="container split">
            <h2 class="section__title section__title--xl" data-aos="{{ $aosStart }}">{{ __('site.about.title') }}</h2>

            <div class="prose prose--lead" data-aos="{{ $aosEnd }}">
                @foreach (__('site.about.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Vision & mission --}}
    <section class="section section--flush">
        <div class="duo">
            <article class="duo__panel duo__panel--navy" data-aos="{{ $aosStart }}">
                <x-icon name="eye" class="duo__icon" />
                <h2 class="duo__title">{{ __('site.about.vision.label') }}</h2>
                <p>{{ __('site.about.vision.text') }}</p>
            </article>

            <article class="duo__panel duo__panel--light" data-aos="{{ $aosEnd }}">
                <x-icon name="flag" class="duo__icon" />
                <h2 class="duo__title">{{ __('site.about.mission.label') }}</h2>
                <p>{{ __('site.about.mission.text') }}</p>
            </article>
        </div>
    </section>

    {{-- Why the group --}}
    <section class="section section--alt">
        <div class="container">
            <header class="section__head section__head--center" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.about.why_title') }}</h2>
            </header>

            <div class="grid grid--3 why-grid">
                @foreach (__('site.about.why') as $i => $item)
                    <x-feature
                        :title="$item['title']"
                        :text="$item['text']"
                        :icon="$item['icon']"
                        class="feature--lift"
                        data-aos-delay="{{ ($i % 3) * 120 }}"
                    />
                @endforeach
            </div>
        </div>
    </section>

    <x-cta />
@endsection
