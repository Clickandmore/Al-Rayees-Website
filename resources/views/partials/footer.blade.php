@php
    $navSections = collect(config('site.sections'))->where('nav', true);
    $divisions = collect(config('site.sections'))->whereNotNull('accent');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__brand">
                <a class="brand" href="#main">
                    <span class="brand__mark"><x-logo :animated="false" /></span>
                    <span class="brand__text">
                        <span class="brand__name">{{ __('site.brand.name') }}</span>
                        <span class="brand__suffix">{{ __('site.brand.suffix') }}</span>
                    </span>
                </a>

                <p class="footer__blurb">{{ __('site.footer.blurb') }}</p>

                <div class="pill-row">
                    <span class="pill pill--accent"><span class="pill__dot"></span>{{ __('site.brand.tagline') }}</span>
                </div>
            </div>

            <div class="footer__col">
                <h3>{{ __('site.footer.nav_title') }}</h3>
                <ul>
                    @foreach ($navSections as $section)
                        <li><a href="#{{ $section['id'] }}">{{ __($section['label']) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h3>{{ __('site.footer.div_title') }}</h3>
                <ul>
                    @foreach ($divisions as $section)
                        <li><a href="#{{ $section['id'] }}">{{ __($section['label']) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h3>{{ __('site.footer.reach') }}</h3>
                <ul>
                    <li>
                        <a href="mailto:charcoal@alrayees.com">
                            <x-icon name="mail" />
                            <span class="ltr">charcoal@alrayees.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:AlraiyesCorporation@alrayees.com">
                            <x-icon name="mail" />
                            <span class="ltr">AlraiyesCorporation@alrayees.com</span>
                        </a>
                    </li>
                    <li>
                        <a href="tel:+639616416818">
                            <x-icon name="phone" />
                            <span class="ltr">+63 961 641 6818</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <p class="footer__watermark" aria-hidden="true">{{ __('site.brand.suffix') }} {{ __('site.brand.name') }}</p>

        <div class="footer__bottom">
            <span>© {{ now()->year }} {{ config('site.company.name') }}. {{ __('site.footer.rights') }}</span>

            <span class="footer__legal">
                <span>{{ __('site.coverage.text') }}</span>
            </span>
        </div>
    </div>
</footer>
