<x-admin.layouts.auth-layout>
<h3 class="card-title text-start mb-3">{{__('Login')}}</h3>

<x-admin.components.form :action="route('login')">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <x-admin.components.input-field type='email' name='email' placeholder='{{ __("E-Mail Address") }}' />
    <x-admin.components.input-field type='password' name='password' placeholder='{{ __("Password") }}' />
    <div class="form-group d-flex align-items-center justify-content-between">
        <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
        </div>
        <a href="{{route('password.email')}}" class="forgot-pass">Forgot password</a>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-block enter-btn d-block w-100 text-uppercase auth-btn">Login</button>
    </div>

    <p class="sign-up">Don't have an Account?<a href="{{ route('register') }}"> {{__('Sign Up')}}</a></p>
</x-admin.components.form>
</x-admin.layouts.auth-layout>