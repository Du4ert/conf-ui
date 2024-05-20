@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-5">

            <div class="col-4 bg-primary card text-white text-center pb-4">
                <p>НБС-ННЦ</p>
            </div>

            <div class="col-8 col-md-6 card pb-4">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-5">
                            <h2 class="h3">
                                Регистрация
                            </h2>
                            <h3 class="fs-6 fw-normal text-secondary m-0">
                                Пожалуйста, введите свои данные для регистрации
                            </h3>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <form class="" method="POST" action="{{ route('store') }}">
                    @csrf
                    <div class="row gy-2 gy-md-3 overflow-hidden">
                        
                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control " name="email" value="{{session('form_data.email') ?? ''}}"
                                autocomplete="email" placeholder="name@example.com" required="">
                            <small class="fst-italic form-text text-muted">На этот адрес придёт ссылка для
                                подтверждения
                                регистрации</small>
                        </div>

                        <div class="col-12">
                            <label for="lastName" class="form-label">Фамилия<span class="text-danger">*</span></label>
                            <input id="lastname" type="text" class="form-control " name="lastname" value="{{session('form_data.lastname') ?? ''}}"
                                required="" autocomplete="family-name">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="firstname">Имя</label><span class="text-danger">*</span>
                            <input id="firstname" type="text" class="form-control " name="firstname" value="{{session('form_data.firstname') ?? ''}}"
                                autocomplete="given-name">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="surname">Отчество</label><span class="text-danger">*</span>
                            <input id="surname" type="text" class="form-control " name="surname" value="{{session('form_data.surname') ?? ''}}"
                                autocomplete="additional-name">
                        </div>

                        <div class="col-12">
                            <label class="form-label" for="organization">Организация<span
                                    class="text-danger">*</span></label>
                            <input id="organization" type="text" class="form-control " name="organization"
                                value="{{session('form_data.organization') ?? ''}}" required="">
                            <small class="fst-italic form-text text-muted">
                                Введите полное название вашей организации, например Федеральный
                                исследовательский центр
                                «Институт биологии южных морей имени А. О. Ковалевского РАН»
                            </small>
                        </div>


                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="job">Должность</label>
                                    <input id="job" type="text" class="form-control " name="job"
                                        value="{{session('form_data.job') ?? ''}}">
                                    <small class="fst-italic form-text text-muted">Поставьте "-" если нет
                                        должности</small>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="form-label" for="rank">Степень, звание</label>
                                    <input id="rank" type="text" class="form-control " name="rank"
                                        value="{{session('form_data.rank') ?? ''}}">
                                    <small class="fst-italic form-text text-muted">Поставьте "-" если нет
                                        степени и
                                        звания</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div>
                                <label class="form-label" for="thesis">Тезисы</label><span
                                    class="text-danger">*</span>
                            </div>
                            <textarea name="thesis" id="thesis" cols="30" rows="10"></textarea>
                        </div>

                        <div class="col-12">
                            <div class="form-group form-control " role="group" aria-label="role">
                                <label for="role" class="form-label">Я регистрируюсь с<span
                                        class="text-danger">*</span></label><br>
                                <div class="form-check form-check-inline">
                                    <label class="form-label">
                                        <input class="form-check-input" type="radio" name="type"
                                            value="presenter" onClick="hideInputDiv();" checked>
                                        докладом
                                    </label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <label class="form-label">
                                        <input id="poster_radio" class="form-check-input" type="radio"
                                            name="type" value="poster" onChange="showInputDiv();">
                                        постерным докладом
                                    </label>
                                </div>
                            </div>
                            <small class="fst-italic form-text text-muted"></small>
                        </div>

                        <div id="poster_input" style="display: none;">
                            <input type="file" name="poster_image">
                        </div>

                        <div class="col-12">
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

                        <div class="col-md-6 col-12">
                            <div class="d-grid">
                                <button class="btn bsb-btn-xl btn-primary" id="submit" type="submit"
                                    disabled>Регистрация</button>
                            </div>
                        </div>

                </form>

            </div>
        </div>
    </div>


    @include('common.footer')

    <script>
        const checkbox = document.getElementById("poster_radio");
        const inputDiv = document.getElementById("poster_input");
        const policy = document.getElementById("policy");
        const submit = document.getElementById("submit");


        //function that will show hidden inputs when clicked
        function showInputDiv() {
            if (checkbox.checked = true) {
                inputDiv.style.display = "block";
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
            inputDiv.style.display = "none";
        }
    </script>
    
@endsection