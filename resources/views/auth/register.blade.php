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
        @include('auth.layout.field', ['field_name' => 'thesis_coauthors'])


        <div class="row mb-3">
            <label class="col-md-4 col-form-label text-md-end" for="thesis">{{ __('auth.thesis_body') }}<span
                    class="text-danger">*</span></label>
            <div class="col-md-6">
                <textarea name="thesis_body" id="thesis_body" cols="30" rows="10"></textarea>
            </div>
        </div>


        <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">Я регистрируюсь с<span
                    class="text-danger">*</span></label><br>
            <div class="col-md-6">
                <div class="form-check form-check-inline">
                    <label class="form-label">
                        <input class="form-check-input" type="radio" name="type" value="presenter"
                            onClick="hideInputDiv();" {{ old('type') == 'presenter' ? 'checked' : '' }}>
                        {{ __('auth.live') }}
                    </label>
                </div>

                <div class="form-check form-check-inline">
                    <label class="form-label">
                        <input id="poster_radio" class="form-check-input" type="radio" name="type" value="poster"
                            onChange="showInputDiv();" {{ old('type') == 'poster' ? 'checked' : '' }}>
                        {{ __('auth.poster') }}
                    </label>
                </div>
            </div>

            <div id="poster_input" class="row mb-3" style="display: none;">
                {{-- <input type="file" name="poster_image"> --}}
            </div>


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

        <div class="row mb-0">
            <div class="col-md-6 offset-md-6">
                <button disabled id="submit" type="submit" class="btn btn-primary">
                    {{ __('auth.register') }}
                </button>
            </div>
        </div>
    </form>


    <script>
        const checkbox = document.getElementById("poster_radio");
        const posterInput = document.getElementById("poster_input");
        const policy = document.getElementById("policy");
        const submit = document.getElementById("submit");


        //function that will show hidden inputs when clicked
        function showInputDiv() {
            if (checkbox.checked = true) {
                posterInput.style.display = "block";
            }
        }

        function toggleSubmit() {
            if (policy.checked) {
                submit.disabled = false;
            } else {
                submit.disabled = true;
            }
        }

        //function that will hide the inputs when another checkbox is clicked
        function hideInputDiv() {
            posterInput.style.display = "none";
        }
    </script>
@endsection
