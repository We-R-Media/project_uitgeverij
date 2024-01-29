@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <x-search-field model="orders" placeholder="Order zoeken..." />
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Ordernummer')}}
                </div>
                <div class="item--cell">
                    {{__('Bedrijfsnaam')}}
                </div>
                <div class="item--cell">
                    {{__('Plaatsnaam')}}
                </div>
                <div class="item--cell">
                    {{__('E-mailadres')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($orders as $order)
                <div class="items__row row--data">
                    <div class="item--cell">
                        @if ( $order->advertiser )
                            <a href="{{ route('orders.edit', $order->id) }}" class="">
                                {{ $order->id }}
                            </a>
                        @endif
                    </div>
                    <div class="item--cell">
                        <div class="item__format field">
                            <label>{{__('Bedrijfsnaam')}}</label>
                            {{ $order->advertiser->name }}
                        </div>
                    </div>
                    <div class="item--cell">
                        <div class="item__created field">
                            <label>{{__('Plaatsnaam')}}</label>
                            {{$order->advertiser->city}}
                        </div>
                    </div>
                    <div class="item--cell">
                        <div class="item__format field">
                            {{$order->advertiser->email}}
                        </div>
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn">{{__('Bewerken')}}</a>
                                <a href="{{ route('orders.destroy', $order->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen orders gevonden')}}</p>
                </div>
            @endforelse
        </div>
        {{ $orders->links() }}
    </div>
@endsection
