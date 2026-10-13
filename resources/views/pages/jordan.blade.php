@extends('layouts.division')

{{--
    Al Rayees Charcoal — Jordan profile. Follows the PDF's look: black
    bands, signal-yellow headings, gold contour ribbons and factory
    photography. Copy: lang/{locale}/jordan.php.
--}}

@push('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Alexandria:wght@400;700;800&display=swap">
@endpush

@section('hero')
    <header class="jo-hero">
        <div class="jo-hero__bg" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/warehouse.jpg') }}" alt="" width="1280" height="800" fetchpriority="high">
        </div>
        <x-gold-waves class="jo-hero__waves" />

        <div class="container jo-hero__inner">
            <x-breadcrumb :current="__('site.nav.jordan_short')" :trail="[[__('site.nav.charcoal'), route($locale . '.charcoal')]]" class="breadcrumb--dark" data-aos="fade-down" />

            <img class="jo-hero__brand" src="{{ asset('assets/images/jordan/brand.png') }}" alt="ALRAYEES — Natural Coconut Charcoal" width="480" height="225" data-aos="zoom-in" data-aos-delay="100">

            <h1 class="jo-hero__title">
                <span class="jo-hero__name" data-aos="fade-up" data-aos-delay="200">{{ __('jordan.hero.brand') }}</span>
                <span class="jo-hero__sub" data-aos="fade-up" data-aos-delay="320">{{ __('jordan.hero.title') }}</span>
            </h1>

            <div class="btn-row" data-aos="fade-up" data-aos-delay="450">
                <x-download page="jordan" variant="yellow" />
                <a class="btn btn--ghost-light" href="#contact">{{ __('site.nav.cta') }}</a>
            </div>
        </div>
    </header>
@endsection

@section('division')
    {{-- Why us: the big "4" --}}
    <section class="section jo-band jo-why">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/sorting.jpg') }}" alt="" width="1280" height="960" loading="lazy">
        </div>

        <div class="container jo-why__inner">
            <h2 class="jo-title" data-aos="fade-up">{{ __('jordan.why.title') }}</h2>

            <p class="jo-why__years" data-aos="zoom-in" data-aos-delay="150">
                <span>{{ __('jordan.why.before') }}</span>
                <strong class="ltr" data-count="{{ __('jordan.why.years') }}">{{ __('jordan.why.years') }}</strong>
                <span>{{ __('jordan.why.after') }}</span>
            </p>
            <p class="jo-why__text" data-aos="fade-up" data-aos-delay="250">{{ __('jordan.why.text') }}</p>

            <ul class="jo-facts">
                @foreach (__('jordan.why.facts') as $i => $fact)
                    <li data-aos="fade-up" data-aos-delay="{{ 350 + $i * 100 }}">
                        <x-icon :name="$fact['icon']" />
                        <span class="jo-facts__label">{{ $fact['label'] }}</span>
                        @isset($fact['href'])
                            <a class="jo-facts__value ltr" href="{{ $fact['href'] }}" target="_blank" rel="noopener noreferrer">{{ $fact['value'] }}</a>
                        @else
                            <span class="jo-facts__value">{{ $fact['value'] }}</span>
                        @endisset
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- Jordan as a market --}}
    <section class="section jo-band">
        <x-gold-waves class="jo-band__waves" corner="bottom-start" :lines="10" />

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <p class="jo-kicker">{{ __('jordan.market.kicker') }}</p>
                <h2 class="jo-title">{{ __('jordan.market.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.market.text') }}</p>
            </header>

            <div class="jo-rings">
                @foreach (__('jordan.market.items') as $i => $item)
                    <article class="jo-ring" data-aos="zoom-in" data-aos-delay="{{ $i * 120 }}">
                        <span class="jo-ring__icon"><x-icon :name="$item['icon']" /></span>
                        <h3 class="jo-ring__title">{{ $item['title'] }}</h3>
                        <p>{{ $item['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Value propositions: outlined labels beside their explanation --}}
    <section class="section jo-band jo-band--photo">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/sorting.jpg') }}" alt="" width="1280" height="960" loading="lazy">
        </div>

        <div class="container jo-values">
            @foreach (__('jordan.value') as $i => $item)
                <div class="jo-value">
                    <h2 class="jo-value__label" data-aos="{{ $aosStart }}" data-aos-delay="{{ $i * 120 }}">
                        <x-icon :name="$item['icon']" />
                        {{ $item['title'] }}
                    </h2>
                    <p class="jo-value__text" data-aos="{{ $aosEnd }}" data-aos-delay="{{ $i * 120 + 100 }}">{{ $item['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Who we are: the supply chain --}}
    <section class="section jo-band">
        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title">{{ __('jordan.about.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.about.lead') }}</p>
            </header>

            <ol class="jo-chain">
                @foreach (__('jordan.about.chain') as $i => $step)
                    <li data-aos="fade-up" data-aos-delay="{{ $i * 140 }}">
                        <span class="jo-chain__icon"><x-icon :name="$step['icon']" /></span>
                        <span class="jo-chain__title">{{ $step['title'] }}</span>
                        <span class="jo-chain__note">{{ $step['note'] }}</span>
                    </li>
                @endforeach
            </ol>

            <p class="jo-about__text" data-aos="fade-up">{{ __('jordan.about.text') }}</p>
        </div>
    </section>

    {{-- Specifications over an industrial skyline --}}
    <section class="section jo-band jo-band--photo jo-specs">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/industry.jpg') }}" alt="" width="1600" height="900" loading="lazy">
        </div>

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.specs.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.specs.lead') }}</p>
            </header>

            <div class="jo-spec-grid">
                @foreach (__('jordan.specs.items') as $i => $spec)
                    <div class="jo-spec" data-aos="flip-up" data-aos-delay="{{ $i * 120 }}">
                        <x-icon :name="$spec['icon']" />
                        <strong>{{ $spec['value'] }}</strong>
                        <span>{{ $spec['label'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Products: three framed numbers --}}
    <section class="section jo-band">
        <x-gold-waves class="jo-band__waves" :lines="10" />

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.products.title') }}</h2>
                <p class="jo-lead jo-lead--yellow">{{ __('jordan.products.lead') }}</p>
            </header>

            <div class="jo-products">
                @foreach (__('jordan.products.items') as $i => $product)
                    <article class="jo-product" data-aos="fade-up" data-aos-delay="{{ $i * 150 }}">
                        <p class="jo-product__label"><span class="ltr">{{ $i + 1 }}</span> {{ $product['label'] }}</p>
                        <figure class="jo-product__media">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['title'] }}" width="720" height="560" loading="lazy">
                        </figure>
                        <h3 class="jo-product__title">{{ $product['title'] }}</h3>
                        <p>{{ $product['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Shapes & sizes --}}
    <section class="section jo-band jo-band--photo">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/sorting.jpg') }}" alt="" width="1280" height="960" loading="lazy">
        </div>

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title">{{ __('site.common.shapes') }}</h2>
                <p class="jo-lead">{{ __('site.common.shapes_lead') }}</p>
            </header>

            <x-charcoal-shapes class="shapes--dark" />
        </div>
    </section>

    {{-- Quality guarantees --}}
    <section class="section jo-band">
        <x-gold-waves class="jo-band__waves" corner="bottom-start" :lines="10" />

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.guarantees.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.guarantees.lead') }}</p>
            </header>

            <div class="jo-guarantees">
                @foreach (__('jordan.guarantees.items') as $i => $item)
                    <article class="jo-guarantee" data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 150 }}">
                        <span class="jo-guarantee__icon"><x-icon :name="$item['icon']" /></span>
                        <div>
                            <h3 class="jo-guarantee__title">{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section class="section jo-band">
        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.features.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.features.lead') }}</p>
            </header>

            <ul class="jo-features">
                @foreach (__('jordan.features.items') as $i => $feature)
                    <li @class(['is-accent' => intdiv($i, 2) % 2 === 0]) data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 100 }}">{{ $feature }}</li>
                @endforeach
            </ul>

            <p class="jo-origin" data-aos="fade-up">{{ __('jordan.features.origin') }}</p>
        </div>
    </section>

    {{-- Logistics --}}
    <section class="section jo-band">
        <x-gold-waves class="jo-band__waves" :lines="10" />

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.logistics.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.logistics.lead') }}</p>
            </header>

            <div class="jo-logistics">
                @foreach (__('jordan.logistics.items') as $i => $item)
                    <article class="jo-logistic" data-aos="fade-up" data-aos-delay="{{ ($i % 2) * 120 }}">
                        <span class="jo-logistic__icon"><x-icon :name="$item['icon']" /></span>
                        <div>
                            <h3 class="jo-logistic__title">{{ $item['title'] }}</h3>
                            <p>{{ $item['text'] }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- With vs without Al Rayees --}}
    <section class="section jo-band jo-band--photo">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/sorting.jpg') }}" alt="" width="1280" height="960" loading="lazy">
        </div>

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.compare.title') }}</h2>
            </header>

            <div class="jo-compare">
                <div class="jo-compare__col jo-compare__col--pro" data-aos="{{ $aosStart }}">
                    <h3 class="jo-compare__title"><x-icon name="check-circle" /> {{ __('jordan.compare.with') }}</h3>
                    <ul>
                        @foreach (__('jordan.compare.pros') as $pro)
                            <li><x-icon name="check" /> {{ $pro }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="jo-compare__col jo-compare__col--con" data-aos="{{ $aosEnd }}" data-aos-delay="150">
                    <h3 class="jo-compare__title"><x-icon name="x-circle" /> {{ __('jordan.compare.without') }}</h3>
                    <ul>
                        @foreach (__('jordan.compare.cons') as $con)
                            <li><x-icon name="x" /> {{ $con }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Accreditations --}}
    <section class="section jo-band">
        <div class="container jo-certs">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.certs.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.certs.lead') }}</p>
            </header>

            <div class="jo-certs__badges">
                @foreach (__('jordan.certs.badges') as $i => $badge)
                    <div class="jo-badge" data-aos="zoom-in" data-aos-delay="{{ $i * 150 }}">
                        <strong class="ltr">{{ $badge['value'] }}</strong>
                        <span>{{ $badge['label'] }}</span>
                    </div>
                @endforeach
            </div>

            <div class="jo-certs__list" data-aos="fade-up">
                <h3>{{ __('jordan.certs.list_title') }}</h3>
                <x-checklist :items="__('jordan.certs.list')" />
            </div>
        </div>
    </section>

    {{-- Safety --}}
    <section class="section jo-band">
        <x-gold-waves class="jo-band__waves" corner="bottom-start" :lines="10" />

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl">{{ __('jordan.safety.title') }}</h2>
                <p class="jo-lead">{{ __('jordan.safety.lead') }}</p>
            </header>

            <div class="safety">
                <ul class="safety__rules">
                    @foreach (__('jordan.safety.items') as $i => $rule)
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
                    @foreach (__('jordan.safety.warnings') as $i => $warning)
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
        </div>
    </section>

    {{-- Contact --}}
    <section class="section jo-band jo-band--photo" id="contact">
        <div class="jo-band__photo" aria-hidden="true">
            <img src="{{ asset('assets/images/jordan/warehouse.jpg') }}" alt="" width="1280" height="800" loading="lazy">
        </div>

        <div class="container">
            <header class="jo-head jo-head--center" data-aos="fade-up">
                <h2 class="jo-title jo-title--xl jo-title--white">{{ __('jordan.contact.title') }}</h2>
                <p class="jo-lead jo-lead--yellow">{{ __('jordan.contact.lead') }}</p>
            </header>

            <div class="grid grid--2 jo-contact">
                <x-contact-block :items="__('jordan.contact.rows')" class="contact-block--dark" />
                <x-contact-block :items="__('jordan.contact.offices')" class="contact-block--dark" data-aos-delay="150" />
            </div>

            <div class="jo-contact__download" data-aos="fade-up">
                <x-download page="jordan" variant="yellow" />
            </div>
        </div>
    </section>
@endsection
