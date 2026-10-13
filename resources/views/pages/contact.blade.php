@extends('layouts.app')

@section('content')
    <x-page-header :title="__('site.contact.title')" :crumb="__('site.nav.contact')" :lead="__('site.contact.text')">
        <div class="btn-row page-header__actions" data-aos="fade-up" data-aos-delay="300">
            <a class="btn btn--light" href="mailto:AlraiyesCorporation@alrayees.com">
                <x-icon name="mail" />
                {{ __('site.nav.cta') }}
            </a>
            <a class="btn btn--ghost-light" href="https://wa.me/962787000185" target="_blank" rel="noopener noreferrer">
                <x-icon name="chat" />
                WhatsApp
            </a>
        </div>
    </x-page-header>

    {{-- One card per division / location, each in its division's colour --}}
    <section class="section">
        <div class="container">
            <div class="grid grid--3">
                @foreach (__('site.contact.cards') as $i => $card)
                    <x-contact-card :card="$card" data-aos-delay="{{ ($i % 3) * 120 }}" />
                @endforeach
            </div>
        </div>
    </section>

    {{-- Where the group operates --}}
    <section class="section section--alt">
        <div class="container split split--media">
            <div data-aos="{{ $aosStart }}">
                <h2 class="section__title">{{ __('site.coverage.title') }}</h2>
                <p class="section__lead">{{ __('site.coverage.text') }}</p>
                <x-inline-list :items="__('site.coverage.pins')" class="inline-list--lg" />
            </div>

            <x-world-map
                :label="__('site.coverage.title')"
                :highlight="['jo', 'sy', 'eg', 'ph']"
                :pins="['amman', 'damascus', 'cairo', 'manila', 'davao']"
                hub="amman"
                viewBox="300 110 560 280"
                class="world-map--framed"
                data-aos="fade-in"
            />
        </div>
    </section>

    <x-cta href="mailto:AlraiyesCorporation@alrayees.com" icon="mail" />
@endsection
