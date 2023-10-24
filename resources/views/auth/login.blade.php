@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label for="email">{{ __('Email adres') }}</label>
        <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div>
        <label for="password" >{{ __('Wachtwoord') }}</label>
        <div>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">
            {{ __('Onthoud mij') }}
        </label>
    </div>
    <button type="submit" class="btn btn-primary">
        {{ __('Inloggen') }}
    </button>

    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Wachtwoord vergeten?') }}
        </a>
    @endif
</form>

@endsection
