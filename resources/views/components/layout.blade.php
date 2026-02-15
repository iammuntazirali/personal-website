<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Mamalikidou Anastasia') }}</title>
        <meta name="description" content="Portfolio">
        <meta name="theme-color" content="#555">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        @vite('resources/js/app.js')
        <script src="{{ asset('js/main.js') }}" defer></script>
    </head>
    <body>
        {{-- This navigation include is commented out for now --}}
        {{-- @include('layouts.navigation') --}}

        @include('partials.header')

        <div class="right-wrapper">
            <main>
                {{-- optional page header slot --}}
                @isset($header)
                    <header class="page-header">
                        {{ $header }}
                    </header>
                @endisset

                {{ $slot }}
            </main>

            <footer>
                @include('partials.footer')
            </footer>
        </div>
    </body>
</html>