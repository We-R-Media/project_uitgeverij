@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Ordernummer')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('Bedrijfsnaam')}}</div>
                    <div>{{__('Plaatsnaam')}}</div>
                    <div>{{__('E-mailadres')}}</div>
                    {{-- <div>{{__('Projectcode')}}</div> --}}
                </div>
                <div class="item__actions">
                    <div></div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ( $orders->count() > 0 )
                @foreach ($orders as $order)
                    <li class="item">
                        <div class="item__content">
                            @if ( $order->advertiser )
                                <a href="{{ route('orders.edit', $order->id) }}" class="">
                                    <h3>{{ $order->id }}</h3>
                                </a>
                            @endif
                        </div>
                        {{-- {{dd(asset('images/uploads/' . $order->order_file))}} --}}
                        <div class="item__summary">
                            <div class="item__format field">
                                <label>{{__('Bedrijfsnaam')}}</label>
                                {{ $order->advertiser->name }}
                            </div>
                            <div class="item__created field">
                                <label>{{__('Plaatsnaam')}}</label>
                                {{$order->advertiser->city}}
                            </div>
                            <div class="item__format field">
                                {{$order->advertiser->email}}
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{ route('orders.edit', $order->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('orders.destroy', $order->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen orders gevonden')}}</p>
                </li>
            @endif
        </ul>
        {{ $orders->links() }}
    </div>
@endsection
