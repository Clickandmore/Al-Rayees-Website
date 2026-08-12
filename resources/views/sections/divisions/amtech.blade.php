{{-- Division 03 — Amtech Dental Laboratory Inc. --}}

<section class="division" id="amtech" data-accent="amtech">
    <div class="container division__inner">

        <header class="division__head">
            <div class="division__id" data-reveal-group>
                <span class="division__index" data-reveal="fade">
                    <x-icon name="tooth" style="width:16px;height:16px" />
                    {{ __('site.amtech.index') }}
                </span>
                <h2 class="division__name" data-reveal>{{ __('site.amtech.name') }}</h2>
                <p class="division__tagline" data-reveal>{{ __('site.amtech.tagline') }}</p>
            </div>

            <div class="prose" data-reveal="right">
                @foreach (__('site.amtech.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </header>

        {{-- Vision + mission commitments --}}
        <div class="grid grid--sticky-side">
            <aside class="sticky-side">
                <div class="panel panel--accent" data-reveal="left">
                    <header class="panel__head">
                        <span class="icon-chip icon-chip--sm"><x-icon name="target" /></span>
                        <h3 class="panel__title">{{ __('site.amtech.vision.label') }}</h3>
                    </header>
                    <p class="text-dim">{{ __('site.amtech.vision.text') }}</p>
                </div>
            </aside>

            <x-block :title="__('site.amtech.mission_title')">
                <div class="grid grid--2" data-reveal-group>
                    @foreach (__('site.amtech.mission') as $item)
                        <x-feature-card :title="$item['title']" :text="$item['text']" icon="shield" />
                    @endforeach
                </div>
            </x-block>
        </div>

        {{-- Core values --}}
        <x-block :title="__('site.amtech.values_title')">
            <ul class="value-list" data-reveal="fade">
                @foreach (__('site.amtech.values') as $value)
                    <li>{{ $value }}</li>
                @endforeach
            </ul>
        </x-block>

        {{-- Services --}}
        <x-block :title="__('site.amtech.services_title')" :sub="__('site.amtech.services_sub')">
            <div class="chip-grid" data-reveal-group>
                @foreach (__('site.amtech.services') as $i => $service)
                    <span class="chip" data-reveal="scale">
                        <span class="chip__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        {{ $service }}
                    </span>
                @endforeach
            </div>
        </x-block>

        {{-- Materials --}}
        <x-block :title="__('site.amtech.materials_title')">
            <div class="grid grid--3" data-reveal-group>
                @foreach (__('site.amtech.materials') as $material)
                    <article class="material" data-reveal>
                        <h4 class="material__name">{{ $material['name'] }}</h4>
                        <p class="material__text">{{ $material['text'] }}</p>
                    </article>
                @endforeach
            </div>
        </x-block>

        {{-- Why partner + contact --}}
        <div class="grid grid--split">
            <x-block :title="__('site.amtech.why_title')">
                <div class="stack stack-md">
                    <div class="panel">
                        <x-checklist :items="__('site.amtech.why')" />
                    </div>

                    <blockquote class="quote" data-reveal="scale">
                        <p class="quote__text">{{ __('site.amtech.quote') }}</p>
                    </blockquote>
                </div>
            </x-block>

            <x-block :title="__('site.common.contact')">
                <div class="panel panel--accent" data-reveal="scale">
                    <x-meta-list :items="__('site.amtech.contact')" />
                </div>
            </x-block>
        </div>
    </div>
</section>
