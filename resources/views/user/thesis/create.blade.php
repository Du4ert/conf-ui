@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('auth.thesis_create') }}</h4>

    <form id="thesis-form" action="{{ route('thesis.store') }}" method="POST">
        @csrf
        @include('user.thesis.main')
    </form>

@include('user.coauthor.list')
    
                {{-- Submit --}}
                <div class="row mb-3 float-end">
                    <div class="col-md-6 offset-md-4">
                        <button form="thesis-form" id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end">
                            {{ __('auth.thesis_save') }}<i
                            class="fa fa-save ms-2"></i>
                        </button>
                    </div>
                </div>
@endsection
