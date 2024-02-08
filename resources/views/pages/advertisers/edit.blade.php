@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">
    <div class="header__bar">
        <div class="bar__buttons">
            @if (!$advertiser->deactivated_at && !$advertiser->blacklisted_at)
                <a href="{{ route('orders.create', $advertiser->id) }}" class="button button--secondary">{{ __('Nieuwe order') }}</a>
            @endif
        </div>
    </div>
    <form action="{{ route('advertisers.update', $advertiser->id) }}" id="outside-form" method="post">
        @csrf
        @method('put')

        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Relatiegegevens')}}</h3>
                    <x-form.input type="text" name="advertiser_id" label="Klantnummer" :value="$advertiser->id" :extraAttributes="'readonly'" />
                    <x-form.input type="text" name="name" label="Bedrijfsnaam" :value="$advertiser->name" />

                    <x-form.select
                        name="salutation"
                        label="Aanhef"
                        :options="['Dhr.' => __('Dhr.'), 'Mw.' => __('Mw.')]"
                    />

                    <x-form.input type="text" name="initial" label="Voorletter" :value="$advertiser->initial" />
                    <x-form.input type="text" name="first_name" label="Voornaam" :value="$advertiser->first_name" />
                    <x-form.input type="text" name="last_name" label="Achternaam" :value="$advertiser->last_name" />
                    <x-form.input type="text" name="email" label="E-mailadres" :value="$advertiser->email" />
                    <x-form.input type="text" name="phone" label="Telefoonnummer" :value="$advertiser->phone" />
                    <x-form.input type="text" name="phone_mobile" label="Mobiel" :value="$advertiser->phone_mobile" />
                    <x-form.input type="text" name="postal_code" label="Postcode" :value="$advertiser->postal_code" />
                    <x-form.input type="text" name="address" label="Adres" :value="$advertiser->address" />
                    <x-form.input type="text" name="city" label="Woonplaats" :value="$advertiser->city" />
                    <x-form.input type="text" name="province" label="Provincie" :value="$advertiser->province" />

                    @if ($advertiser->credit_limit && !is_countable($advertiser->credit_limit))
                        <x-form.input type="text" name="credit" label="Kredietlimiet" />
                    @endif

                    @if ($advertiser->po_box)
                        <x-form.input type="text" name="po_box" label="Postbus" :value="$advertiser->po_box" />
                    @endif
                </div>
            </fieldset>
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{ __('Opties') }}</h3>

                    <div class="field">
                        <label class="field__label">{{ __('Zwarte lijst') }}</label>
                        <div class="radio__group">
                            <input id="blacklisted_true" type="radio" name="blacklisted" value="1" @if($advertiser->blacklisted_at) checked @endif>
                            <label class="field__label" for="blacklisted_true">{{__('Ja')}}</label>
                            <input id="blacklisted_false" type="radio" name="blacklisted" value="0" @if(!$advertiser->blacklisted_at) checked @endif>
                            <label class="field__label" for="blacklisted_false">{{__('Nee')}}</label>
                        </div>
                        @error('blacklisted_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label">{{__('Actief')}}</label>
                        <div class="radio__group">
                            <input id="deactivated_true" type="radio" name="active" value="1" @if(!$advertiser->deactivated_at) checked @endif>
                            <label class="field__label" for="deactivated_true">{{__('Ja')}}</label>
                            <input id="deactivated_false" type="radio" name="active" value="0" @if($advertiser->deactivated_at) checked @endif>
                            <label class="field__label" for="deactivated_false">{{__('Nee')}}</label>
                        </div>
                    </div>
                </div>

                @livewire('alt-address', ['advertiser' => $advertiser], key($advertiser->id))

                <div class="section__block">
                    <h3>{{__('Opmerkingen')}}</h3>
                    <x-form.textarea name="comments" value=" {{ old('comments') }}" label="Opmerkingen" rows="10" cols="30" :extraAttributes="['maxlength' => 100]"></x-form.textarea>
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
