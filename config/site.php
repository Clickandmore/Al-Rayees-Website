<?php

/*
|--------------------------------------------------------------------------
| Site structure
|--------------------------------------------------------------------------
| Structural configuration for the single-page site: which locales exist,
| and the section map used by the navigation, the scroll-spy and the
| accent-colour takeover. Labels are resolved from lang/{locale}/site.php
| via the `label` translation key, so this file stays language-agnostic.
*/

return [

    'locales' => [
        'ar' => ['name' => 'العربية', 'dir' => 'rtl', 'route' => 'home.ar'],
        'en' => ['name' => 'English', 'dir' => 'ltr', 'route' => 'home.en'],
    ],

    /*
     | Every entry becomes: a nav link, a scroll-spy target and — when an
     | accent is set — a section that repaints the page accent as it enters
     | the viewport.
     */
    'sections' => [
        ['id' => 'about',     'label' => 'site.nav.about',     'accent' => null,       'nav' => true],
        ['id' => 'divisions', 'label' => 'site.nav.divisions', 'accent' => null,       'nav' => true],
        ['id' => 'charcoal',  'label' => 'site.nav.charcoal',  'accent' => 'charcoal', 'nav' => false],
        ['id' => 'danaroz',   'label' => 'site.nav.danaroz',   'accent' => 'danaroz',  'nav' => false],
        ['id' => 'amtech',    'label' => 'site.nav.amtech',    'accent' => 'amtech',   'nav' => false],
        ['id' => 'leadwell',  'label' => 'site.nav.leadwell',  'accent' => 'leadwell', 'nav' => false],
        ['id' => 'contact',   'label' => 'site.nav.contact',   'accent' => null,       'nav' => true],
    ],

    'company' => [
        'name'    => 'Al Rayees Group',
        'founded' => 1996,
    ],
];
