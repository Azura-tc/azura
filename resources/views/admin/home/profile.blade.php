<x-admin.layouts.admin-layout :title="__('Profile')">
    <div class="row">
        @include('admin.home.edit-profile')
        @include('admin.home.change-password')
    </div>
</x-admin.layouts.admin-layout>
