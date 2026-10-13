@props(['variant' => 'default'])

{{--
    "Al Rayees for Industrial Investments" lockup, traced from the client's
    logo file into public/assets/brand:

      default → gold monogram + navy wordmark (for light backgrounds)
      gold    → all-gold (for the navy footer)

    The wordmark follows the page language: Arabic beside the mark on RTL
    pages, English on LTR pages — matching the horizontal master artwork.
--}}

@php
    $locale = app()->getLocale();
    $file = "assets/brand/logo-{$locale}" . ($variant === 'gold' ? '-gold' : '') . '.svg';
    $alt = $locale === 'ar' ? 'الريس للاستثمارات الصناعية' : 'Alrayees for Industrial Investments';

    // Intrinsic size of each lockup's viewBox, so the browser reserves space.
    [$w, $h] = $locale === 'ar' ? [962, 463] : [1062, 463];
@endphp

<img {{ $attributes->class('logo') }} src="{{ asset($file) }}" alt="{{ $alt }}" width="{{ $w }}" height="{{ $h }}">
