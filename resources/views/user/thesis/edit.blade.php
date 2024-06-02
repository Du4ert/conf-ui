@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ __('auth.thesis') }}</h4>

    <form id="thesis-form" action="{{ route('thesis.submit', $thesis->id) }}" method="POST">
        @csrf
        @include('user.thesis.main')
    </form>

    @include('user.coauthor.list', ['authors' => $authors])
@endsection

@section('footer')
    <div class="thesis-controls d-flex justify-content-end align-items-center">
        <a href="{{ route('reports') }}" id="cancel-button" class="btn btn-secondary me-2"><span
                class="d-none d-sm-inline">{{ __('auth.cancel') }}</span><i class="fa fa-cancel ms-sm-2"></i>
        </a>
        

        <button id="save-button" type="button" data-action="{{ route('thesis.update', $thesis->id) }}"
            class="btn btn-primary me-2"><span class="d-none d-sm-inline">
                {{ __('auth.save') }}</span><i class="fa fa-save ms-sm-2"></i>
        </button>

        <button form="thesis-form" id="submit-button" type="button" data-action="{{ route('thesis.submit', $thesis->id) }}"
            class="btn btn-success"><span class="d-none d-sm-inline">{{ __('auth.thesis_save') }}</span><i
                class="fas fa-external-link-alt ms-sm-2"></i>
        </button>
    </div>

    <script type="module">
const text = $('#text');
const textEn = $('#text_en');
new nicEditor({buttonList : ['bold','italic']});


$(document).ready(function() {
    // nicEditors.findEditor('text').setOptions();
// nicEditors.findEditor('text_en').setOptions();
});


        const form = $('#thesis-form');
        const saveButton = $('#save-button');
        const submitButton = $('#submit-button');

        submitButton.on('click', function(e) {
            
            // nicEditors.findEditor('<you_textarea_id>').saveContent();
            form.attr('action', submitButton.data('action'));
            form.submit();
        });


        saveButton.on('click', function(e) {
            e.preventDefault();
            nicEditors.findEditor('text').saveContent();
            nicEditors.findEditor('text_en').saveContent();
            form.attr('action', saveButton.data('action'));
            form.submit();
        });
    </script>
@endsection
