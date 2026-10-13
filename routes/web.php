<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Every page in config('site.pages') is registered once per locale:
|
|   /about      → Arabic  (RTL, default)
|   /en/about   → English (LTR)
|
| Routes are named "{locale}.{page}" (e.g. "en.charcoal"). The locale and
| page key are attached as route defaults and picked up by the SetLocale
| middleware, which shares them with every view.
*/

foreach (config('site.locales') as $locale => $config) {
    foreach (config('site.pages') as $page => $meta) {
        $uri = trim($config['prefix'] . '/' . $meta['slug'], '/');

        Route::get($uri === '' ? '/' : $uri, PageController::class)
            ->defaults('locale', $locale)
            ->defaults('page', $page)
            ->name("{$locale}.{$page}");
    }
}
