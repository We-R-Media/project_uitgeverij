@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">

    <form action="{{ route('advertisers.store') }}" method="post">
        @csrf
        @method('post')
        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Bedrijfsgegevens')}}</h3>

                    <x-form.input type="text" name="name" label="Bedrijfsnaam" />
                    <x-form.input type="text" name="address" label="Adres" />
                    <x-form.input type="text" name="postal_code" label="Postcode" />
                    <x-form.input type="text" name="city" label="Woonplaats" />
                    <x-form.input type="text" name="po_box" label="Postbus" />
                    <x-form.input type="text" name="province" label="Provincie"/>
                    <x-form.input type="text" name="credit" label="Kredietlimiet" />
                </div>
            </fieldset>
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Contactgegevens')}}</h3>

                    <div class="field">
                        <label class="field__label" for="salutation">{{__('Aanhef')}}</label>
                        <div class="dropdown">
                            <select name="salutation">
                                <option class="list__option" value="Dhr.">{{__('Dhr.')}}</option>
                                <option class="list__option" value="Mw.">{{__('Mw.')}}</option>
                            </select>
                        </div>
                        @error('salutation')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <x-form.input type="text" name="initial" label="Voorletter" />
                    <x-form.input type="text" name="first_name" label="Voornaam" />
                    <x-form.input type="text" name="last_name" label="Achternaam" />
                    <x-form.input type="text" name="phone" label="Telefoonnummer" />
                    <x-form.input type="text" name="phone_mobile" label="Mobiel" />
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
