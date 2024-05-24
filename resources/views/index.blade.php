@extends('layouts.app')

@section('content')
{{-- @include('sections.stats') --}}
@include('sections.hero')
@include('sections.about')
@include('sections.organizer')
@include('sections.included')
@include('sections.speakers')
@include('sections.dates')
{{-- @include('sections.schedule') --}}
@include('sections.tickets')
@include('sections.venue')
@include('sections.sponsors')

@endsection