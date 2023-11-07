@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($orders as $order)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('orders.edit', $order->id) }}" class="">
                        <h3>{{ __('Klantnaam') }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('orders.edit', $order->id) }}">Bewerken</a>
                        <a href="#" class="delete" data-id="{{ $order->id }}" data-action="{{-- route('orders.destroy', $order->id) --}}">Verwijderen</a>
                    </div>
                </div>
                <div class="item__summery">
                    <div class="item__format field">
                        <label>Prijs</label>
                        {{$order->order_total_price}}
                    </div>
                    <div class="item__created field">
                        <label>Aangemaakt op</label>
                        {{$order->order_date}}
                    </div>
                    <div class="item__comments field">
                        <label>Laatst geupdate op</label>
                        {{$order->updated_at}}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

{{ $orders->links() }}

@endsection
