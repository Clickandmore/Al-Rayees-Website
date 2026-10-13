@props([
    // A page key from config/site.php that has a `file` (a division profile).
    'page',
    // Button style: any .btn modifier (primary, outline, light, ghost-light).
    'variant' => 'primary',
])

{{--
    "Download the profile" button for a page's PDF, with its format and size.
    File names may contain Arabic and spaces, so each path segment is
    URL-encoded; `download` offers the browser a clean ASCII name.
--}}

@php
    $config = config("site.pages.{$page}");
    $path = $config['file'];
    $href = asset(implode('/', array_map('rawurlencode', explode('/', $path))));
    $bytes = is_file(public_path($path)) ? filesize(public_path($path)) : null;
    $size = $bytes ? number_format($bytes / 1048576, 1) . ' MB' : null;
@endphp

<a
    {{ $attributes->class(['btn', "btn--{$variant}", 'btn--download']) }}
    href="{{ $href }}"
    download="{{ $config['download_as'] }}"
    type="application/pdf"
>
    <x-icon name="download" />
    <span>{{ __('site.common.download') }}</span>
    <span class="btn__meta ltr">PDF{{ $size ? " · {$size}" : '' }}</span>
</a>
