@extends('layouts.auth')
@section('header')
    @include('user.parts.navigation', ['page' => 'documents'])
@endsection

@section('body')

<h4 class="mb-3 text-center">{{ __('auth.documents') }}</h4>
    @include('user.parts.success')
    @include('user.parts.error')
    
    <div class="alert alert-danger" role="alert">
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>Не оплачивайте участие, пока не утвердили ваши тезисы.
    </div>
    
    <div class="alert alert-warning" role="alert">
        <i class="fas fa-exclamation-circle fa-lg me-2"></i>Реквизиты для оплаты участия и договора будут добавлены позднее.
    </div>

    @isset ($fileByTypes)
        @foreach ($fileByTypes as $type => $file)
        @include('user.file.show', ['file' => $file ?? null, 'type' => $type])
    @endforeach
    @endif


@endsection

@section('footer')

@endsection