@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="gender">{{__('Gender')}}</label>
                            <div class="dropdown">
                                <select name="gender">
                                    <option value="male">Man</option>
                                    <option value="female">Vrouw</option>
                                    <option value="other">Zeg ik liever niet</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label" for="initial">{{__('Initiaal')}}</label>
                            <input type="text" name="initial">
                            @error('initial')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="first_name">{{__('Voornaam')}}</label>
                            <input type="text" name="first_name">
                            @error('first_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="preposition">{{__('Tussenvoegsel')}}</label>
                            <input type="text" name="preposition">
                            @error('preposition')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="last_name">{{__('Achternaam')}}</label>
                            <input type="text" name="last_name">
                            @error('last_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="role">{{__('Rol')}}</label>
                            <div class="dropdown">
                                <select name="role">
                                    <option value="seller">Verkoper</option>
                                    <option value="supervisor">Administratie</option>
                                    <option value="admin">Beheerder</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label" for="email">{{__('E-mailadres')}}</label>
                            <input type="email" name="email">
                            @error('email')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="password">{{__('Wachtwoord')}}</label>
                            <input type="password" name="password">
                            @error('password')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="form__actions">
                <div class="buttons">
                    <button type="submit" class="button button--big button--primary">{{ __('Opslaan') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
