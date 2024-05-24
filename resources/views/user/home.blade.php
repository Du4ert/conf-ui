@php
    if (!isset($editable)) {
        $editable = false;
    }
    if (!isset($admin)) {
        $admin = false;
    }
@endphp

@extends('layouts.auth')
@section('header')
    <strong class="float-left align-middle">{{ __('auth.dashboard') }}</strong>

    @if ($admin)
        <a class="btn btn-success" href="{{ route('user.list') }}"><i class="fa fa-home"></i></a>
    @endif

    @if (!$editable)
        <a href="{{ $admin ? route('user.edit', $user->id) : route('user.editSelf') }}" class="btn btn-warning float-end"
            role="button"><i class="fa fa-edit"></i> Edit</a>
    @else
        <a href="{{ $admin ? route('user.get', $user->id) : route('home') }}" class="btn btn-warning float-end"
            role="button"><i class="fa fa-arrow-left "></i></a>
    @endif
@endsection

@section('body')
    {{-- Show success --}}
    @include('user.parts.success')

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
    @if ($editable)
        <form id="main-form" action="{{ $admin ? route('user.update', $user->id) : route('user.updateSelf') }}"
            method="post">
            @csrf
            @method('PUT')
    @endif

    <div class="row mb-3 text-center">
        <h4>{{ $user->email }}</h4>
    </div>

    <ul class="nav  nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">{{ __('auth.home') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="file-tab" data-bs-toggle="tab" data-bs-target="#files" type="button"
                role="tab" aria-controls="files" aria-selected="false">{{ __('auth.files') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="coauthors-tab" data-bs-toggle="tab" data-bs-target="#coauthors" type="button"
                role="tab" aria-controls="coauthors" aria-selected="false">{{ __('auth.coauthors') }}</button>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mt-3" id="home" role="tabpanel" aria-labelledby="home-tab">
            @include('user.parts.field_home', ['field_name' => 'last_name', 'required' => true])
            @include('user.parts.field_home', ['field_name' => 'first_name', 'required' => true])
            @include('user.parts.field_home', ['field_name' => 'middle_name'])
            @include('user.parts.field_home', ['field_name' => 'organization_title'])
            @include('user.parts.field_home', ['field_name' => 'rank_title'])
            @include('user.parts.field_home', ['field_name' => 'job_title'])
            @include('user.parts.field_home', ['field_name' => 'phone'])

            @include('user.parts.field_home', ['field_name' => 'thesis_title_ru'])
            @include('user.parts.field_home', ['field_name' => 'thesis_title_en'])

            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end" for="section">Научное направление (секция)</label>
                <div class="col-md-6">
                    <select form="main-form" class="form-select" name="section" aria-label="Default select example"
                        {{ $editable ? '' : 'disabled' }}>
                        <option value="1">Геномика, транскриптомика и биоинформатика растений</option>
                        <option value="2">Биотехнология и биоинженерия растений</option>
                        <option value="3">Селекция сельскохозяйственных растений</option>
                        <option value="4">Работа с биоресурсными коллекциями растений, методы сохранения генофонда
                        </option>
                    </select>
                    <script>
                        const sectionSelect = document.querySelector('select[name="section"]');
                        sectionSelect.value = {{ $user->section }}
                    </script>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-4 col-form-label text-md-end" for="report_form">Форма доклада</label>
                <div class="col-md-6">
                    <select form="main-form" class="form-select" name="report_form" aria-label="Default select example"
                        {{ $editable ? '' : 'disabled' }}>
                        <option value="1">Устный доклад на секции</option>
                        <option value="2">Стендовое сообщение</option>
                        <option value="3">Заочное участие</option>
                    </select>
                </div>
            </div>
            <script>
                let reportSelect = document.querySelector('select[name="report_form"]');
                reportSelect.value = {{ $user->report_form }}
            </script>
    </div>
    </form>

        <div class="tab-pane fade show mt-3" id="files" role="tabpanel" aria-labelledby="files-tab">
            
            {{-- Операции со связанными файлами --}}
            @foreach ($fileByTypes as $type => $file)
                @include('user.parts.file', ['file' => $file ?? null, 'type' => $type])
            @endforeach
        </div>

        <div class="tab-pane fade show  mt-3" id="coauthors" role="tabpanel" aria-labelledby="coauthors-tab">

            {{-- Операции со связанными соавторами --}}
            @foreach ($coauthors as $author)
                @include('user.parts.coauthor', ['author' => $author])
            @endforeach
            @include('user.parts.coauthor_add')
        </div>


    @if ($editable)
                <button id="submit" type="submit" class="btn btn-primary offset-md-6  mb-3 mt-3 float-end" form="main-form">
                    <i class="fa fa-save"></i>
                    {{ __('auth.save') }}
                </button>
    @endif
    </div>


@endsection
