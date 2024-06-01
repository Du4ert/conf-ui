@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'reports'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('thesis.create') }}</h4>

    <form id="thesis-form" action="{{ route('thesis.store') }}" method="POST">
        @csrf

        <div class="row mb-2 d-none d-md-flex">
        @include('user.inputs.section', ['form' => 'thesis-form'])
        @include('user.inputs.report_form', ['form' => 'thesis-form'])
        </div>


                <div class="row mb-2 d-none d-md-flex">
                    <h5 class="col-lg-6 text-center">
                        {{ __('auth.russian') }}
                    </h5>
                    <h5 class="col-lg-6 text-center">
                        {{ __('auth.english') }}
                    </h5>
                </div>

                <div class="row form-group mb-2">
                    <div class="col-lg-6">
                        @include('user.inputs.field', ['field_name' => 'thesis_title', 'required' => true, 'form' => 'thesis-form'])
                    </div>
                    <div class="col-lg-6">
                        @include('user.inputs.field', ['field_name' => 'thesis_title_en', 'required' => true, 'form' => 'thesis-form'])
                    </div>
                </div>



                <div class="row form-group mb-2">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="thesis-form" class="form-label">{{ __('auth.thesis_text') }}</label>
                            <textarea class="form-control" name="text" rows="3"></textarea>
                          </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="thesis-form" class="form-label">{{ __('auth.thesis_text_en') }}</label>
                            <textarea class="form-control" name="text_en" rows="3"></textarea>
                          </div>
                    </div>
                 </div>
        </div>

                {{-- Submit --}}
                <div class="row mb-3 float-end">
                    <div class="col-md-6 offset-md-4">
                        <button form="thesis-form" id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end">
                            {{ __('auth.thesis_save') }}
                        </button>
                    </div>
                </div>
    </form>
@endsection
