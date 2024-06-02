@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ __('auth.theses') }}</h4>


@if ($theses != null)
@php
$num = 0;
@endphp
@foreach ($theses as $thesis)
    @include('user.thesis.show', ['num' => ++$num])
@endforeach

@if(count($theses) < 1)
<div class="alert alert-danger d-flex align-items-center" role="alert">
    <i class="fas fa-exclamation-circle fa-lg me-2"></i>
    <div>
        {{ __('auth.report_alert') }}
    </div>
  </div>

@endif
@endif

@if (count($theses) < 2)
<a href="{{ route('thesis.create') }}" class="btn btn-primary" role="button">{{ __('auth.report_add' )}}<i
    class="fa fa-plus ms-2"></i></a>
@endif


@endsection