<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style> [x-cloak] { display: none; } </style> 

    <tallstackui:script />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ isset($title) ? env('APP_NAME') . " - $title" : env('APP_NAME') }}</title>
</head>

<body>
    <x-dialog /> 

    <livewire:web.components.navbar />
    {{ $slot }}
    <livewire:web.components.footer />

    @livewireScripts
</body>

</html>