<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-lY6Zvx33gxHn3e1N3PfpLgRE1gK4F2Xp5lBFfoLjOt1FO51Pn7BZQopfj6VflJp4" crossorigin="anonymous"> --}}
        

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://kit.fontawesome.com/3ed6a4b506.js" crossorigin="anonymous"></script>


        <!-- Styles -->
        @livewireStyles
        <style>
            /* Estilos de los botones */
            .btn {
                display: inline-flex;
                align-items: center;
                padding: 8px 12px;
                font-size: 14px;
                border-radius: 4px;
                cursor: pointer;
            }
    
            /* Estilos de colores */
            .btn-primary {
                background-color: #3490dc;
                color: #ffffff;
            }
    
            .btn-success {
                background-color: #38c172;
                color: #ffffff;
            }
    
            .btn-danger {
                background-color: #e3342f;
                color: #ffffff;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            @yield('content')
            <main>
                {{--$slot --}}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
