@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<div class="page__wrapper">

    <div class="items__head">
        <div class="item item__head">
            <div class="item__content">
                <div>{{__('Titel')}}</div>
            </div>
            <div class="item__summery">
                <div>{{__('Prijs')}}</div>
                <div>{{__('Aangemaakt op')}}</div>
                <div>{{__('Laatst geupdate op')}}</div>
            </div>
            <div class="item__actions">
                <div>{{--__('Actions')--}}</div>
            </div>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($orders as $order)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('orders.edit', $order->id) }}" class="">
                        <h3>{{ __('Klantnaam') }}</h3>
                    </a>
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
                <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            <a href="{{route('orders.edit', $order->id)}}">{{__('Bewerken')}}</a>
                            <a href="#" class="delete" data-id="{{ $order->id }}" data-action="{{--route('orders.destroy', $order->id) --}}">Delete</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

{{ $orders->links() }}

@endsection
