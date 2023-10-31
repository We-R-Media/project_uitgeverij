<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RON - @yield('title')</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Stylesheets -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}"> --}}

    <!-- Scripts -->
    @vite(['resources/sass/main.scss', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div id="app">

        @livewire('dashboard-sidebar')
        {{-- @livewire('navigation') --}}

        <main class="pageContainer">
            @yield('content')
        </main>
    </div>

    @livewireScripts
    <script src="{{asset('js/pages_calculate.js')}}"></script>
    <script src="{{asset('js/contact_add.js')}}"></script>
</body>
</html>
