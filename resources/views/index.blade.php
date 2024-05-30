@extends('layouts.app')

@section('content')
@if (config('app.locale') === 'ru')
{{-- @include('sections.stats') --}}
@include('sections.hero')
@include('sections.about')
@include('sections.included')
@include('sections.organizer')
@include('sections.speakers')
@include('sections.dates')
{{-- @include('sections.schedule') --}}
@include('sections.payment')
@include('sections.venue')
@include('sections.sponsors')
@include('sections.contacts')

@else
{{-- @include('sections.en.stats') --}}
@include('sections.en.hero')
@include('sections.en.about')
@include('sections.en.included')
@include('sections.en.organizer')
@include('sections.en.speakers')
@include('sections.en.dates')
{{-- @include('sections.en.schedule') --}}
@include('sections.en.payment')
@include('sections.en.venue')
@include('sections.en.sponsors')
@include('sections.en.contacts')
@endif


@endsection