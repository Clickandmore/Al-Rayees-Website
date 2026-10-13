@extends('layouts.app')

{{--
    Shared frame for a division page. Each division sets its own colour
    theme (body[data-theme], see css/base/_themes.css) and builds its own
    hero and bands, so the four pages read differently while sharing the
    header, footer, components and closing CTA:

      @section('hero')      — the division's opening band (with <x-breadcrumb>)
      @section('division')  — its content bands, ending with contact details
      → closing CTA

    Breadcrumb trail for a division: Home / Divisions / {name}.
--}}

@section('content')
    @yield('hero')

    @yield('division')

    <x-cta />
@endsection
