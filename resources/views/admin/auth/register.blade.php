<x-admin.layouts.auth-layout>
<h3 class="card-title text-start mb-3">{{__('Register')}}</h3>

<x-admin.components.form :action="route('register')">
        <x-admin.components.input-field name='name' placeholder='{{ __("Name") }}' />
        <x-admin.components.input-field type='email' name='email' placeholder='{{ __("E-Mail Address") }}' />
        <x-admin.components.input-field type='password' name='password' placeholder='{{ __("Password") }}' />
        <x-admin.components.input-field type='password' name='password_confirmation' placeholder='{{ __("Confirm Password") }}' />
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 auth-btn text-uppercase">{{__('Register')}}</button>
    </div>

    <p class="sign-up">Don't have an Account?<a href="{{ route('login') }}"> {{__('Sign In')}}</a></p>
</x-admin.components.form>
</x-admin.layouts.auth-layout>
