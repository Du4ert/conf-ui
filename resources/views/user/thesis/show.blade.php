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
        <form id="thesis-form" action="{{ route('thesis.store', $user->id) }}"
            method="post">
            @csrf
            @method('PUT')
    @endif'
            @include('user.inputs.field', ['field_name' => 'title', 'required' => true])
            @include('user.inputs.field', ['field_name' => 'first_name', 'required' => true])
            @include('user.inputs.field', ['field_name' => 'middle_name'])
            @include('user.inputs.field', ['field_name' => 'organization_title'])
            @include('user.inputs.field', ['field_name' => 'rank_title'])
            @include('user.inputs.field', ['field_name' => 'job_title'])
            @include('user.inputs.field', ['field_name' => 'phone'])

            @include('user.inputs.section')

            {{-- @include('user.inputs.field_home', ['field_name' => 'thesis_title_ru']) --}}
            {{-- @include('user.inputs.field_home', ['field_name' => 'thesis_title_en']) --}}

            
            {{-- @include('user.inputs.report_form') --}}
            
    </div>
    </form>

    </div>

@endsection