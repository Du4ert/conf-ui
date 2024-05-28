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

    <form id="main-form" method="POST" action="{{ route('register') }}">
        @csrf

        @include('user.parts.inputs.field', ['field_name' => 'last_name', 'required' => true])
        @include('user.parts.inputs.field', ['field_name' => 'first_name', 'required' => true])
        @include('user.parts.inputs.field', ['field_name' => 'middle_name'])
        @include('user.parts.inputs.field', ['field_name' => 'organization_title'])
        {{-- @include('user.parts.inputs.field', ['field_name' => 'rank_title']) --}}
        {{-- @include('user.parts.inputs.field', ['field_name' => 'job_title']) --}}
        @include('user.parts.email')
        @include('user.parts.password')


        {{-- Policy --}}
            <div class="row mb-3">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="policy" name="policy"
                            onchange="toggleSubmit();">
                        <label class="form-check-label text-secondary" for="policy">
                            Я согласен с политикой обработки персональных данных <a href="#policy.pdf"
                                target="_blank">(политика
                                в отношении работы с
                                персональными данными участников конференции)</a>.
                        </label>
                    </div>
                </div>
            </div>

        </div>


        {{-- Submit --}}
        <div class="row mb-3 float-end">
            <div class="col-md-6 offset-md-4">
                <button form="main-form" disabled id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end">
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
