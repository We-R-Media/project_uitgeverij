@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form class="formContainer" action="{{ route('users.store') }}" method="post">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{ __('Algemeen') }}</h3>

                    <div class="field field-alt">
                        <label for="first_name">{{__('Voornaam')}}</label>
                        <input type="text" name="first_name" id="">
                        @error('first_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="initial">{{__('Initiaal')}}</label>
                        <input type="text" name="initial">
                        @error('initial')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="preposition">{{__('Tussenvoegsel')}}</label>
                        <input type="text" name="preposition">
                        @error('preposition')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="gender">{{__('Gender')}}</label>
                        <select class="select2" name="gender" id="">
                            <option value="male">Man</option>
                            <option value="female">Vrouw</option>
                            <option value="other">Zeg ik liever niet</option>
                        </select>
                    </div>

                    <div class="field field-alt">
                        <label for="role">{{__('Rol')}}</label>
                        <select class="select2" name="role" id="">
                            <option value="seller">Verkoper</option>
                            <option value="supervisor">Administratie</option>
                            <option value="admin">Beheerder</option>
                        </select>
                    </div>



                    <div class="field field-alt">
                        <label for="last_name">{{__('Achternaam')}}</label>
                        <input type="text" name="last_name" id="">
                        @error('last_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>


                    <div class="field field-alt">
                        <label for="email">{{__('E-mailadres')}}</label>
                        <input type="email" name="email" id="">
                        @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="password">{{__('Wachtwoord')}}</label>
                        <input type="password" name="password" id="">
                        @error('password')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                </fieldset>

            </div>
            <div class="ButtonGroup">
                <div class="buttons">
                    <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
