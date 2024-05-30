@extends('layouts.app')

@section('content')
@if (config('app.locale') === 'ru')
{{-- @include('sections.stats') --}}
@include('sections.hero')
@include('sections.about')
@include('sections.organizer')
@include('sections.included')
@include('sections.сommittee')
{{-- @include('sections.speakers') --}}
@include('sections.dates')
{{-- @include('sections.schedule') --}}
@include('sections.payment')
@include('sections.venue')
@include('sections.sponsors')
@include('sections.contacts')

@else
{{-- @include('sections.en.stats') --}}
@include('sections.en.en_hero')
@include('sections.en.en_about')
@include('sections.en.en_organizer')
@include('sections.en.en_included')
@include('sections.en.en_committee')
{{-- @include('sections.en.en_speakers') --}}
@include('sections.en.en_dates')
{{-- @include('sections.en.schedule') --}}
@include('sections.en.en_payment')
@include('sections.en.en_venue')
@include('sections.en.en_sponsors')
@include('sections.en.en_contacts')
@endif


@endsection