{{-- Division 04 — Leadwell International Manpower Services, Inc. --}}

<section class="division" id="leadwell" data-accent="leadwell">
    <div class="container division__inner">

        <header class="division__head">
            <div class="division__id" data-reveal-group>
                <span class="division__index" data-reveal="fade">
                    <x-icon name="people" style="width:16px;height:16px" />
                    {{ __('site.leadwell.index') }}
                </span>
                <h2 class="division__name" data-reveal>{{ __('site.leadwell.name') }}</h2>
                <p class="division__tagline" data-reveal>{{ __('site.leadwell.tagline') }}</p>
            </div>

            <div class="prose" data-reveal="right">
                @foreach (__('site.leadwell.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </header>

        <x-block :title="__('site.leadwell.highlights_title')">
            <div class="grid grid--3" data-reveal-group>
                @foreach (__('site.leadwell.highlights') as $item)
                    <x-feature-card :title="$item['title']" :text="$item['text']" icon="badge" />
                @endforeach
            </div>
        </x-block>

        <div class="grid grid--split">
            <x-block :title="__('site.leadwell.markets_label')">
                <div class="pill-row" data-reveal="fade">
                    @foreach (__('site.leadwell.markets') as $market)
                        <span class="pill pill--accent"><span class="pill__dot"></span>{{ $market }}</span>
                    @endforeach
                </div>
            </x-block>

            <x-block :title="__('site.common.contact')">
                <div class="panel panel--accent" data-reveal="scale">
                    <x-meta-list :items="__('site.leadwell.contact')" />
                </div>
            </x-block>
        </div>
    </div>
</section>
