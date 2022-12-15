<x-admin.layouts.auth-layout>
<h3 class="card-title text-start mb-3">{{__('Reset Password')}}</h3>

<x-admin.components.form :action="route('password.update')">
        <input type="hidden" name="token" value="{{ $request->token }}">
        <x-admin.components.input-field type='email' name='email' placeholder='{{ __("E-Mail Address") }}' value="{{ $request->email }}" />
        <x-admin.components.input-field type='password' name='password' placeholder='{{ __("Password") }}' />
        <x-admin.components.input-field type='password' name='password_confirmation' placeholder='{{ __("Confirm Password") }}' />
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn">{{ __("Reset Password") }}</button>
    </div>

    <p class="sign-up">Return to <a href="{{ route('login') }}"> {{__('Sign In')}}</a></p>
</x-admin.components.form>
</x-admin.layouts.auth-layout>