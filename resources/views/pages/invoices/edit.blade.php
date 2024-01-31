@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
<div class="page__wrapper">
    <form action="{{ route('invoices.update', $invoice->id) }}" method="post">
        @csrf
        @method('post')
        <div class="form__wrapper">
            <fieldset class="form__section">
                <h3 class="heading--splitted">
                    {{__('Klantgegevens')}}
                    <a href="{{ route('advertisers.edit', $invoice->advertiser->id ) }}" class="link">Klant bekijken</a>
                </h3>
                <x-form.input type="text" name="order_id" label="Ordernummer" :value="$order->id" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="project_id" label="Projectcode" :value="$order->project->id" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="advertiser_id" label="Klantnummer" :value="$invoice->advertiser->id" :extraAttributes="'disabled'" />

                <x-form.input type="text" name="name" label="Bedrijfsnaam" :value="$invoice->advertiser->name" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="contact" label="Contactpersoon" :value="$invoice->advertiser->contact" />

                <x-form.input type="text" name="po_box" label="Postbus" :value="$invoice->advertiser->po_box" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="postal_code" label="Postcode" :value="$invoice->advertiser->postal_code" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="city" label="Woonplaats" :value="$invoice->advertiser->city" :extraAttributes="'disabled'" />

                <x-form.input type="text" name="phone_number" label="Telefoonnumer" :value="$invoice->advertiser->phone" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="phone_mobile" label="Mobiel" :value="$invoice->advertiser->phone_mobile" :extraAttributes="'disabled'" />
            </fieldset>
            <fieldset class="form__section form__section-base">
                <h3>{{__('Factuurgegevens')}}</h3>

                <x-form.input type="text" name="invoice_id" label="Factuurnummer" :value="$invoice->id" :extraAttributes="'disabled'" />
                <x-form.input type="text" name="invoice_date" label="Factuurdatum" :value="$invoice->created_at->format('d-m-Y')" />
                <x-form.input type="text" name="post_method" label="Verzonden per" :value="$invoice->post_method" />
                <x-form.input type="text" name="first_reminder" label="Eerste herinnering" :value="$invoice->first_reminder" />
                <x-form.input type="text" name="second_reminder" label="Tweede herinnering" :value="$invoice->second_reminder" />
                <x-form.input type="text" name="third_reminder" label="Aanmaning" :value="$invoice->third_reminder" />
                <x-form.input type="text" name="seller" label="Verkoper" :extraAttributes="'disabled'" />
            </fieldset>
            <fieldset class="form__section">
                <h3>{{__('Incasso')}}</h3>

                <x-form.input type="text" name="date_of_action" label="Datum actie" />
                <x-form.input type="text" name="collection_agency" label="Incassobureau" />
                <x-form.input type="text" name="collection_date" label="Datum incassobureau" />
            </fieldset>

            <fieldset class="form__section notes full-width">
                <h3>{{__('Aantekeningen')}}</h3>
                <label class="field__label" for="comments">{{__('Aantekeningen')}}</label>
                <textarea name="comments" cols="30" rows="10"></textarea>
            </fieldset>
        </div>

        <x-form.submit />
    </form>
</div>
@endsection
