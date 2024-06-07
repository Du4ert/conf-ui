@php
    if (!isset($formDelete)) {
        $formDelete = 'delete-thesis-' . $thesis->id;
    }

@endphp
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title">{{ __('auth.thesis') . '-' . $num }}</h5>

        @if ($thesis->accepted_status == true)
            <div class="alert bg-success bg-opacity-25 ms-auto my-0">
                <i class="fas fa-circle-check fa-lg me-2"></i>Тезисы приняты!
            </div>
        @elseif($thesis->submitted_status == true)
            <div class="alert bg-primary bg-opacity-25 ms-auto my-0  p-2">
                <i class="fas fa-circle-check fa-lg me-2"></i>Тезисы на проверке!
            </div>
        @endif

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <dl class="row">

                    <dt class="col-4  mb-2">{{ __('auth.report_form') }}</dt>
                    <dd class="col-8">
                        {{ __('auth.' . $thesis->report_form) }}
                    </dd>

                    <dt class="col-4  mb-2">{{ __('auth.section') }}</dt>
                    <dd class="col-8">
                        {{ __('auth.' . $thesis->section) }}
                    </dd>


                    <dt class="col-4 mb-2">{{ __('auth.thesis_title') }}</dt>
                    <dd class="col-8">{{ $thesis->thesis_title }}</dd>

                    <dt class="col-4  mb-2">{{ __('auth.thesis_title_en') }}</dt>
                    <dd class="col-8">{{ $thesis->thesis_title_en }}</dd>
                </dl>

                <div class="col-lg-6">
                    @if ($thesis->report_form == 'poster')
                        <div>
                            @include('user.file.poster', ['type' => 'poster', 'file' => $thesis->file])
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer d-md-flex">


        <div class="preview d-flex justify-content-between me-md-auto">
            <a href="{{ route('thesis.download', $thesis->id) }}" target="_blank" type="button"
                class="btn btn-outline-light text-secondary mb-2 mb-lg-0 me-2"><span
                    class="d-md-none d-lg-inline">{{ __('auth.text') }}</span><i
                    class="fa fa-file-pdf ms-2 ms-md-0 ms-lg-2"></i></a>

            <a href="{{ route('thesis.downloadEn', $thesis->id) }}" target="_blank" type="button"
                class="btn btn-outline-light text-secondary mb-2 m-lg-0"><span
                    class="d-md-none d-lg-inline">{{ __('auth.text_en') }}</span><i
                    class="fa fa-file-pdf ms-2 ms-md-0 ms-lg-2"></i></a>
        </div>

@if (auth()->user()->isAdmin())

@if ($thesis->accepted_status == true and $thesis->submitted_status == true)

<a form="accept-thesises" type="button" href="{{ route('thesis.decline', $thesis->id) }}"
    class="btn btn-danger me-2"><i class="fa fa-cancel me-1"></i>Отменить</a>
@endif

@if ($thesis->accepted_status != true and $thesis->submitted_status == true)
<a form="accept-thesises" type="button" href="{{ route('thesis.accept', $thesis->id) }}"
    class="btn btn-success me-2"><i class="fa fa-check me-1"></i>{{__('auth.admin_accept')}}</a>


    
@endif
@else
        @if ($thesis->accepted_status != true)
            <form id="{{ $formDelete }}" class="" action="{{ route('thesis.delete', $thesis->id) }}"
                method="post">
                <div class="d-flex align-items-center justify-content-end">
                    @csrf
                    @method('DELETE')

                    <button form="{{ $formDelete }}" data-id="{{ $thesis->id ?? '' }}" type="submit"
                        class="btn btn-danger me-2"><i class="fa fa-trash"></i></button>

                    <a href="{{ route('thesis.edit', $thesis->id) }}" type="button" class="btn btn-primary"><i
                            class="fa fa-edit "></i></a>
                </div>
            </form>

            @if ($thesis->submitted_status != true)
                <form action="{{ route('thesis.submit', $thesis->id) }}" id="submit-form" method="POST">
                    @csrf
                    @foreach ($thesis->getFillable() as $property)
                        <input type="text" hidden name="{{ $property }}" value="{{ $thesis->$property }}">
                    @endforeach
                    <button form="submit-form" id="submit-button" type="submit" for="submit-form"
                        class="btn btn-success ms-md-2 mt-2 mt-md-0 mb-sm-0 d-block d-lg-inline"><span
                            class="d-md-none d-lg-inline">{{ __('auth.thesis_save') }}</span><i
                            class="fas fa-external-link-alt ms-2 ms-md-0 ms-lg-2"></i>
                    </button>
                </form>

            @endif
        @endif

    @endif
    </div>

</div>
