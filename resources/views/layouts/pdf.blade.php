<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{-- <title>{{ $title }}</title> --}}
    <title>{{ __('auth.thesis') }}</title>

    <!-- Fonts -->

    <style>
        @font-face {
          font-family: "DejaVu Sans";
          font-style: normal;
          font-weight: 400;
          src: url("~fonts/dejavu-sans/DejaVuSans.ttf");
          /* IE9 Compat Modes */
          src: 
            local("DejaVu Sans"), 
            local("DejaVu Sans"), 
            url("~fonts/dejavu-sans/DejaVuSans.ttf") format("truetype");
        }
        body { 
          font-family: "DejaVu Sans";
          font-size: 12px;
          padding-right: 10px; 
        }

.title {
  text-align: center;
  font-size: 12pt;
  margin-bottom: 2px;
}

.authors {
  text-align: center;
  font-size: 9pt;
  margin-bottom: 2px;
}

.affiliations {
  text-align: center;
  font-size: 9pt;
  margin-bottom: 2px;
}

.email {
  text-align: center;
  font-size: 9pt;
}

.content {
  text-indent: 1em;
  font-size: 8pt;
  width: 100%;
  text-align: justify;
}

p {
  text-indent: 2em;
  margin-bottom: 1pt;
}




      </style>          
</head>

<body>

    @yield('content')

</body>
</html>
