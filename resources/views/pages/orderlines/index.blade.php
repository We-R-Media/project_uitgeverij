@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('orderlines.create', [$order->project->id, $order->id]) }}" class="button button--action">{{__('Nieuwe regel')}}</a>
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Titel')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('Editie')}}</div>
                    <div>{{__('Basisprijs')}}</div>
                    <div>{{__('Korting')}}</div>
                    <div>{{__('Prijs met korting')}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ($order->orderLines->count() > 0)
                @foreach ($order->orderLines as $orderLine)
                    <li class="item">
                        <div class="item__content">
                            {{ $orderLine->id }}
                        </div>
                        <div class="item__summary">
                            <div class="item__format field">
                                {{ $orderLine->order->project->edition_name }}
                            </div>
                            <div class="item__format field">
                                {{ number_format($orderLine->base_price, 2)}}
                            </div>
                            <div class="item__format field">
                                {{$orderLine->discount}}%
                            </div>
                            <div class="item__format field">
                                {{ number_format($orderLine->price_with_discount, 2) }}
                            </div>
                        </div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endsection

