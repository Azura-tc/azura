{{-- <x-admin.layouts.admin-layout :title="__('Modify Password')">
    <div class="row"> --}}
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('Update Password') }}</h4>
                    <x-admin.components.form :action="route('user-password.update')" method='PUT'>
                        <x-admin.components.input-field type='password' name='current_password' placeholder='{{ __("Current Password") }}'  label='{{ __("Current Password") }}' />
                        <x-admin.components.input-field type='password' name='password' placeholder='{{ __("Password") }}'  label='{{ __("Password") }}' />
                        <x-admin.components.input-field type='password' name='password_confirmation' placeholder='{{ __("Confirm Password") }}' label='{{ __("Confirm Password") }}' />
                        <div class="mt-3">
                            <button class="btn btn-block btn-primary font-weight-medium font-weight-bold text-white">{{ __('Update') }}</button>
                        </div>
                    </x-admin.components.form>
                </div>
            </div>
        </div>
    </div>
{{-- </x-admin.layouts.admin-layout> --}}
