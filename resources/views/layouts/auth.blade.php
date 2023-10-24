<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'R.O.N.') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div class="auth">
        <div class="auth__wrapper">
            <div class="auth__image">
                <div class="auth__text">
                    <h1></h1>
                </div>
            </div>
            <div class="auth__form">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{asset('js/contact_add.js')}}"></script>
</body>
</html>
