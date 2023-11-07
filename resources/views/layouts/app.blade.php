<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>RON - @yield('title')</title>

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
    <div id="app">

        @livewire('dashboard-sidebar')

        <main class="pageContainer">
            @livewire('top-bar', [
                'pageTitle' => $pageTitleSection ?? 'RON',
                'subpages' => $subpages ?? false
            ])

            <div class="mainContent">
                @yield('content')
            </div>
        </main>
    </div>

    @livewireScripts
    <script src="{{asset('js/pages_calculate.js')}}" defer></script>
    <script src="{{asset('js/autofill_field.js')}}" defer></script>
    <script type="module">
         $("body").on("click"," .delete", function(){
            var current_object = $(this);
            swal.fire({
                title: "Weet je het zeker?",
                text: "Dit wordt definitief verwijderd.",
                type: "error",
                showCancelButton: true,
                dangerMode: true,
                cancelButtonClass: 'grey',
                confirmButtonColor: 'orange',
                confirmButtonText: 'Verwijderen',
            },function (result) {
                if (result) {
                    var action = current_object.attr('data-action');
                    var token = jQuery('meta[name="csrf-token"]').attr('content');
                    var id = current_object.attr('data-id');

                    console.log(id);
                }
            });
        });
    </script>
</body>
</html>
