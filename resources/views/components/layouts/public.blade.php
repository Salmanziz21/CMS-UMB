<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        <script src="{{ asset('js/public.js') }}"></script>
    </head>
    <body class="bg-white text-gray-900 antialiased">
        {{ $slot }}

        @fluxScripts
    </body>
</html>
