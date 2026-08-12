{{-- Division 01 — Al Rayees Charcoal (the Group's largest activity). --}}

<section class="division" id="charcoal" data-accent="charcoal">
    <div class="container division__inner">

        <header class="division__head">
            <div class="division__id" data-reveal-group>
                <span class="division__index" data-reveal="fade">
                    <x-icon name="flame" style="width:16px;height:16px" />
                    {{ __('site.charcoal.index') }}
                </span>
                <h2 class="division__name" data-reveal>{{ __('site.charcoal.name') }}</h2>
                <p class="division__tagline" data-reveal>{{ __('site.charcoal.tagline') }}</p>
            </div>

            <div class="stack stack-md" data-reveal="right">
                <div class="prose">
                    @foreach (__('site.charcoal.body') as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                <div class="pill-row">
                    @foreach (__('site.charcoal.badges') as $badge)
                        <span class="pill pill--accent"><span class="pill__dot"></span>{{ $badge }}</span>
                    @endforeach
                </div>
            </div>
        </header>

        {{-- Products --}}
        <x-block :title="__('site.charcoal.products_title')" :sub="__('site.charcoal.products_sub')">
            <div class="grid grid--3" data-reveal-group>
                @foreach (__('site.charcoal.products') as $product)
                    <x-product-card :product="$product" />
                @endforeach
            </div>
        </x-block>

        {{-- Quality guarantees --}}
        <x-block :title="__('site.charcoal.guarantees_title')">
            <div class="grid grid--4" data-reveal-group>
                @foreach (__('site.charcoal.guarantees') as $item)
                    <x-feature-card :title="$item['title']" :text="$item['text']" :icon="$item['icon']" />
                @endforeach
            </div>
        </x-block>

        {{-- Services + shipment documents --}}
        <div class="grid grid--split">
            <x-block :title="__('site.charcoal.services_title')" :sub="__('site.charcoal.services_sub')">
                <div class="stack stack-sm" data-reveal-group>
                    @foreach (__('site.charcoal.services') as $i => $service)
                        <article class="card card--flat" data-reveal="left">
                            <div class="row">
                                <span class="card__index num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <h4 class="card__title" style="font-size: var(--fs-lg)">{{ $service['title'] }}</h4>
                            </div>
                            <p class="card__text">{{ $service['text'] }}</p>
                        </article>
                    @endforeach
                </div>
            </x-block>

            <x-block :title="__('site.charcoal.documents_title')" :sub="__('site.charcoal.documents_sub')">
                <div class="panel">
                    <x-checklist :items="__('site.charcoal.documents')" />
                </div>
            </x-block>
        </div>

        {{-- Coverage & certifications --}}
        <x-block :title="__('site.charcoal.coverage_title')" :sub="__('site.charcoal.coverage_text')">
            <div class="stack stack-md">
                <x-stats :items="__('site.charcoal.coverage_stats')" :inline="true" />

                <div class="pill-row" data-reveal="fade">
                    @foreach (__('site.charcoal.coverage_markets') as $market)
                        <span class="pill"><x-icon name="ship" style="width:13px;height:13px" />{{ $market }}</span>
                    @endforeach
                </div>
            </div>
        </x-block>

        {{-- Markets — tabbed --}}
        <x-block :title="__('site.charcoal.markets_title')">
            <div class="tabs" data-tabs data-reveal="fade">
                <div class="tabs__list" role="tablist" aria-label="{{ __('site.charcoal.markets_title') }}">
                    <span class="tabs__marker" data-tabs-marker aria-hidden="true"></span>

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
                        class="tabs__panel {{ $i === 0 ? 'is-active' : '' }}"
                        id="panel-{{ $market['key'] }}"
                        role="tabpanel"
                        aria-labelledby="tab-{{ $market['key'] }}"
                        tabindex="0"
                    >
                        <div class="grid grid--split">
                            <ul class="bullets">
                                @foreach ($market['points'] as $point)
                                    <li>{{ $point }}</li>
                                @endforeach
                            </ul>

                            <div class="panel">
                                <x-meta-list :items="$market['meta']" />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-block>

        {{-- Factory contact --}}
        <x-block :title="__('site.charcoal.factory_title')">
            <div class="panel panel--accent" data-reveal="scale">
                <x-meta-list :items="__('site.charcoal.factory')" />
            </div>
        </x-block>
    </div>
</section>
