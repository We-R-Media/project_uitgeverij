@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
    <div class="page__wrapper">
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Factuurnummer')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('Adverteerder')}}</div>
                    <div>{{__('Klantnummer')}}</div>
                    <div>{{__('Datum')}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>
        <div class="items__view">
            @if ($invoices->count() > 0)
                @foreach ($invoices as $invoice)
                    <li class="item">
                        <div class="item__content">
                            <a href="{{ route('invoices.edit', $invoice->id) }}">
                                <h3>{{ $invoice->invoice_number }}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            @if ( !is_null($invoice->advertiser) && $invoice->advertiser->count() > 0)
                                <div class="item__format field">
                                    <label>{{__('Adverteerder')}}</label>
                                    {{$invoice->advertiser->name}}
                                </div>
                                <div class="item__pages field">
                                    <label>{{__('Adverteerder klantnummer')}}</label>
                                    {{$invoice->advertiser->id}}
                                </div>
                            @endif

                            <div class="field">
                                <label>{{__('Factuurdatum')}}</label>
                                {{$invoice->invoice_date}}
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{ route('invoices.edit', $invoice->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('invoices.destroy', $invoice->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen facturen gevonden')}}</p>
                </li>
            @endif
        </div>
        {{ $invoices->links() }}
    </div>
@endsection
