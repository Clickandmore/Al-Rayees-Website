<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Render a static page.
     *
     * There is no data layer: the copy comes from lang/{locale}/site.php and
     * the page map from config/site.php. The page key is a route default
     * (see routes/web.php) and maps one-to-one to resources/views/pages.
     */
    public function __invoke(Request $request): View
    {
        return view('pages.' . $request->route('page'));
    }
}
