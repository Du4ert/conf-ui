@php
    if (!isset($formDelete)) {
        $formDelete = 'delete-thesis-' . $thesis->id;
    }

@endphp
<div class="card mb-3">
    <div class="card-header d-flex align-items-center">
        <h5 class="card-title">{{ __('auth.thesis') . '-' . $num }}</h5>

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <dl class="row">
                    <dt class="col-4  mb-2">{{ __('auth.thesis_title') }}</dt>
                    <dd class="col-8">
                        {{ $thesis->thesis_title }}
                    </dd>

                    <dt class="col-4  mb-2">{{ __('auth.thesis_title_en') }}</dt>
                    <dd class="col-8">
                        {{ $thesis->thesis_title_en }}
                    </dd>

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

    <div class="card-footer">
        <form id="{{ $formDelete }}" class="" action="{{ route('thesis.delete', $thesis->id) }}" method="post">
            <div class="d-flex align-items-center justify-content-end">
            @csrf
            @method('DELETE')
        
            <button form="{{ $formDelete }}" data-id="{{ $thesis->id ?? '' }}" type="submit" class="btn btn-danger me-2"><i class="fa fa-trash"></i></button>
        
            <a href="{{ route('thesis.edit', $thesis->id) }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>
        </div>
        </form>
      </div>

</div>