<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="chrome windows fontawesome-i2svg-active fontawesome-i2svg-complete dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Azura') }}</title>

        @routes
        @vite(['resources/css/admin.css', 'resources/js/admin.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body>
        <div id="app" class="container-scroller" data-page="{{ json_encode($page) }}" ></div>
    </body>
</html>
