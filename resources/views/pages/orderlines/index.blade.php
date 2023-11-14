@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('orderlines.create', $order->id) }}" class="button button--action">{{__('Nieuwe regel')}}</a>
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Titel')}}</div>
                </div>
                <div class="item__summary">
                    {{__('Basisbedrag')}}
                    {{__('Korting')}}
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
                                    {{$orderLine->base_price}}
                                </div>
                                <div class="item__format field">
                                    {{$orderLine->discount}}%
                                </div>
                            </div>
                        </li>
                    @endforeach                    
                @endif
            </ul>

        </div>
    </div>
@endsection