<!-- It always seems impossible until it is done. - Nelson Mandela -->

@props([
    'title' => config('app.name', 'Mamalikidou Anastasia'),
    'description' => config('app.description', 'Passionate full-stack web developer crafting responsive and accessible websites and applications. Let\'s build!'),    
    'header' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>
        <meta name="description" content="{{ $description }}">

        <link rel="canonical" href="https://a-mamal.com">
        
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
                @isset($header)
                    <header class="page-header">
                        {!! $header !!}
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