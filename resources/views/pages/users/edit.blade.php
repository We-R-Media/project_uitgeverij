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
                        <x-form.input type="text" name="initial" label="Initiaal" :value="$user->initial" />
                        <x-form.input type="text" name="first_name" label="Voornaam" :value="$user->first_name" />
                        <x-form.input type="text" name="preposition" label="Tussenvoegsel" :value="$user->preposition" />
                        <x-form.input type="text" name="last_name" label="Achternaam" :value="$user->last_name" />

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
                        <x-form.input type="email" name="email" label="E-mailadres" :value="$user->email" />
                        <x-form.input type="text" name="id" label="ID" :value="$user->id" :extraAttributes="'readonly'" />
                    </div>
                </fieldset>
            </div>

            <x-form.submit />
        </form>
    </div>
@endsection
