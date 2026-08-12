@extends('layouts.app')

{{--
    The single page. Sections are ordered the way the client's content
    document lays them out: hero → group overview → about → the four
    divisions → contact.
--}}

@section('content')
    @include('sections.hero')
    @include('sections.about')
    @include('sections.overview')

    @include('sections.divisions.charcoal')
    @include('sections.divisions.danaroz')
    @include('sections.divisions.amtech')
    @include('sections.divisions.leadwell')

    @include('sections.contact')
@endsection
