@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'documents'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('auth.documents') }}</h4>
    @include('user.parts.success')
    @include('user.parts.error')
    

@if ($user->theses()->where('accepted_status', true)->exists())
    @isset ($fileByTypes)
    @foreach ($fileByTypes as $type => $file)
    @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
    @endforeach
    @endif
@else
<div class="alert alert-danger" role="alert">
    <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.thesis_absence_warning')}}
</div>
@endif
    

    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.requisites_warning')}}
    </div>

@endsection

@section('footer')



<div class="d-flex justify-content-start align-items-center mt-4">
    @if ($user->pay_status == true)
        <div class="alert bg-success bg-opacity-25 my-0 me-4">
            <i class="fas fa-circle-check fa-lg me-2"></i>{{ __('auth.pay_accepted') }}
        </div>
        @if (auth()->user()->isAdmin())
        <a form="accept-thesises" type="button" href="{{ route('user.payDecline', $user->id) }}"
            class="btn btn-danger me-2"><i class="fa fa-cancel me-1"></i>{{ __('auth.admin_cancel') }}</a>
        @endif
    @endif
    
    @if (auth()->user()->isAdmin() and $user->pay_status != true )
        <a form="accept-thesises" type="button" href="{{ route('user.payAccept', $user->id) }}"
            class="btn btn-success me-2"><i class="fa fa-check me-1"></i>{{ __('auth.admin_accept') }}</a>
    @endif
    </div>

@endsection