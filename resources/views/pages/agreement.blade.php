@extends('layouts.page')

@section('content')
    <div class="page-content-main-part policy mb-5">
        <h3 class="text-center mb-3 mt-2">
            {{ __('main.agreement_title')}}
            </h4>
            <div class="section-intro  mb-4">
                <p>{{ __('main.payment_includes')}}</p>
                <p>{{ __('main.payment_info')}}</p>
            </div>


            <ul class="list-group mx-auto mt-4 mb-5">
                <li class="list-group-item p-3  conf-bg-primary text-white">
                    <div class="row">
                        <div class="col-4">{{ __('main.pay_category') }}</div>
                        <div class="col-4 text-center">{{ __('main.pay_early') }}</div>
                        <div class="col-4 text-center">{{ __('main.pay_late') }}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">{{ __('main.full-time') }}</div>
                        <div class="col-4 text-center">6000 <a href="{{ asset('documents/2024_individual_6000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                                    <a
                                href="{{ asset('documents/2024_legal_entity_6000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.legal') }}</a></div>
                        <div class="col-4 text-center">7000 <a href="{{ asset('documents/2024_individual_7000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                                    <a
                                href="{{ asset('documents/2024_legal_entity_7000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.legal') }}</a></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">{{ __('main.full-time_young') }}</div>
                        <div class="col-4 text-center">4000 <a
                            href="{{ asset('documents/2024_young_individual_4000.docx') }}"
                            class="btn btn-link text-primary text-decoration-none" download><i
                                class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                                <a
                                href="{{ asset('documents/2024_young_legal_entity_4000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.legal') }}</a>
                            </div>
                        <div class="col-4 text-center">5000 
                            <a
                            href="{{ asset('documents/2024_young_individual_5000.docx') }}"
                            class="btn btn-link text-primary text-decoration-none" download><i
                                class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                                <a
                                href="{{ asset('documents/2024_young_legal_entity_5000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.legal') }}</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">{{ __('main.remote') }}</div>
                        <div class="col-4 text-center">2000 
                            <a
                            href="{{ asset('documents/2024_remote_individual_2000.docx') }}"
                            class="btn btn-link text-primary text-decoration-none" download><i
                                class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                                <a
                                href="{{ asset('documents/2024_remote_legal_entity_2000.docx') }}"
                                class="btn btn-link text-primary text-decoration-none" download><i
                                    class="far fa-file-word me-2"></i>{{ __('main.legal') }}</a>
                        </div>
                        <div class="col-4 text-center"></div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">{{ __('main.accompanying') }} </div>
                        <div class="col-4 text-center">4000 
                            <a
                            href="{{ asset('documents/2024_accompanying_individual_4000.docx') }}"
                            class="btn btn-link text-primary text-decoration-none" download><i
                                class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a>
                        </div>
                        <div class="col-4 text-center">5000 
                            <a
                            href="{{ asset('documents/2024_accompanying_individual_5000.docx') }}"
                            class="btn btn-link text-primary text-decoration-none" download><i
                                class="far fa-file-word me-2"></i>{{ __('main.individual') }}</a></div>
                    </div>
                </li>
            </ul>

            @if (config('app.locale') === 'ru')
            @include('pages.parts.ru.instruction')
            @else
            @include('pages.parts.en.instruction')
            @endif


    </div>
@endsection
