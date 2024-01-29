@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

    <div class="page__wrapper">
        <form action="{{ route('invoices.store') }}" method="post" >
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <x-form.input type="text" name="advertiser_id" label="Klantnummer" :value="$order->advertiser->id" />
                    <x-form.input type="text" name="name" label="Bedrijfsnaam" :value="$order->advertiser->name" />
                    <x-form.input type="text" name="order_id" label="Ordernummer" :value="$order->id" />
                    <x-form.input type="text" name="project_id" label="Projectcode" :value="$order->project->id" />
                    <x-form.input type="text" name="po_box" label="Postadres" :value="$order->advertiser->po_box" />
                    <x-form.input type="text" name="postal_code" label="Postcode" :value="$order->advertiser->postal_code" />
                    <x-form.input type="text" name="city" label="Woonplaats" :value="$order->advertiser->city" />
                </fieldset>
            </div>


            <div class="form__actions">
                <div class="buttons">
                    <button type="submit" class="button button--big button--primary">Opslaan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
