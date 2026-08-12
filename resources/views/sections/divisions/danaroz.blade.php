{{-- Division 02 — Dana Roz Luxury Furnishings. --}}

<section class="division" id="danaroz" data-accent="danaroz">
    <div class="container division__inner">

        <header class="division__head">
            <div class="division__id" data-reveal-group>
                <span class="division__index" data-reveal="fade">
                    <x-icon name="weave" style="width:16px;height:16px" />
                    {{ __('site.danaroz.index') }}
                </span>
                <h2 class="division__name" data-reveal>{{ __('site.danaroz.name') }}</h2>
                <p class="division__tagline" data-reveal>{{ __('site.danaroz.tagline') }}</p>
            </div>

            <div class="prose" data-reveal="right">
                @foreach (__('site.danaroz.body') as $paragraph)
                    <p>{{ $paragraph }}</p>
                @endforeach
            </div>
        </header>

        <x-block :title="__('site.danaroz.highlights_title')">
            <div class="grid grid--3" data-reveal-group>
                @foreach (__('site.danaroz.highlights') as $i => $item)
                    <x-feature-card
                        :title="$item['title']"
                        :text="$item['text']"
                        :index="str_pad($i + 1, 2, '0', STR_PAD_LEFT)"
                    />
                @endforeach
            </div>
        </x-block>

        <div class="grid grid--split">
            <x-block :title="__('site.danaroz.markets_label')">
                <div class="pill-row" data-reveal="fade">
                    @foreach (__('site.danaroz.markets') as $market)
                        <span class="pill pill--accent"><span class="pill__dot"></span>{{ $market }}</span>
                    @endforeach
                </div>
            </x-block>

            <x-block :title="__('site.common.contact')">
                <div class="panel" data-reveal="scale">
                    <x-meta-list :items="__('site.danaroz.contact')" />
                </div>
            </x-block>
        </div>
    </div>
</section>
