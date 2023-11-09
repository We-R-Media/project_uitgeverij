@extends('layouts.app')


@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="items__view">
            @foreach ($invoices as $invoice)
                <li class="item">
                    <div class="item__content">
                        <a href="{{ route('invoices.edit', $invoice->id) }}">
                            <h3>{{ $invoice->id }}</h3>
                        </a>
                        <div class="item__actions">
                            <a href="{{ route('invoices.edit', $invoice->id) }}">{{__('Bewerken')}}</a>
                        </div>
                    </div>
                    <div class="item__summery">
                        <div class="field">
                            <label>{{__('Naam')}}</label>
                            {{$invoice->advertiser->name}}
                        </div>
                        <div class="field">
                            <label>{{__('Klantnummer')}}</label>
                            {{$invoice->advertiser->id}}
                        </div>
                        <div class="field">
                            <label>{{__('Factuurdatum')}}</label>
                            {{$invoice->invoice_date}}
                        </div>
                    </div>
                </li>
            @endforeach
        </div>
    </div>
@endsection