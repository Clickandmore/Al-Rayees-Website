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
     * Resolve the locale from the route (see routes/web.php) and share the
     * matching text direction with every view, so templates can rely on
     * $locale / $dir without repeating the lookup.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locales = config('site.locales');
        $locale  = $request->route()?->parameter('locale');

        if (! is_string($locale) || ! isset($locales[$locale])) {
            $locale = config('app.fallback_locale');
        }

        App::setLocale($locale);

        View::share([
            'locale'    => $locale,
            'dir'       => $locales[$locale]['dir'],
            'isRtl'     => $locales[$locale]['dir'] === 'rtl',
            'altLocale' => $locale === 'ar' ? 'en' : 'ar',
        ]);

        return $next($request);
    }
}
