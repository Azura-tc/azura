<x-admin.layouts.auth-layout>
<h3 class="card-title text-start mb-3">{{__('Forget Password')}}</h3>

<x-admin.components.form :action="route('password.email')">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <x-admin.components.input-field type='email' name='email' placeholder='{{ __("E-Mail Address") }}' />
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 auth-btn text-uppercase">{{ __("Send Password Reset Link") }}</button>
    </div>

    <p class="sign-up">Return to <a href="{{ route('login') }}"> {{__('Sign In')}}</a></p>
</x-admin.components.form>
</x-admin.layouts.auth-layout>