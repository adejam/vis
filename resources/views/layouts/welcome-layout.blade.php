<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
        <title>@yield('title') . Communivis</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <style>
            body {
                margin: 0;
                padding: 0;
            }
    
            .alert {
                padding: 10px;
            }
    
            .alert-danger {
                background-color: #e93434;
                color: #af0a0a;
            }
    
            .alert-success {
                background-color: #12d812;
                color: #047404;
            }
    
        </style>

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-white no">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')
            <main>
                {{ $slot }}
            </main>
        </div>
        <x-footer />
        @stack('modals')

        @livewireScripts
    </body>
</html>
