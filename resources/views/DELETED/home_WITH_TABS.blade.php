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
    <strong class="float-left align-middle">{{ __('auth.dashboard') }}</strong>

    @if ($admin)
        <a class="btn btn-success" href="{{ route('user.list') }}"><i class="fa fa-home"></i></a>
    @endif

    @if (!$editable)
        <a href="{{ $admin ? route('user.edit', $user->id) : route('user.editSelf') }}" class="btn btn-warning float-end"
            role="button"><i class="fa fa-edit"></i> Edit</a>
    @else
        <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning" role="button"><i
                class="fa fa-arrow-left"></i></a>
    @endif
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
        <form action="{{ $admin ? route('user.update', $user->id) : route('user.updateSelf') }}" method="post">
            @csrf
            @method('PUT')
    @endif

    <div class="row mb-3 text-center">
        <h4>{{ $user->email }}</h4>
    </div>

    <ul class="nav  nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">{{ __('auth.home') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                role="tab" aria-controls="files" aria-selected="false">{{ __('auth.files') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#coauthors" type="button"
                role="tab" aria-controls="coauthors" aria-selected="false">{{ __('auth.coauthors') }}</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            @include('user.parts.inputs.field_home', ['field_name' => 'first_name', 'required' => true])
            @include('user.parts.inputs.field_home', ['field_name' => 'last_name', 'required' => true])
            @include('user.parts.inputs.field_home', ['field_name' => 'middle_name'])
            @include('user.parts.inputs.field_home', ['field_name' => 'organization_title'])
            @include('user.parts.inputs.field_home', ['field_name' => 'rank_title'])
            @include('user.parts.inputs.field_home', ['field_name' => 'job_title'])
            @include('user.parts.inputs.field_home', ['field_name' => 'phone'])

            @include('user.parts.inputs.field_home', ['field_name' => 'thesis_title_ru'])
            @include('user.parts.inputs.field_home', ['field_name' => 'thesis_title_en'])
        </div>
        <div class="tab-pane fade mt-3" id="files" role="tabpanel" aria-labelledby="files-tab">
            {{-- Операции со связанными файлами --}}
            @foreach ($fileByTypes as $type => $file)
                @include('user.parts.file', ['file' => $file ?? null, 'type' => $type])
            @endforeach
        </div>
        <div class="tab-pane fade mt-3" id="coauthors" role="tabpanel" aria-labelledby="coauthors-tab">
            {{-- Операции со связанными соавторами --}}
            Соавторы
        </div>
    </div>



    {{-- @include('user.parts.password') --}}

    {{-- <hr /> --}}
    @if ($editable)
        <div class="row mb-0">
            <div class="col-md-6 offset-md-6">
                <button id="submit" type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    {{ __('auth.save') }}
                </button>
            </div>
        </div>
    @endif

    </form>

@endsection
