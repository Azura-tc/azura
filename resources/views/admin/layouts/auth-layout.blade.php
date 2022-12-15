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
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="row w-100">
                    <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                        <div class="card col-lg-4 mx-auto">
                            <div class="card-body px-5 py-5">
                                {{$slot}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
