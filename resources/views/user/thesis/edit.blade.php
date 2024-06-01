@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ __('auth.thesis_create') }}</h4>

    <form id="thesis-form" action="{{ route('thesis.submit', $thesis->id) }}" method="POST">
        @csrf
        @include('user.thesis.main')
    </form>

    @include('user.coauthor.list', ['authors' => $authors])

    <div class="row mb-3 float-end">
        <div class="col-md-6 offset-md-4">
            <button id="save-button" type="button" data-action="{{ route('thesis.update', $thesis->id) }}"
                class="btn btn-primary offset-md-6  mb-3 mt-3 float-end">
                {{ __('auth.save') }}<i class="fa fa-save ms-2"></i>
            </button>
        </div>
    </div>

    {{-- Submit --}}
    <div class="row mb-3 float-end">
        <div class="col-md-6 offset-md-4">
            <button form="thesis-form" id="submit-button" type="button"
                data-action="{{ route('thesis.submit', $thesis->id) }}"
                class="btn btn-success offset-md-6  mb-3 mt-3 float-end">
                {{ __('auth.thesis_save') }}<i class="fa fa-save ms-2"></i>
            </button>
        </div>
    </div>

    <script type="module">
        const form = $('#thesis-form');
        const saveButton = $('#save-button');
        const submitButton = $('#submit-button');

        submitButton.on('click', function(e) {
            form.attr('action', submitButton.data('action'));
            form.submit();
        });


        saveButton.on('click', function(e) {
            e.preventDefault();
            form.attr('action', saveButton.data('action'));
            form.submit();
        });
    </script>
@endsection
