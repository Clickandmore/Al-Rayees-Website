@props(['division'])

{{--
    "Company profiles" band on a division page: one card per profile page
    whose `parent` is this division, linking to it and offering the PDF.
--}}

@php
    $locale = app()->getLocale();
    $profiles = collect(config('site.pages'))->where('parent', $division);
@endphp

@if ($profiles->isNotEmpty())
    <section {{ $attributes->class('section profile-links') }}>
        <div class="container">
            <header class="section__head" data-aos="fade-up">
                <h2 class="section__title">{{ __('site.common.profiles') }}</h2>
                <p class="section__lead">{{ __('site.common.profiles_lead') }}</p>
            </header>

            <div class="profile-links__grid">
                @foreach ($profiles as $key => $profile)
                    <article class="profile-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}">
                        <span class="profile-card__icon"><x-icon name="file" /></span>
                        <h3 class="profile-card__title">{{ __($profile['label']) }}</h3>
                        <p class="profile-card__text">{{ \Illuminate\Support\Str::limit(__($profile['description']), 140) }}</p>

                        <div class="profile-card__actions">
                            <a class="btn btn--primary" href="{{ route("{$locale}.{$key}") }}">
                                {{ __('site.common.view') }}
                                <x-icon name="arrow" class="icon-flip btn__arrow" />
                            </a>
                            <x-download :page="$key" variant="outline" />
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif
