<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AZURA - Admin @isset($metaTitle) | {{ $metaTitle }} @endisset</title>

        @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    </head>
    <body>
        <div class="container-scroller">
            {{$slot}}
        </div>
    </body>
</html>
