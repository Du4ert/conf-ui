@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')
    <h4 class="mb-3 text-center">{{ __('auth.thesis') }}</h4>

    <form id="thesis-form" action="{{ route('thesis.submit', $thesis->id) }}" method="POST">
        @csrf


        <div class="row mb-2 d-none d-md-flex">
            @include('user.inputs.section', ['form' => 'thesis-form'])
            @include('user.inputs.report_form', ['form' => 'thesis-form'])
        </div>


        @include('user.parts.languages')


        <div class="row form-group mb-4">
            <div class="col-lg-6">
                <label for="thesis-form" class="form-label ms-2">{{ __('auth.thesis_title') }}</label>
                <input form="thesis-form" required type="text" class="form-control" name="thesis_title"
                    autocomplete="thesis_title" value="{{ $thesis->thesis_title }}">
            </div>
            <div class="col-lg-6">
                <label for="thesis-form" class="form-label  ms-2">{{ __('auth.thesis_title_en') }}</label>
                <input form="thesis-form" required type="text" class="form-control" name="thesis_title_en"
                    autocomplete="thesis_title_en" value="{{ $thesis->thesis_title_en }}">
            </div>
        </div>

        <div class="row form-group mb-5">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="thesis-form" class="form-label  ms-2">{{ __('auth.thesis_text') }}</label>
                    <div class="thesis-text">
                        <div id="text-editor"></div>
                        {{-- <textarea hidden id="text" class="form-control" name="text" rows="3">{{ $thesis->text}}</textarea> --}}
                        <input type="text" id="text" name="text" hidden>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="thesis-form" class="form-label  ms-2">{{ __('auth.thesis_text_en') }}</label>
                    <div class=" thesis-text">
                        <div id="text_en-editor"></div>
                        <input type="text" id="text_en" name="text_en" hidden>
                        {{-- <textarea hidden id="text_en" class="form-control" name="text_en" rows="3">{{ $thesis->text_en}}</textarea> --}}
                    </div>
                </div>
            </div>
            <small class="text-muted">{{ __('auth.thesis_size') }}</small><br/>
            <small class="text-muted">{{ __('auth.thesis_note') }}</small>
        </div>


    </form>

    @include('user.coauthor.list', ['authors' => $authors])
@endsection

@section('footer')
    <div class="thesis-controls d-md-flex flex-wrap flex-md-nowrap justify-content-end align-items-center">


        <a href="{{ route('reports') }}" id="cancel-button" class="btn btn-secondary ms-auto me-md-2 mb-2 mb-md-0"><span
                class="d-md-none d-lg-inline">{{ __('auth.cancel') }}</span><i class="fa fa-cancel ms-2 ms-md-0 ms-lg-2"></i>
        </a>

        <button id="save-button" type="button" data-action="{{ route('thesis.update', $thesis->id) }}"
            class="btn btn-primary me-md-2 mb-2 mb-md-0"><span class="d-md-none d-lg-inline">
                {{ __('auth.save') }}</span><i class="fa fa-save ms-2 ms-md-0 ms-lg-2 "></i>
        </button>

        <button form="thesis-form" id="submit-button" type="button"
            data-action="{{ route('thesis.submit', $thesis->id) }}" class="btn btn-success mb-2 mb-md-0"><span
                class="d-md-none d-lg-inline">{{ __('auth.thesis_save') }}</span><i
                class="fas fa-external-link-alt ms-2 ms-md-0 ms-lg-2"></i>
        </button>
    </div>

    <script type="module">
        $(document).ready(function() {
            const textInput = $('#text');
            const textInputEn = $('#text_en');


            // Qull
            const toolbarOptions = [
                ['bold', 'italic', 'underline'],
                [{
                    'list': 'ordered'
                }, {
                    'list': 'bullet'
                }],
                [{
                    'script': 'sub'
                }, {
                    'script': 'super'
                }],
                ["clean"],
            ];

            const quillOptions = {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions,
                }
            }

            const quillOptionsEn = {
                theme: 'snow',
                modules: {
                    toolbar: toolbarOptions,
                    languageTool: {
                        language: "en-US",
                        },
                }
            }

            const maxLength = 3000;

            const quillText = new Quill('#text-editor', quillOptions);
            const quillTextEn = new Quill('#text_en-editor', quillOptionsEn);

            // Prefill quil
            quillText.root.innerHTML = '{!! $thesis->text !!}';
            quillTextEn.root.innerHTML = '{!! $thesis->text_en !!}';


            // Quill change event
            quillText.on('text-change', function(delta, oldContents, source) {
                const length = quillText.getLength();

                if (length > maxLength) {
                    quillText.deleteText(maxLength, length - maxLength);
                }
            });

            quillTextEn.on('text-change', function(delta, oldContents, source) {
                const length = quillTextEn.getLength();

                if (length > maxLength) {
                    quillTextEn.deleteText(maxLength, length - maxLength);
                }
            });
            // Quill ends

            const form = $('#thesis-form');
            const saveButton = $('#save-button');
            const submitButton = $('#submit-button');

            submitButton.on('click', function(e) {
                textInput.val(quillText.getSemanticHTML());
                textInputEn.val(quillTextEn.getSemanticHTML());
                form.attr('action', submitButton.data('action'));
                form.submit();
            });


            saveButton.on('click', function(e) {
                e.preventDefault();
                textInput.val(quillText.getSemanticHTML());
                textInputEn.val(quillTextEn.getSemanticHTML());
                form.attr('action', saveButton.data('action'));
                form.submit();
            });
        });
    </script>
@endsection
