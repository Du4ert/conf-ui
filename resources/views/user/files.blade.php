@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'documents'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('auth.documents') }}</h4>
    @include('user.parts.success')
    @include('user.parts.error')
    
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.thesis_absence_warning')}}
    </div>
    
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>{{ __('auth.requisites_warning')}}
    </div>

    @isset ($fileByTypes)
        @foreach ($fileByTypes as $type => $file)
        @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
    @endforeach
    @endif


@endsection

@section('footer')

@endsection