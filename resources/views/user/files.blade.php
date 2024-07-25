@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'documents'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('auth.documents') }}</h4>
    @include('user.parts.success')
    @include('user.parts.error')
    

{{-- @if ($user->theses()->where('accepted_status', true)->exists()) --}}
    @isset ($fileByTypes)
    @foreach ($fileByTypes as $type => $file)
    @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
    @endforeach
    @endif
{{-- @else --}}
{{-- <div class="alert alert-danger" role="alert"> --}}
    {{-- <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.thesis_absence_warning')}} --}}
{{-- </div> --}}
{{-- @endif --}}


@if (config('app.locale') === 'ru')
<p>Пройдите на страницу <a href="{{ route('agreement') }}" target="_blank">выбора договора</a> и следуйте приложенной инструкции.</p>

<p>После заключения договора и оплаты, разместите, пожалуйста, договор в поле <span class="text-danger">{{ __('file.agreement') }}</span>. Квитанцию об оплате, разместите в поле <span class="text-danger">{{ __('file.payment') }}</span>.
</p>

@else
<p>Go to the <a href="{{ route('agreement') }}" target="_blank">Agreement for the provision of services page</a> and follow the attached instructions.</p>

<p>After the conclusion of the contract and payment, please place the completed agreement in <span class="text-danger">{{ __('file.agreement') }}</span> field. Place the receipt of payment in the <span class="text-danger">{{ __('file.payment') }}</span> field.</p>
@endif
    {{-- <div class="alert alert-warning" role="alert">
        <a href="{{ route('agreement') }}" target="_blank" class="btn btn_link text-primary">Договор участия</a>
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.requisites_warning')}}
    </div> --}}

@endsection

@section('footer')



<div class="d-flex justify-content-start align-items-center mt-4">
    @if ($user->pay_status == true)
    <div class="alert bg-success d-flex align-items-center justify-content-between bg-opacity-25 my-0">
        <div class="w-100">
            <i class="fas fa-circle-check fa-lg me-2"></i>{{ __('auth.pay_accepted') }}
        </div>
        
        @if (auth()->user()->isAdmin())
        <a form="accept-pay" type="button" href="{{ route('user.payDecline', $user->id) }}"
            class="btn btn-lg me-md-2 pe-0 py-0"><i class="fa fa-cancel me-1 text-dark"></i></a>
        </div>
        @endif
    @endif
    
    @if (auth()->user()->isAdmin() and $user->pay_status != true )
        <a form="accept-thesises" type="button" href="{{ route('user.payAccept', $user->id) }}"
            class="btn btn-success me-2"><i class="fa fa-check me-1"></i>{{ __('auth.admin_accept') }}</a>
    @endif
    </div>

@endsection