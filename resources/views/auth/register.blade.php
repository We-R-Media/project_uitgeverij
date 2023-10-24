@extends('layouts.auth')

@section('content')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="row mb-3">
        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('Voornaam') }}</label>

        <div class="col-md-6">
            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="row mb-3">
        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Achternaam') }}</label>

        <div class="col-md-6">
            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

            @error('last_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="initial" class="col-md-4 col-form-label text-md-end">{{ __('Initialen') }}</label>

        <div class="col-md-6">
            <input id="initial" type="text" class="form-control @error('initial') is-invalid @enderror" name="initial" value="{{ old('initial') }}" autocomplete="initial" autofocus>

            @error('initial')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="preposition" class="col-md-4 col-form-label text-md-end">{{ __('Tussenvoegsel') }}</label>

        <div class="col-md-6">
            <input id="preposition" type="text" class="form-control @error('preposition') is-invalid @enderror" name="preposition" value="{{ old('preposition') }}" autocomplete="preposition" autofocus>

            @error('preposition')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="gender" class="col-md-4 col-form-label text-md-end">{{'Geslacht'}}</label>
        <div class="col-md-6">
            <select id="gender" class="form-control @error('gender') is-invalid @enderror" name="gender">
                <option value="male">Man</option>
                <option value="female">Vrouw</option>
                <option value="other">Anders</option>
            </select>
        </div>
    </div>


    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-mail') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Wachtwoord') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Wachtwoord bevestigen') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Registreren') }}
            </button>
        </div>
    </div>
</form>

@endsection
