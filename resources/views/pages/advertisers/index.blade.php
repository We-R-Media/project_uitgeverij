@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <x-search-field model="advertisers" placeholder="Relatie zoeken..." />
            <div class="bar__buttons">
                <a href="{{ route('advertisers.create') }}" class="button button--secondary">{{__('Nieuwe relatie')}}</a>
            </div>
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Bedrijfsnaam')}}
                </div>
                <div class="item--cell">
                    {{__('Postadres')}}
                </div>
                <div class="item--cell">
                    {{__('Postcode')}}
                </div>
                <div class="item--cell">
                    {{__('Woonplaats')}}
                </div>
                <div class="item--cell">
                    {{__('E-mailadres')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($advertisers as $advertiser)
                <div class="items__row row--data {{ $advertiser->trashed() ? 'item--thrashed' : 'item--default' }}">
                    <div class="item--cell">
                        <Label class="cell__label">{{__('Bedrijfsnaam')}}</label>
                        <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                            {{ $advertiser->name }}
                        </a>
                    </div>
                    <div class="item--cell">
                        <Label class="cell__label">{{__('Postadres')}}</label>
                        {{$advertiser->po_box}}
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('Postcode')}}</label>
                        {{$advertiser->postal_code}}
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('Woonplaats')}}</label>
                        {{$advertiser->city}}
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('E-mailadres')}}</label>
                        {{$advertiser->email}}
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group advertisers__menu">
                                @if ( $advertiser->trashed() )
                                    <a href="{{ route('advertisers.restore', $advertiser->id ) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                @else
                                    <a href="{{ route('orders.create', $advertiser->id) }}">{{__('Order maken')}}</a>
                                    <a href="{{ route('advertisers.edit', $advertiser->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('advertisers.destroy', $advertiser->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen relaties gevonden')}}</p>
                </div>
            @endforelse
        </div>
        {{ $advertisers->links() }}
    </div>
@endsection
