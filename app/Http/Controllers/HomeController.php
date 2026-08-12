<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Render the single-page site.
     *
     * There is no data layer: the copy comes from lang/{locale}/site.php and
     * the section map from config/site.php, so the view needs nothing else.
     * The active locale is resolved upstream by the SetLocale middleware.
     */
    public function index(): View
    {
        return view('pages.home');
    }
}
