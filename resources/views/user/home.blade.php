@php
    if (!isset($editable)) {
        $editable = false;
    }
    if (auth()->user()->isAdmin()) {
    $admin = true;
 } else {
    $admin = false;
 }
@endphp

@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'home'])
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ $user->email }}</h4>

    {{-- Основные данные --}}
    @if ($editable)
        <form id="user-form" action="{{ route('updateSelf') }}" method="post">
            @csrf
            @method('PUT')
    @endif
    @include('user.parts.form')
    </form>
@endsection

@section('footer')
    <div class="home-controls d-flex justify-content-end align-items-center">


@if (Route::currentRouteName() == 'home')


        @if (!$editable )
            <a href="{{route('editSelf')}}" class="btn btn-primary"
                role="button"><span class="d-none d-sm-inline">{{ __('auth.edit') }}</span><i class="fa fa-edit ms-sm-2"></i></a>
        @else
            <a href="{{route('home')}}" class="btn btn-secondary me-2"
                role="button"><span class="d-none d-sm-inline">{{ __('auth.cancel') }}</span><i class="fa fa-cancel ms-sm-2"></i></a>
        @endif


        @if ($editable)
            <button id="submit" type="submit" class="btn btn-primary d-block" form="user-form"><span class="d-none d-sm-inline">{{ __('auth.save') }}</span><i class="fa fa-save ms-sm-2"></i>
            </button>
        @endif
    </div>
@endif
@endsection
