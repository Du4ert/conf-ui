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
    @include('user.parts.navigation')
@endsection

@section('body')
    {{-- Show success --}}
    @include('user.parts.success')

    {{-- Show validtion errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($editable)
        <form id="user-form" action="{{ $admin ? route('user.update', $user->id) : route('updateSelf') }}"
            method="post">
            @csrf
            @method('PUT')
    @endif

    <div class="row mb-3 text-center">
        <h4>{{ $user->email }}</h4>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">{{ __('auth.home') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="thesis-tab" data-bs-toggle="tab" data-bs-target="#thesis" type="button"     role="tab" aria-controls="thesis" aria-selected="false">{{ __('auth.theses') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                role="tab" aria-controls="files" aria-selected="false">{{ __('auth.files') }}</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            {{-- Основные данные --}}
            @include('user.main')
    </form>

    <div class="tab-pane fade show  mt-3" id="files" role="tabpanel" aria-labelledby="files">
            {{-- Операции со связанными файлами --}}
            @foreach ($fileByTypes as $type => $file)
                 @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
            @endforeach
    </div>

    <div class="d-flex align-items-center justify-content-between">
    @if (!$editable)
        <a href="{{ $admin ? route('user.edit', $user->id) : route('editSelf') }}" class="btn btn-warning"
            role="button"><i class="fa fa-edit"></i> {{ __('auth.edit') }}</a>
    @else
        <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning"
            role="button"><i class="fa fa-arrow-left "></i></a>
    @endif

    @if ($editable)
            <button id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3" form="user-form">
                <i class="fa fa-save"></i>
                {{ __('auth.save') }}
            </button>
    @endif
</div>
</div>

@endsection