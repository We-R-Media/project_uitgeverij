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
                        <x-form.input type="text" name="initial" label="Initiaal" />
                        <x-form.input type="text" name="first_name" label="Voornaam" />
                        <x-form.input type="text" name="preposition" label="Tussenvoegsel" />
                        <x-form.input type="text" name="last_name" label="Achternaam" />
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
                        <x-form.input type="email" name="email" label="E-mailadres" />
                        <x-form.input type="text" name="password" label="Wachtwoord" />
                    </div>
                </fieldset>
            </div>
            <x-form.submit />
        </form>
    </div>
@endsection
