<?php

/*
|--------------------------------------------------------------------------
| Site structure
|--------------------------------------------------------------------------
| Structural configuration: which locales exist and which pages the site
| has. Labels and copy are resolved from lang/{locale}/site.php, so this
| file stays language-agnostic.
|
| Adding a page: add an entry under `pages`, create
| resources/views/pages/{key}.blade.php, and (for a new division) add it to
| `divisions`. Routes, navigation, the language switch and the footer all
| read from here.
*/

return [

    'locales' => [
        // `prefix` is the URL segment the locale lives under ('' = root).
        'ar' => ['name' => 'العربية', 'dir' => 'rtl', 'prefix' => ''],
        'en' => ['name' => 'English', 'dir' => 'ltr', 'prefix' => 'en'],
    ],

    /*
     | Every page: its URL slug, its nav label, and the translation keys used
     | for its <title> and meta description.
     */
    'pages' => [
        'home'     => ['slug' => '',          'label' => 'site.nav.home',     'description' => 'site.meta.description'],
        'about'    => ['slug' => 'about',     'label' => 'site.nav.about',    'description' => 'site.overview.text'],
        'charcoal' => ['slug' => 'charcoal',  'label' => 'site.nav.charcoal', 'description' => 'site.charcoal.tagline'],
        'danaroz'  => ['slug' => 'dana-rose', 'label' => 'site.nav.danaroz',  'description' => 'site.cards.1.text'],
        'amtech'   => ['slug' => 'amtech',    'label' => 'site.nav.amtech',   'description' => 'site.cards.2.text'],
        'leadwell' => ['slug' => 'leadwell',  'label' => 'site.nav.leadwell', 'description' => 'site.cards.3.text'],
        'contact'  => ['slug' => 'contact',   'label' => 'site.nav.contact',  'description' => 'site.contact.text'],

        // Division profiles — each mirrors one of the client's PDF profiles
        // (public/assets/files) and offers it for download.
        //   parent       the division it belongs to (nav, breadcrumb)
        //   short        label inside that division's group in the menus
        //   file         the PDF, relative to public/
        //   download_as  the file name offered to the browser
        'jordan' => [
            'slug' => 'charcoal/jordan', 'label' => 'site.nav.jordan', 'short' => 'site.nav.jordan_short',
            'description' => 'jordan.meta.description', 'parent' => 'charcoal',
            'file' => 'assets/files/الريس نسخة الاردن معدلة.pdf', 'download_as' => 'Alrayees-Charcoal-Jordan.pdf',
        ],
        'syria' => [
            'slug' => 'charcoal/syria', 'label' => 'site.nav.syria', 'short' => 'site.nav.syria_short',
            'description' => 'syria.meta.description', 'parent' => 'charcoal',
            'file' => 'assets/files/ملف الريس - سوريا.pdf', 'download_as' => 'Alrayees-Charcoal-Syria.pdf',
        ],
        'amtech-profile' => [
            'slug' => 'amtech/profile', 'label' => 'site.nav.amtech_profile', 'short' => 'site.nav.amtech_profile_short',
            'description' => 'amtech_profile.meta.description', 'parent' => 'amtech',
            'file' => 'assets/files/Amtech Dental Lab.pdf', 'download_as' => 'Amtech-Dental-Laboratory-Profile.pdf',
        ],
    ],

    /*
     | The divisions, in display order. Each page also sets a colour theme
     | of the same name (resources/css/base/_themes.css).
     |
     |   card    index into site.cards (name + summary)
     |   icon    <x-icon> name
     |   image   photo relative to public/, or null
     |   visual  what to show when there is no photo yet: 'carpet'
     |           (generated rug illustration) or 'map' (routes map).
     |           TODO: replace with real photos when the client supplies them.
     */
    'divisions' => [
        'charcoal' => ['card' => 0, 'icon' => 'flame', 'image' => 'assets/images/charcoal-sorting.jpg', 'visual' => null],
        'danaroz'  => ['card' => 1, 'icon' => 'sofa',  'image' => null,                                 'visual' => 'carpet'],
        'amtech'   => ['card' => 2, 'icon' => 'tooth', 'image' => 'assets/images/amtech-lab.jpg',      'visual' => null],
        'leadwell' => ['card' => 3, 'icon' => 'users', 'image' => null,                                 'visual' => 'map'],
    ],

    'company' => [
        'name'    => 'Al Rayees Group',
        'founded' => 1996,
    ],
];
