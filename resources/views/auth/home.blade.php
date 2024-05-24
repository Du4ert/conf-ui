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
    {{ __('auth.dashboard') }}
    @if ($admin)
        <a class="btn btn-success" href="{{ route('user.list') }}"><i class="fa fa-home"></i></a>
    @endif
    @if (!$editable)
        <a href="{{ $admin ? route('user.edit', $user->id) : route('user.editSelf') }}" class="btn btn-warning"
            role="button"><i class="fa fa-edit"></i> Edit</a>
    @else
    <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning"
        role="button"><i class="fa fa-arrow-left"></i></a>
    @endif
@endsection

@section('body')
    {{-- Show success --}}
    @include('auth.layout.success')

    
    {{ __('auth.logged_in') }}
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

    @include('auth.layout.field_home', ['field_name' => 'first_name', 'required' => true])
    @include('auth.layout.field_home', ['field_name' => 'last_name', 'required' => true])
    @include('auth.layout.field_home', ['field_name' => 'middle_name'])
    @include('auth.layout.field_home', ['field_name' => 'organization_title'])
    @include('auth.layout.field_home', ['field_name' => 'rank_title'])
    @include('auth.layout.field_home', ['field_name' => 'job_title'])
    {{-- @include('auth.layout.password') --}}


    @if ($editable)
        <div class="row mb-0">
            <div class="col-md-6 offset-md-6">
                <button id="submit" type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    {{ __('auth.submit') }}
                </button>
            </div>
        </div>
    @endif

    </form>

{{-- Операции со связанными файлами --}}
    @foreach ($fileByTypes as $type => $file)
            @include('auth.layout.file', ['file' => $file ?? null, 'type' => $type])
    @endforeach

@endsection
