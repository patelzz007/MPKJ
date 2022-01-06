<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ __('panel.site_title') }}</title>
</head>

<body class="text-blueGray-700 antialiased" style="background-color: #123123">
{{-- <body class="text-blueGray-700 antialiased" style="background-color: #F866CC"> --}}
    <main>
        @yield('content')
    </main>
</body>

</html>