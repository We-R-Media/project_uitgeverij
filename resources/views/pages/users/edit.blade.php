@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="initial">{{__('Initiaal')}}</label>
                            <input value="{{ $user->initial }}" type="text" name="initial">

                            @error('initial')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="first_name">{{__('Voornaam')}}</label>
                            <input value="{{ $user->first_name }}" type="text" name="first_name">

                            @error('first_name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="preposition">{{__('Tussenvoegsel')}}</label>
                            <input value="{{ $user->preposition }}" type="text" name="preposition">

                            @error('preposition')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="last_name">{{__('Achternaam')}}</label>
                            <input value="{{ $user->last_name }}" type="text" name="last_name">
                            @error('last_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="gender">{{__('Gender')}}</label>
                            <div class="dropdown">
                                <select name="gender">
                                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>
                                        {{__('Man')}}
                                    </option>
                                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>
                                        {{__('Vrouw')}}
                                    </option>
                                    <option value="other" {{ $user->gender == 'other' ? 'selected' : '' }}>
                                        {{__('Zeg ik liever niet')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="email">{{__('E-mailadres')}}</label>
                            <input value="{{ $user->email }}" type="email" name="email">
                            @error('email')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="password">{{__('Wachtwoord')}}</label>
                            <input  type="password" name="password" value="">
                            @error('password')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="id">{{__('ID')}}</label>
                            <input value="{{ $user->id }}" type="text" name="id" readonly>

                            @error('id')
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
