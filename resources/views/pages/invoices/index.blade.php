@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Factuurnummer')}}
                </div>
                <div class="item--cell">
                    {{__('Factuurnummer')}}
                </div>
                <div class="item--cell">
                    {{__('Factuurdatum')}}
                </div>
                <div class="item--cell">
                    {{__('Bedrijfsnaam')}}
                </div>
                <div class="item--cell">
                    {{__('Projectcode')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($invoices as $invoice)
                <div class="items__row row--data">
                    <div class="item--cell">
                        <a href="{{ route('invoices.edit', $invoice->id) }}">
                            {{ $invoice->invoice_number }}
                        </a>
                    </div>
                    <div class="item--cell">
                        <div class="field">
                            <label>{{__('Factuurnummer')}}</label>
                            {{$invoice->id}}
                        </div>
                        <div class="field">
                            <label>{{__('Factuurdatum')}}</label>
                            {{$invoice->invoice_date}}
                        </div>
                        @if ( !is_null($invoice->advertiser) && $invoice->advertiser->count() > 0)
                            <div class="item__format field">
                                <label>{{__('Bedrijfsnaam')}}</label>
                                {{$invoice->advertiser->name}}
                            </div>
                            <div class="item__format field">
                                <label>{{__('Projectcode')}}</label>
                                {{$invoice->project->name}}
                            </div>
                        @endif
                    </div>
                    <div class="item--actions">
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
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen facturen gevonden')}}</p>
                </div>
            @endforelse
        </div>
        {{ $invoices->links() }}
    </div>
@endsection
