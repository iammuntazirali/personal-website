<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page_title','Mamalikidou Anastasia | Portfolio')</title>
        <meta name="description" content="Portfolio">
        <meta name="theme-color" content="#555">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <script src="{{ asset('js/main.js') }}" defer></script>
    </head>

    <body>
        <header>
            @include('partials.header')
        </header>
        
        <main>
            @yield('content')
        </main>

        <footer>
            @include('partials.footer')
        </footer>

    </body>
</html>