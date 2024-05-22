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

    <form method="POST" action="{{ route('register') }}">
        @csrf

        @include('auth.layout.field', ['field_name' => 'first_name', 'required' => true])
        @include('auth.layout.field', ['field_name' => 'last_name', 'required' => true])
        @include('auth.layout.field', ['field_name' => 'middle_name'])
        @include('auth.layout.field', ['field_name' => 'organization_title'])
        @include('auth.layout.field', ['field_name' => 'rank_title'])
        @include('auth.layout.field', ['field_name' => 'job_title'])
        @include('auth.layout.email')
        @include('auth.layout.password')


        {{-- Policy --}}
            <div class="row mb-3">
                <div class="col-md10">
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
        <div class="row mb-0">
            <div class="col-md-6 offset-md-6">
                <button disabled id="submit" type="submit" class="btn btn-primary">
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
