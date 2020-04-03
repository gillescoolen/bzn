@extends('layouts.app')

@section('content')
<form class="container" method="POST" action="{{ route('register') }}">
    @csrf

    <div class="row">
        <label for="name">{{ __('Name') }}</label>

        <input dusk="name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        @error('name')
        <span dusk="name-error" class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

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
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <input dusk="password-conformation" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="row">
        <button dusk="register" type="submit">
            {{ __('Register') }}
        </button>
    </div>
</form>
@endsection