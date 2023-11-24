@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="page__info">
            <span class="info__box">
                <span class="box__title">
                  Startkrediet
                </span>
                <span class="box__text">
                    {{ $order->getInitialCredit() }}
                </span>
            </span>
            <span class="info__box">
                <span class="box__title">
                  Aantal regels
                </span>
                <span class="box__text">
                    {{ $order->orderlines->count() }}
                </span>
            </span>
            <span class="info__box">
                <span class="box__title">
                    Order totaal
                </span>
                <span class="box__text">
<<<<<<< HEAD
                    {{ @money($order->order_total_price) }}
=======
                    @money($order->order_total_price)
>>>>>>> 5e1d1ea239aa69d4aa05f02e93457c28f9511d7b
                </span>
            </span>
            <span class="info__box">
                <span class="box__title">
                  Resterend krediet
                </span>
                <span class="box__text">
                    {{ $order->calculateTotalCredit() }}
                </span>
            </span>
        </div>

        <div class="HeaderButtons">
            <div class="buttons">
                @if ($order->order_total_price < $order->advertiser->credit_limit)
                    <a href="{{ route('orderlines.create', [$order->id, $order->project->id]) }}" class="button button--action">{{__('Nieuwe regel')}}</a>
                @else
                    <h4>{{__('Limiet overschreden')}}</h4>
                @endif
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
                    <div></div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ($orderlines->count() > 0)
                @foreach ($orderlines as $orderline)
                    <li class="item {{ $orderline->trashed() ? 'item--thrashed' : 'item--default' }}">
                        <div class="item__content">
                            {{ $orderline->id }}
                        </div>
                        <div class="item__summary">
                            <div class="item__format field">
                                {{ $orderline->order->project->edition_name }}
                            </div>
                            <div class="item__format field">
<<<<<<< HEAD
                                {{ @money( $orderline->base_price ) }}
=======
                                @money( $orderline->base_price )
>>>>>>> 5e1d1ea239aa69d4aa05f02e93457c28f9511d7b
                            </div>
                            <div class="item__format field">
                                {{ $orderline->discount !== 0 && !is_null($orderline->discount) ? "€{$orderline->discount}" : '-' }}
                            </div>
                            <div class="item__format field">
<<<<<<< HEAD
                                {{ @money( $orderline->price_with_discount ) }}
=======
                                @money( $orderline->price_with_discount )
>>>>>>> 5e1d1ea239aa69d4aa05f02e93457c28f9511d7b
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    @if ( $orderline->trashed() )
                                        <a href="{{ route('orderlines.restore', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id] ) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">Herstellen</a>
                                    @else
                                        <a href="{{ route('orderlines.destroy', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach

                {{ $orderlines->links() }}
            @endif
        </ul>
    </div>
@endsection

