<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'R.O.N.') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://use.typekit.net" crossorigin />
    <link rel="preconnect" href="https://p.typekit.net" crossorigin />

    <!-- preload -->
    <link  as="style" rel="stylesheet preload prefetch"  href="https://use.typekit.net/aie2oyg.css" crossorigin />

    <!-- Scripts -->
    @vite(['resources/sass/main.scss', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div class="auth">
        <div class="auth__wrapper">
            <div class="auth__image">
                <img class="image--cover" src="{{asset('images/background/auth.jpg')}}" alt="">

                <div class="auth__text">
                    <div class="auth__brand">
                        <div class="brand__logo">
                            <img src="" alt="">
                        </div>
                    </div>
                    <h1>Your perfect business partner</h1>
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
