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
<h4 class="mb-3 text-center">{{ __('auth.documents') }}</h4>
    @include('user.parts.success')
    @include('user.parts.error')
    


    @isset ($fileByTypes)
        @foreach ($fileByTypes as $type => $file)
        @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
    @endforeach
    @endif


@endsection