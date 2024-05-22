<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    {{-- <title>{{ $title }}</title> --}}
    <title>User dashboard</title>

    <!-- Fonts -->

    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
    <script>
        var locale = '{{ config('app.locale') }}';
    </script>
</head>

<body>
@include('common.header')
@include('common.banner');

<div class="container">
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @yield('header')
                </div>
                <div class="card-body">
                  @yield('body')
                </div>
            </div>
        </div>
    </div>
</div>

@include('common.footer')
</body>

</html>
