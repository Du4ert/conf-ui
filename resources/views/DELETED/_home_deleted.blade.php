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
        <a href="{{ $admin ? route('user.edit', $user->id) : route('editSelf') }}" class="btn btn-warning float-end"
            role="button"><i class="fa fa-edit"></i> Edit</a>
    @else
        <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning float-end"
            role="button"><i class="fa fa-arrow-left "></i></a>
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
        <form id="main-form" action="{{ $admin ? route('user.update', $user->id) : route('updateSelf') }}"
            method="post">
            @csrf
            @method('PUT')
    @endif

    <div class="row mb-3 text-center">
        <h4>{{ $user->email }}</h4>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">{{ __('auth.home') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="thesis-tab" data-bs-toggle="tab" data-bs-target="#thesis" type="button"     role="tab" aria-controls="thesis" aria-selected="false">{{ __('auth.thesis') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                role="tab" aria-controls="files" aria-selected="false">{{ __('auth.files') }}</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show  mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            @include('user.inputs.field_home', ['field_name' => 'last_name', 'required' => true])
            @include('user.inputs.field_home', ['field_name' => 'first_name', 'required' => true])
            @include('user.inputs.field_home', ['field_name' => 'middle_name'])
            @include('user.inputs.field_home', ['field_name' => 'organization_title'])
            @include('user.inputs.field_home', ['field_name' => 'rank_title'])
            @include('user.inputs.field_home', ['field_name' => 'job_title'])
            @include('user.inputs.field_home', ['field_name' => 'phone'])

            {{-- @include('user.inputs.field_home', ['field_name' => 'thesis_title_ru']) --}}
            {{-- @include('user.inputs.field_home', ['field_name' => 'thesis_title_en']) --}}

            {{-- @include('user.inputs.section') --}}
            {{-- @include('user.inputs.report_form') --}}
            
    </div>
    </form>

    <div class="tab-pane fade show  mt-3 active" id="thesis" role="tabpanel" aria-labelledby="home-tab">
@include('user.thesis.add')
    </div>

        <div class="tab-pane fade show mt-3" id="files" role="tabpanel" aria-labelledby="files-tab">
            {{-- Операции со связанными файлами --}}
            @include('user.parts.files')
        </div>

        {{-- <div class="tab-pane fade show mt-3" id="coauthors" role="tabpanel" aria-labelledby="coauthors-tab">
            @include('user.parts.coauthors')
        </div> --}}

    @if ($editable)
            <button id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end" form="main-form">
                <i class="fa fa-save"></i>
                {{ __('auth.save') }}
            </button>
    @endif
    </div>

@endsection