<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__brand">
                <a href="{{ route("{$locale}.home") }}">
                    <x-logo variant="gold" class="footer__logo" />
                </a>
                <p class="footer__blurb">{{ __('site.footer.blurb') }}</p>
            </div>

            <div class="footer__col">
                <h2 class="footer__title">{{ __('site.footer.nav_title') }}</h2>
                <ul>
                    @foreach (['home', 'about', 'contact'] as $key)
                        <li><a href="{{ route("{$locale}.{$key}") }}">{{ __(config("site.pages.{$key}.label")) }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__title">{{ __('site.footer.div_title') }}</h2>
                <ul class="footer__divisions">
                    @foreach (config('site.divisions') as $key => $division)
                        <li class="theme-{{ $key }}">
                            <a class="footer__division" href="{{ route("{$locale}.{$key}") }}">
                                <span class="footer__division-icon"><x-icon :name="$division['icon']" /></span>
                                {{ __(config("site.pages.{$key}.label")) }}
                            </a>

                            @php $subs = collect(config('site.pages'))->where('parent', $key); @endphp
                            @if ($subs->isNotEmpty())
                                <div class="footer__chips">
                                    @foreach ($subs as $sub => $profile)
                                        <a class="footer__chip" href="{{ route("{$locale}.{$sub}") }}">
                                            <x-icon name="file" />
                                            {{ __($profile['short']) }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="footer__col">
                <h2 class="footer__title">{{ __('site.footer.reach') }}</h2>
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

        <div class="footer__bottom">
            <span>© {{ now()->year }} {{ $groupName }}. {{ __('site.footer.rights') }}</span>
            <span>{{ __('site.coverage.text') }}</span>
        </div>
    </div>
</footer>
