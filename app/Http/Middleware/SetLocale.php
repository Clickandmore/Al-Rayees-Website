<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Resolve the locale and page from the route (see routes/web.php) and
     * share them with every view, so templates can rely on $locale / $dir /
     * $page without repeating the lookup.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales = config('site.locales');
        $locale  = $request->route()?->parameter('locale');

        if (! is_string($locale) || ! isset($locales[$locale])) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);

        $page  = $request->route()?->parameter('page') ?? 'home';
        $isRtl = $locales[$locale]['dir'] === 'rtl';

        View::share([
            'locale'    => $locale,
            'dir'       => $locales[$locale]['dir'],
            'isRtl'     => $isRtl,
            'altLocale' => $locale === 'ar' ? 'en' : 'ar',
            'page'      => $page,

            // Division pages and division profiles carry their own colour
            // theme (named after the page); the rest use the group's.
            'theme'     => array_key_exists($page, config('site.divisions')) || config("site.pages.{$page}.parent")
                ? $page
                : 'group',

            // AOS slide directions, mirrored for RTL: "from the start side"
            // enters from the right in Arabic and from the left in English.
            'aosStart'  => $isRtl ? 'fade-left' : 'fade-right',
            'aosEnd'    => $isRtl ? 'fade-right' : 'fade-left',

            // "مجموعة الريس" / "Al Rayees Group" — word order differs by language.
            'groupName' => $locale === 'ar'
                ? __('site.brand.suffix') . ' ' . __('site.brand.name')
                : __('site.brand.name') . ' ' . __('site.brand.suffix'),
        ]);

        return $next($request);
    }
}
