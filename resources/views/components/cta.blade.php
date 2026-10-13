@props([
    // Primary button target; defaults to the contact page.
    'href' => null,
    'icon' => null,
])

{{--
    Closing call-to-action, used at the end of every page: a navy panel
    with the group tagline, its coverage line, a primary button and
    WhatsApp. The monogram sits in the corner as a quiet watermark.
--}}

@php
    $href ??= route(app()->getLocale() . '.contact');
@endphp

<section class="section cta">
    <div class="container">
        <div class="cta__panel" data-aos="zoom-in-up">
            <img class="cta__mark" src="{{ asset('assets/brand/mark.svg') }}" alt="" aria-hidden="true" width="263" height="463">

            <div class="cta__text">
                <span class="cta__rule" aria-hidden="true"></span>
                <h2 class="cta__title">{{ __('site.brand.tagline') }}</h2>
                <p class="cta__lead">{{ __('site.coverage.text') }}</p>
            </div>

            <div class="cta__actions">
                <a class="btn btn--light" href="{{ $href }}">
                    @if ($icon)
                        <x-icon :name="$icon" />
                    @endif
                    {{ __('site.nav.cta') }}
                    <x-icon name="arrow" class="icon-flip btn__arrow" />
                </a>

                <a class="btn btn--ghost-light" href="https://wa.me/962787000185" target="_blank" rel="noopener noreferrer">
                    <x-icon name="chat" />
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
