<x-admin.base-layout>
    <x-admin.layouts.partials.side-bar name="{{ Auth::user()->name }}" />
    <div class="container-fluid page-body-wrapper">
        <x-admin.layouts.partials.nav-bar name="{{ Auth::user()->name }}" />
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header">
                    <h3 class="page-title"> {{ $title }} </h3>
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                        </ol>
                    </nav> -->
                </div>
                {{$slot}}
            </div>
        </div>
    </div>
</x-admin.base-layout>
