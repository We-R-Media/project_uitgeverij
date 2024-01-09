@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <div class="header__bar">
        <div class="bar__buttons">
            <a href="{{ route('orders.create', $advertiser->id) }}" class="button button--secondary">{{__('Nieuwe order')}}</a>
        </div>
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
        @forelse ($advertiser->orders as $order )
            <div class="items__row row--data">
                @if ($order->count() > 0)
                    <div class="item">
                        <div class="item--cell">
                            <a href="{{ route('orders.edit', $order->id) }}">
                                {{$order->id}}
                            </a>
                        </div>
                        <div class="item--cell">
                            <label class="cell__label">{{__('Prijs')}}</label>
                            {{ $order->advertiser->name }}
                        </div>
                        <div class="item--cell">
                            {{$order->advertiser->city }}
                        </div>
                        <div class="item--cell">
                            {{$order->advertiser->email}}
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <div class="items__row row--data">
                <p>{{__('Geen adverteerders gevonden')}}</p>
            </div>
        @endforelse
    </div>
@endsection
