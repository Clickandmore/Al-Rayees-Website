<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| The site is a single page rendered in two languages. Each language gets
| its own URL so it can be linked, shared and indexed independently:
|
|   /     → Arabic  (RTL, default)
|   /en   → English (LTR)
|
| The locale is attached as a route default and picked up by the
| SetLocale middleware, which also shares the text direction with views.
*/

Route::get('/', [HomeController::class, 'index'])
    ->defaults('locale', 'ar')
    ->name('home.ar');

Route::get('/en', [HomeController::class, 'index'])
    ->defaults('locale', 'en')
    ->name('home.en');
