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
                <div class="col-md-6">
                    <!-- Add content here -->
                </div>
            </div>

        </div>
    </div>
    <div class="card-footer d-flex">
        <div class="preview me-auto">
            <a href="{{ route('thesis.download', $thesis->id) }}" target="_blank" type="button"
                class="btn btn-primary"><span class="d-none d-sm-inline">Текст</span><i
                    class="fa fa-file-pdf ms-sm-2"></i></a>

            <a href="{{ route('thesis.download', $thesis->id) }}" target="_blank" type="button"
                class="btn btn-primary"><span class="d-none d-sm-inline">Текст EN</span><i
                    class="fa fa-file-pdf ms-sm-2"></i></a>
        </div>

        @if ($thesis->accepted_status != true)
            <form id="{{ $formDelete }}" class="" action="{{ route('thesis.delete', $thesis->id) }}"
                method="post">
                <div class="d-flex align-items-center justify-content-end">
                    @csrf
                    @method('DELETE')

                    <button form="{{ $formDelete }}" data-id="{{ $thesis->id ?? '' }}" type="submit"
                        class="btn btn-danger me-2"><i class="fa fa-trash"></i></button>

                    <a href="{{ route('thesis.edit', $thesis->id) }}" type="button" class="btn btn-primary"><i
                            class="fa fa-edit"></i></a>
                </div>
            </form>
        @endif
    </div>

</div>
