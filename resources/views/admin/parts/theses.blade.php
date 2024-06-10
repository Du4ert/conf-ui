<div class="row align-items-center border-top">
<div class="col-md-4 preview d-flex justify-content-start me-md-auto">
    <a href="{{ route('thesis.download', $thesis->id) }}" target="_blank" type="button"
        class="btn btn-outline-light text-secondary mb-2 mb-lg-0 me-2"><span class="d-md-none d-lg-inline">{{ __('auth.text') }}</span><i
            class="fa fa-file-pdf ms-2 ms-md-0 ms-lg-2"></i></a>

    <a href="{{ route('thesis.downloadEn', $thesis->id) }}" target="_blank" type="button"
        class="btn btn-outline-light text-secondary mb-2 m-lg-0"><span class="d-md-none d-lg-inline">{{ __('auth.text_en') }}</span><i
            class="fa fa-file-pdf ms-2 ms-md-0 ms-lg-2"></i></a>
</div>

<div class="col-md-8 d-flex justify-content-start align-items-center">
@if ($thesis->accepted_status == true and $thesis->submitted_status == true)
    <div class="alert bg-success bg-opacity-25 my-0 me-4">
        <i class="fas fa-circle-check fa-lg me-2"></i>Тезисы приняты!
    </div>
    @if (auth()->user()->isAdmin())
    <a form="accept-thesises" type="button" href="{{ route('thesis.decline', $thesis->id) }}"
        class="btn btn-danger btn-sm me-2"><i class="fa fa-cancel me-1"></i>Отменить</a>
    @endif
@endif

@if($thesis->submitted_status == true and $thesis->accepted_status != true)
<div class="alert bg-primary bg-opacity-25 my-0 me-4 p-2">
    <i class="fas fa-circle-check fa-lg me-2"></i>Тезисы на проверке!
</div>

@if (auth()->user()->isAdmin()) 
    <a form="accept-thesises" type="button" href="{{ route('thesis.accept', $thesis->id) }}"
        class="btn btn-success btn-sm me-2"><i class="fa fa-check me-1"></i>{{ __('auth.admin_accept')}}</a>
@else
<a form="accept-thesises" type="button" href="{{ route('thesis.decline', $thesis->id) }}"
    class="btn btn-danger btn-sm me-2"><i class="fa fa-cancel me-1"></i>Отменить</a>
@endif
@endif
</div>
</div>