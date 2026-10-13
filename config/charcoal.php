<?php

/*
|--------------------------------------------------------------------------
| Al Rayees Charcoal — briquette shapes
|--------------------------------------------------------------------------
| Sizes and pieces per kilogram, exactly as listed in both the Jordan and
| the Syria profiles. Language-neutral, so it lives here rather than in
| lang/. Images are cropped from the profiles (public/assets/images).
*/

return [

    'shapes' => [
        [
            'name'  => 'CUBE',
            'image' => 'assets/images/shape-cube.jpg',
            'sizes' => [
                ['20x20x20 mm', 120],
                ['22x22x22 mm', 96],
                ['25x25x25 mm', 72],
                ['26x26x26 mm', 64],
                ['27x27x27 mm', 56],
            ],
        ],
        [
            'name'  => 'FINGER',
            'image' => 'assets/images/shape-finger.jpg',
            'sizes' => [
                ['18x50 mm', 72],
                ['18x35 mm', 102],
                ['20x50 mm', 64],
                ['20x35 mm', 94],
            ],
        ],
        [
            'name'  => 'HEXAGONAL',
            'image' => 'assets/images/shape-hex.jpg',
            'sizes' => [
                ['20x35 mm', 64],
                ['20x50 mm', 94],
            ],
        ],
        [
            'name'  => 'FLAT',
            'image' => 'assets/images/shape-flat.jpg',
            'sizes' => [
                ['25x25x15 mm', 110],
                ['25x25x17 mm', 108],
            ],
        ],
    ],
];
