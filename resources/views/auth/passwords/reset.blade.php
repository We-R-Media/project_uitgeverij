@extends('layouts.auth')

@section('content')
    <div class="form__wrapper">
        <div class="form__top">
            <div class="form__icon">
                <div class="icon__inner">
                    <svg class="image--cover" xmlns="http://www.w3.org/2000/svg" data-name="Group 2" viewBox="0 0 48.391 57.174"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h48.391v57.174H0z" data-name="Rectangle 50"/></clipPath></defs><g fill="#f7a637" clip-path="url(#a)" data-name="Group 1"><path d="M22.913 52.688c6.53-.1 11.647-.575 16.478-2.675.209-.091.417-.186.623-.283 3.8-1.769 4.439-3.045 3.609-7.119a21.254 21.254 0 0 0-5.117-10.138 3.467 3.467 0 0 1-.915-2.5c.341-1.844 2.389-2.223 3.845-.793a21.8 21.8 0 0 1 5.779 9.652 41.066 41.066 0 0 1 1.123 6.308c.325 2.649-.928 4.68-2.881 6.328-3.133 2.644-6.909 3.872-10.823 4.651a50.819 50.819 0 0 1-26.089-1.435 12.718 12.718 0 0 1-1.771-.721C-.081 50.508-.579 47.529.357 42.092a23.868 23.868 0 0 1 6.064-12.365 6.119 6.119 0 0 1 .584-.578 2.511 2.511 0 0 1 3.255-.115c.807.787.765 1.948-.041 3.113-1.32 1.906-2.913 3.7-3.82 5.792a36.337 36.337 0 0 0-1.889 7.223c-.311 1.524.62 2.61 1.832 3.41a22.163 22.163 0 0 0 8.916 3.3c2.972.463 5.987.647 7.654.817" data-name="Path 1"/><path d="M24.288 0a15.391 15.391 0 0 1 15.286 15.4 15.37 15.37 0 0 1-30.74-.044A15.336 15.336 0 0 1 24.288 0M13.242 15.231a11.035 11.035 0 0 0 11.087 11.06 11.151 11.151 0 0 0 10.824-11.07C35.194 9.538 29.975 4.38 24.2 4.391a11.286 11.286 0 0 0-10.958 10.84" data-name="Path 2"/></g></svg>
                </div>
            </div>
            <h3 class="heading--margin-none text--primary">{{ __('Wachtwoord instellen') }}</h3>
        </div>
        <div class="form__box">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <fieldset class="fields">
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="form__row">
                        <div class="field">
                            <label for="email">{{ __('E-mailadres') }}</label>
                            <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="field">
                            <label for="password" >{{ __('Nieuw wachtwoord') }}</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form__row">
                        <div class="field">
                            <label for="password-confirm" >{{ __('Nieuwe wachtwoord bevestigen') }}</label>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form__row form__row--spacer-top form__row--centered">
                        <button type="submit" class="button button--action">
                            {{ __('Opnieuw instellen') }}
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
