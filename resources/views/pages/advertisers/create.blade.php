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

                    <div class="field">
                        <label class="field__label" for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name">
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="po_box">{{ __('Adres') }}</label>
                        <input type="text" name="address">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="postal_code">{{ __('Postcode') }}</label>
                        <input type="text" name="postal_code">
                        @error('postal_code')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="city">{{ __('Woonplaats') }}</label>
                        <input type="text" name="city">
                        @error('city')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="province">{{ __('Provincie') }}</label>
                        <input type="text" name="province">
                        @error('province')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="po_box">{{ __('Postbus') }}</label>
                        <input type="text" name="po_box">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="credit">{{ __('Kredietlimiet') }}</label>
                        <input type="text" name="credit">
                        @error('credit')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
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
                    <div class="field">
                        <label class="field__label" for="initial">{{ __('Voorletter') }}</label>
                        <input type="text" name="initial">
                        @error('initial')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="first_name">{{ __('Voornaam') }}</label>
                        <input type="text" name="first_name">
                        @error('first_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="last_name">{{ __('Achternaam') }}</label>
                        <input type="text" name="last_name">
                        @error('last_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="phone">{{ __('Telefoonnummer') }}</label>
                        <input type="text" name="phone">
                        @error('phone')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="phone_mobile">{{ __('Mobiel') }}</label>
                        <input type="text" name="phone_mobile">
                        @error('phone_mobile')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="email">{{ __('E-mailadres') }}</label>
                        <input type="email" name="email">
                        @error('email')
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
