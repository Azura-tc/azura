<x-admin.layouts.admin-layout :title="__('Edit Profile')">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ auth()->user()->name }}</h4>
                    <x-admin.components.form :action="route('user-profile-information.update')" method='PUT'>
                        <div class="row">
                            <x-admin.components.input-field type='text' name='name' placeholder="{{__('Username')}}" label="{{__('Username')}}" value="{{auth()->user()->name}}" />
                            <x-admin.components.input-field type='email' name='email' placeholder="{{__('Email')}}" label="{{__('Email')}}" value="{{auth()->user()->email}}" />
                        </div>
                        <div class="mt-3 text-end">
                            <button class="btn btn-block btn-primary font-weight-medium font-weight-bold text-white">{{ __('Save') }}</button>
                        </div>
                    </x-admin.components.form>
                </div>
            </div>
        </div>
    </div>
</x-admin.layouts.admin-layout>
