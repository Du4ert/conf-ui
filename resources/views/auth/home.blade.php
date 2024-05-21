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
            role="button">Edit</a>
    @else
    <a href="{{ $admin ? route('user.get', $user->id) : route('user.home') }}" class="btn btn-warning"
        role="button"><i class="fa fa-arrow-left"></i></a>
    @endif
@endsection

@section('body')
    {{-- Show status --}}
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
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

    {{-- @include('auth.layout.password') --}}
    @include('auth.layout.field_home', ['field_name' => 'first_name', 'required' => true])
    @include('auth.layout.field_home', ['field_name' => 'last_name', 'required' => true])
    @include('auth.layout.field_home', ['field_name' => 'middle_name'])
    @include('auth.layout.field_home', ['field_name' => 'organization_title'])
    @include('auth.layout.field_home', ['field_name' => 'rank_title'])
    @include('auth.layout.field_home', ['field_name' => 'job_title'])
    @include('auth.layout.field_home', ['field_name' => 'thesis_coauthors'])


    <div class="row mb-3">
        <label class="col-md-4 col-form-label text-md-end" for="thesis">{{ __('auth.thesis_body') }}<span
                class="text-danger">*</span></label>
        <div class="col-md-6">
            <textarea name="thesis_body" id="thesis_body" cols="30" rows="10" {{ $editable ? '' : 'disabled' }}>{{ $user->thesis_body }}</textarea>
        </div>
    </div>

    @if ($editable)
        <div class="row mb-0">
            <div class="col-md-6 offset-md-6">
                <button id="submit" type="submit" class="btn btn-primary">
                    {{ __('auth.submit') }}
                </button>
            </div>
        </div>
    @endif

    </form>


    <script>
        // const checkbox = document.getElementById("poster_radio");
        // const posterInput = document.getElementById("poster_input");


        // //function that will show hidden inputs when clicked
        // function showInputDiv() {
        //     if (checkbox.checked = true) {
        //         posterInput.style.display = "block";
        //     }
        // }

        // //function that will hide the inputs when another checkbox is clicked
        // function hideInputDiv() {
        //     posterInput.style.display = "none";
        // }
    </script>
@endsection
