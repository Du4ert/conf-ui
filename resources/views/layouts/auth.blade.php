<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{-- <title>{{ $title }}</title> --}}
    <title>GenBio - {{ __('auth.homepage_title') }}</title>

    <!-- Fonts -->

    @vite(['resources/scss/main.scss', 'resources/js/app.js'])
    <script>
        var locale = '{{ config('app.locale') }}';
    </script>

    {{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script> --}}
    {{-- <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            nicEditors.allTextAreas({
                buttonList: ['removeformat', 'bold', 'italic', 'underline', 'subscript', 'superscript',
                    'center', 'right', 'justify', 'ol', 'ul'
                ]
            });
        });
    </script> --}}

</head>

<body>
    @include('common.header')
    @include('common.banner')

    <div class="main mt-4">

        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            @yield('header')
                        </div>
                        <div class="card-body">
                            @include('user.parts.success')
                            @include('user.parts.error')
                            @yield('body')
                        </div>
                        <div class="card-footer">
                            @yield('footer')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>{{-- /main  --}}

    @include('common.footer')

    <div id="spinner-div" class="pt-5 justify-content-center align-items-center">
        <div class="spinner-border text-primary" role="status">
        </div>
    </div>
</body>

</html>
