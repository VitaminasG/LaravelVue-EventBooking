<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- API Token -->
    <meta name="api-token" content="{{ auth()->check() ? $token : '' }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <noscript>
        <strong>We're sorry but this app doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <div id="app" class="h-100">

        @include('layouts/nav')

        <main class="_flex-block h-75">
            <div class="_flex-center h-100">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
