@props([
    'title' => config('app.name', 'Mamalikidou Anastasia'),
    'description' => config('app.description', 'Passionate full-stack web developer crafting responsive and accessible websites and applications. Let\'s build!'),    
    'headerTitle' => null,  // Visible H1
    'subtitle' => null      // Optional subtitle under H1
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="day">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Page Title --}}
        <title>{{ $title }}</title>

        {{-- Page Description (meta tag) --}}
        <meta name="description" content="{{ $description }}">

        {{-- Canonical URL for SEO --}}
        <link rel="canonical" href="https://a-mamal.com{{ request()->getRequestUri() }}">
        
        {{-- Theme color for browsers --}}
        <meta name="theme-color" content="#555">

        {{-- CSS --}}
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        
        {{-- JS --}}
        @vite('resources/js/app.js')
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script src="{{ asset('js/theme-switcher.js') }}" defer></script>
        <script src="{{ asset('js/sidebar.js') }}" defer></script>

    </head>
    <body>
        {{-- This navigation include is commented out for now --}}
        {{-- @include('layouts.navigation') --}}

        {{-- Site-wide header --}}
        @include('partials.header')

        {{-- Wrapper for main content and footer (used for layout/CSS purposes) --}}
        <div class="right-wrapper">
            <main>
                {{-- Page specific header --}}
                <header class="page-header">
                    <h1 class="page-header-title">
                        {!! $headerTitle !!}
                    </h1>

                    @isset($subtitle)
                        <p class="page-header-subtitle">
                            {!! $subtitle !!}
                        </p>
                    @endisset
                </header>
                
                {{-- Main page content slot --}}
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <footer>
                @include('partials.footer')
            </footer>
        </div>
    </body>
</html>