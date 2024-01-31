<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RON - @yield('seo_title')</title>

   <!-- Fonts -->
   <link rel="preconnect" href="https://use.typekit.net" crossorigin />
   <link rel="preconnect" href="https://p.typekit.net" crossorigin />

   <!-- preload -->
   <link  as="style" rel="stylesheet preload prefetch"  href="https://use.typekit.net/aie2oyg.css" crossorigin />

    <!-- Scripts -->
    @vite(['resources/sass/main.scss', 'resources/js/app.js'])
    <script src="{{ asset('js/alt_address_toggle.js') }}"></script>
    <script src="{{ asset('js/checkbox_data.js') }}"></script>

    @livewireStyles
</head>
<body>
    <div id="app">

        @livewire('dashboard-sidebar')

        <main class="pageContainer">
            @livewire('top-bar', [
                'pageTitleSection' => $pageTitleSection ?? 'RON',
                'pageTitle' => $pageTitle ?? false,
                'subpages' => isset($subpagesData['subpages']) ? $subpagesData['subpages'] : [],
                'id' => isset($subpagesData['id']) ? $subpagesData['id'] : null,
            ])

            <div class="mainContent">
                @yield('content')
            </div>
        </main>
    </div>

    @include('sweetalert::alert')
    @livewireScripts
    @livewire('livewire-ui-modal')
</body>
</html>
