<div>Документы:</div>
<div class="files border-top row py-3">
    @if ($user->files()->exists())
    <div class="col-md-8">
        @foreach ($user->files as $file)
        @if ($file->type != 'payment' and $file->type != 'agreement')
          @continue
        @endif
        {{-- @include('user.file.show', ['file' => $file ?? null, 'type' => $file->type]) --}}
        <a href="{{ route('file.download', $file->id) }}"
          class="download-link btn btn-primary mb-2 mb-md-0" role="{{ __('file.download') }}">{{ __('file.' . $file->type) }}<i class="fa fa-download ms-2"></i></a>
        @endforeach
        
</div>
@endif

@if (!$user->accepted_status)
<div class="col-md-4 ms-auto">
@if ($user->pay_status == true)
    <div class="alert bg-success d-flex align-items-center justify-content-between bg-opacity-25 my-0">
        <div class="w-100">
        <i class="fas fa-circle-check fa-lg me-2"></i>Оплата принята!
         </div>
        <a form="accept-pay" type="button" href="{{ route('user.payDecline', $user->id) }}"
            class="btn btn-lg me-md-2 pe-0 py-0"><i class="fa fa-cancel me-1 text-dark"></i></a>
    </div>
    
@else
<a form="accept-pay" type="button" href="{{ route('user.payAccept', $user->id) }}"
    class="btn btn-success btn-sm"><i class="fa fa-check me-1"></i>Подтвердить оплату</a>

@endif
</div>
@endif


</div>