@extends('layouts.auth')
@section('header')
    {{ __('auth.register') }}
@endsection

@section('body')

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

    <form id="user-form" method="POST" action="{{ route('register') }}">
        @csrf

        @include('auth.main')

        {{-- @include('user.inputs.field', ['field_name' => 'last_name', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'last_name_en', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'first_name', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'first_name_en', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'middle_name', 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'middle_name_en', 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'organization_title', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'organization_title_en', 'required' => true, 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'rank_title', 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'rank_title_en', 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'job_title', 'form' => 'user-form'])
        @include('user.inputs.field', ['field_name' => 'job_title_en', 'form' => 'user-form']) --}}

        @include('user.inputs.email', ['form' => 'user-form'])
        @include('user.inputs.password', ['form' => 'user-form'])


        {{-- Policy --}}
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input form="user-form" class="form-check-input" type="checkbox" id="policy" name="policy"
                            onchange="toggleSubmit();">
                        <label class="form-check-label text-secondary" for="policy">
                            {{ __('auth.policy_agreement') }} <a href="/policy" taget="__blank"
                                target="_blank">({{ __('auth.policy') }})</a>.
                        </label>
                    </div>
                </div>
            </div>

        </div>


        {{-- Submit --}}
        <div class="row mb-3 float-end">
            <div class="col-md-6 offset-md-4">
                <button form="user-form" disabled id="submit" type="submit" class="btn btn-success offset-md-6  mb-3 mt-3 float-end">
                    {{ __('auth.register') }}
                </button>
            </div>
        </div>
    </form>


    <script>
        const policy = document.getElementById("policy");
        const submit = document.getElementById("submit");


        function toggleSubmit() {
            if (policy.checked) {
                submit.disabled = false;
            } else {
                submit.disabled = true;
            }
        }
    </script>
@endsection
