@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

    <div class="page__wrapper">
        <form action="{{ route('orders.store', $advertiser->id) }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <x-form.input type="text" name="advertiser_id" label="Klantnummer" :value="$advertiser->id" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="name" label="Bedrijfsnaam" :value="$advertiser->name" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="po_box" label="Postbus" :value="$advertiser->po_box" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="postal_code" label="Postcode" :value="$advertiser->postal_code" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="city" label="Woonplaats" :value="$advertiser->city" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="province" label="Provincie" :value="$advertiser->province" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="phone" label="Telefoon" :value="$advertiser->phone" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="phone_mobile" label="Mobiel" :value="$advertiser->phone_mobile" :extraAttributes="'readonly'" />
                        <x-form.input type="email" name="email" label="E-mailadres" :value="$advertiser->email" />
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <x-form.select
                            name="release_name"
                            label="Uitgave"
                            :options="$publishers->pluck('name', 'id')"
                        />

                        <div class="field">
                            <label class="field__label" for="contact">{{__('Contactpersoon')}}</label>
                            <div class="dropdown">
                                <select name="contact">
                                    @if($advertiser->contacts->isEmpty())
                                        <option value="nvt" disabled selected>{{ __('Niet beschikbaar ...') }}</option>
                                    @else
                                        @foreach ($advertiser->contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ $contact->role == 1 ? 'selected' : '' }}>
                                                {{ $contact->salutation }} {{ $contact->initial }} {{ $contact->last_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="user">{{__('Verkoper')}}</label>
                            <input type="text" name="user" value="{{auth()->user()->first_name}} {{auth()->user()->last_name}}" readonly>
                        </div>
                    </div>
                </fieldset>
            </div>

            <x-form.submit />
        </form>
    </div>
@endsection
