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
                    <x-form.input type="number" name="credit" label="Kredietlimiet" />
                </div>
            </fieldset>
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Contactgegevens')}}</h3>

                    <x-form.select
                        name="salutation"
                        label="Aanhef"
                        :options="['Dhr.' => __('Dhr.'), 'Mw.' => __('Mw.')]"
                    />
                    <x-form.input type="text" name="initial" label="Voorletter" />
                    <x-form.input type="text" name="first_name" label="Voornaam" />
                    <x-form.input type="text" name="last_name" label="Achternaam" />
                    <x-form.input type="text" name="phone" label="Telefoonnummer" />
                    <x-form.input type="text" name="phone_mobile" label="Mobiel" />
                </div>
            </fieldset>
        </div>

        <x-form.submit />
    </form>
</div>
@endsection
