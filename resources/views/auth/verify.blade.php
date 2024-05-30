@extends('layouts.auth')
@section('header')
{{ __('email.verify') }}
@endsection

@section('body')
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('email.validation_link') }}
                        </div>
                    @endif

                    {{ __('email.check_link') }}
                    <br/>
                    {{ __('email.not_recieve') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline text-primary">{{ __('email.click') }}</button>.
                    </form>
@endsection
