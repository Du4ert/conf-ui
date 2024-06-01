@php
    if (!isset($editable)) {
        $editable = false;
    }
    if (!isset($admin)) {
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
        <form id="user-form" action="{{ $admin ? route('user.update', $user->id) : route('updateSelf') }}" method="post">
            @csrf
            @method('PUT')
    @endif
    @include('user.parts.main')
    </form>


    <div class="d-flex align-items-center mx-4 mb-3 justify-content-between">
        @if (!$editable)
            <a href="{{ $admin ? route('user.edit', $user->id) : route('editSelf') }}" class="btn btn-warning"
                role="button"><i class="fa fa-edit"></i> {{ __('auth.edit') }}</a>
        @else
            <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning" role="button"><i
                    class="fa fa-arrow-left "></i></a>
        @endif

        @if ($editable)
            <button id="submit" type="submit" class="btn btn-primary d-block" form="user-form">
                <i class="fa fa-save"></i>
                {{ __('auth.save') }}
            </button>
        @endif
    </div>

@endsection
