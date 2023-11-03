<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        @livewireStyles
        <title>{{ $title ?? 'Todo List' }}</title>
    </head>
    <body>
        @yield('content')
        @livewireScripts
    </body>
</html>
