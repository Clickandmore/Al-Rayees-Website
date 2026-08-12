<section class="section" id="about">
    <div class="container section__inner">

        {{-- Group overview --}}
        <div class="grid grid--split">
            <x-section-head
                :eyebrow="__('site.overview.eyebrow')"
                :title="__('site.overview.title')"
                :highlight="__('site.overview.highlight')"
            />

            <div class="prose" data-reveal="right">
                <p>{{ __('site.overview.text') }}</p>
            </div>
        </div>

        <hr class="rule">

        {{-- About us --}}
        <div class="grid grid--split">
            <x-section-head
                :eyebrow="__('site.about.eyebrow')"
                :title="__('site.about.title')"
                :highlight="__('site.about.highlight')"
            />

            <div class="stack stack-lg">
                <div class="prose" data-reveal="right">
                    @foreach (__('site.about.body') as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>

                <blockquote class="quote" data-reveal="scale">
                    <p class="quote__text">{{ __('site.about.quote') }}</p>
                    <footer class="quote__source">{{ __('site.about.quote_source') }}</footer>
                </blockquote>
            </div>
        </div>

        {{-- Vision & mission --}}
        <div class="grid grid--2" data-reveal-group>
            @foreach (['vision', 'mission'] as $i => $key)
                <article class="panel panel--accent" data-reveal>
                    <header class="panel__head">
                        <span class="icon-chip icon-chip--sm">
                            <x-icon :name="$key === 'vision' ? 'target' : 'sparkle'" />
                        </span>
                        <h3 class="panel__title">{{ __("site.about.{$key}.label") }}</h3>
                    </header>

                    <p class="text-dim">{{ __("site.about.{$key}.text") }}</p>
                </article>
            @endforeach
        </div>

        {{-- Why the group --}}
        <x-block :title="__('site.about.why_title')">
            <div class="grid grid--3" data-reveal-group>
                @foreach (__('site.about.why') as $item)
                    <x-feature-card
                        :title="$item['title']"
                        :text="$item['text']"
                        :icon="$item['icon']"
                    />
                @endforeach
            </div>
        </x-block>
    </div>
</section>
