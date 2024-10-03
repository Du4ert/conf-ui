@extends('layouts.app')

@section('content')
@if (config('app.locale') === 'ru')
{{-- @include('sections.stats') --}}
@include('sections.ru.hero')
=@include('sections.ru.about')
@include('sections.ru.organizer')
@include('sections.ru.included')
@include('sections.ru.сommittee')
{{-- @include('sections.speakers') --}}
{{-- @include('sections.ru.dates') --}}
@include('sections.ru.program')
{{-- @include('sections.ru.schedule') --}}
@include('sections.ru.payment')
@include('sections.ru.venue')
@include('sections.ru.sponsors')
@include('sections.ru.contacts')

@else
{{-- @include('sections.en.stats') --}}
@include('sections.en.hero')
@include('sections.en.about')
@include('sections.en.organizer')
@include('sections.en.included')
@include('sections.en.committee')
{{-- @include('sections.en.speakers') --}}
{{-- @include('sections.en.dates') --}}
@include('sections.en.program')
{{-- @include('sections.en.schedule') --}}
@include('sections.en.payment')
@include('sections.en.venue')
@include('sections.en.sponsors')
@include('sections.en.contacts')
@endif


@endsection