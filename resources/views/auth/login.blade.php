@extends('layouts.app')

@section('content')
<form class="container" method="POST" action="{{ route('login') }}">
    @csrf

    <div class="row">
        <label for="email">{{ __('E-Mail Address') }}</label>

        <input dusk="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span dusk="email-error" class="error" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="row">
        <label for="password">{{ __('Password') }}</label>

        <input dusk="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
        <span dusk="password-error" class="error" role="alert">
            {{ $message }}
        </span>
        @enderror
    </div>

    <div class="row">
        <div>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>

    <div class="row">
        <button dusk="login" type="submit">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="forgot" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</form>
@endsection