<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mon Application</title>

        {{-- Ziggy : injecte les routes Laravel en JavaScript --}}
        @routes

        {{-- Vite : charge les fichiers CSS et JS compilés --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Inertia : gère le <head> dynamiquement (titre, meta, etc.) --}}
        @inertiaHead
    </head>
    <body>
        {{-- Inertia : c'est ici que les composants Vue seront rendus --}}
        @inertia
    </body>
</html>