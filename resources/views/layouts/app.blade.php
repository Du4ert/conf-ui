<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{-- <title>{{ $title }}</title> --}}
    <title>GenBio 2024</title>

    <!-- Fonts -->

    @vite(['resources/scss/main.scss', 'resources/js/app.js', 'resources/js/main-page.js'])
    <script>
        var locale = '{{ config('app.locale') }}';
    </script>
</head>

<body>
@include('common.header')
<div class="bg-image"></div>

@yield('content')

@include('common.footer')
</body>

</html>
