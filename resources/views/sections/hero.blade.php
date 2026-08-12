<section class="hero" id="home">
    {{-- Group collage: tinted, dimmed and faded into the page by CSS. --}}
    <div class="hero__media" aria-hidden="true">
        <img
            class="hero__img"
            src="{{ asset('assets/images/hero.jpeg') }}"
            alt=""
            width="1408"
            height="768"
            fetchpriority="high"
            decoding="async"
        >
    </div>

    <canvas class="hero__canvas" data-embers aria-hidden="true"></canvas>

    <div class="container hero__inner">
        <span class="hero__badge">
            <span class="pulse" aria-hidden="true"></span>
            {{ __('site.hero.badge') }}
        </span>

        <h1 class="hero__title">
            <span class="hero__brand-line">{{ __('site.brand.suffix') }} {{ __('site.brand.name') }}</span>

            @foreach (__('site.hero.headline') as $i => $line)
                <span class="line" style="--i: {{ $i }}"><span>{{ $line }}</span></span>
            @endforeach
        </h1>

        <p class="hero__sub">{{ __('site.hero.sub') }}</p>

        <div class="hero__actions">
            <a class="btn btn--primary" href="#divisions" data-magnetic>
                {{ __('site.hero.primary') }}
                <x-icon name="arrow" class="icon-arrow" />
            </a>

            <a class="btn btn--ghost" href="#contact" data-magnetic>
                {{ __('site.hero.secondary') }}
            </a>
        </div>

        <x-stats :items="__('site.stats')" class="hero__stats" />
    </div>

    <div class="hero__cue" aria-hidden="true">
        <span>{{ __('site.hero.scroll') }}</span>
        <span class="hero__cue-track"></span>
    </div>
</section>
