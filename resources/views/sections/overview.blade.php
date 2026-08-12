{{-- Marquee ribbon + group overview + the four division entry cards. --}}

<div class="marquee" aria-hidden="true">
    @foreach ([1, 2] as $pass)
        <div class="marquee__track">
            @foreach (__('site.marquee') as $country)
                <span class="marquee__item">
                    {{ $country }}
                    <span class="marquee__sep"></span>
                </span>
            @endforeach
        </div>
    @endforeach
</div>

<section class="section" id="divisions">
    <div class="container section__inner">
        <x-section-head
            :eyebrow="__('site.divisions_intro.eyebrow')"
            :title="__('site.divisions_intro.title')"
            :highlight="__('site.divisions_intro.highlight')"
            :lead="__('site.divisions_intro.text')"
        />

        <div class="grid grid--2" data-reveal-group>
            @foreach (__('site.cards') as $card)
                <x-division-card :card="$card" />
            @endforeach
        </div>

        {{-- Global coverage plate --}}
        <div class="coverage u-accent-gold" data-reveal="scale">
            <div class="stack stack-md">
                <span class="eyebrow">{{ __('site.coverage.title') }}</span>
                <p class="section-lead">{{ __('site.coverage.text') }}</p>

                <div class="pill-row">
                    @foreach (__('site.coverage.pins') as $pin)
                        <span class="pill"><span class="pill__dot"></span>{{ $pin }}</span>
                    @endforeach
                </div>
            </div>

            <x-globe />
        </div>
    </div>
</section>
