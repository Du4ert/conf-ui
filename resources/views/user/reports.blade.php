@php
    if (!isset($editable)) {
        $editable = true;
    }
    if (!isset($admin)) {
        $admin = false;
    }
@endphp

@extends('layouts.auth')
@section('header')
    @include('user.parts.home-navigation')
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ __('auth.reports') }}</h4>
    
    @include('user.parts.success')
    @include('user.parts.error')
    

@php
$thesis_ru = $thesisByTypes['thesis_ru'];
$thesis_en = $thesisByTypes['thesis_en'];
@endphp
    @isset ($thesisByTypes)
           @foreach ($thesisByTypes as $type => $thesis)
             @include('user.thesis.show', ['thesis' => $thesis ?? null, 'type' => $type])
             @if ($type === 'thesis_en' and $thesis == null)
                 @break
             @endif
        @endforeach
    @endif


@endsection