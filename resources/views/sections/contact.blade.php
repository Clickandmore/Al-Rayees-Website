<section class="section" id="contact">
    <div class="container section__inner">
        <x-section-head
            :eyebrow="__('site.contact.eyebrow')"
            :title="__('site.contact.title')"
            :highlight="__('site.contact.highlight')"
            :lead="__('site.contact.text')"
            :center="true"
        />

        <div class="contact-grid" data-reveal-group>
            @foreach (__('site.contact.cards') as $card)
                <x-contact-card :card="$card" />
            @endforeach
        </div>

        <div class="cta-banner u-accent-gold" data-reveal="scale">
            <div class="cta-banner__text">
                <h3 class="cta-banner__title">{{ __('site.brand.tagline') }}</h3>
                <p class="text-dim">{{ __('site.coverage.text') }}</p>
            </div>

            <div class="cta-banner__actions">
                <a class="btn btn--primary" href="mailto:AlraiyesCorporation@alrayees.com" data-magnetic>
                    <x-icon name="mail" />
                    {{ __('site.nav.cta') }}
                </a>

                <a
                    class="btn btn--ghost"
                    href="https://wa.me/962787000185"
                    target="_blank"
                    rel="noopener noreferrer"
                    data-magnetic
                >
                    <x-icon name="chat" />
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
