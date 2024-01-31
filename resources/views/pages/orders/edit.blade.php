@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
<div class="page__wrapper">
    <div class="header__bar">
        <div class="bar__buttons">
            @if ($order->notification_sent_at && !$order->seller_approved_at)
                <form action="{{ route('orders.seller.approved', $order->id) }}" method="post">
                    @csrf
                    @can('isSupervisor')
                        <button value="1" name="seller_approved_at" class="button button--secondary">{{__('Goedkeuren')}}</button>
                    @endcan
                </form>
            @endif
        </div>
    </div>
    <form action="{{route('orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form__wrapper">
            <fieldset class="form__section section--narrow">
                @if( $order->notification_sent_at && !$order->seller_approved_at )
                    <div class="section__block">
                        <div class="message__box">
                            <p>Order wacht op goedkeuring</p>
                        </div>
                    </div>
                @endif
                <div class="section__block">
                    <h3>{{ __('Bevestigingsadres') }}</h3>

                    <x-form.input type="text" name="advertiser_id" label="Klantnummer" :value="$order->advertiser->id" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="user" label="Verkoper" :value="$order->user->first_name" :extraAttributes="'readonly'" /> {{-- fix fix fix --}}
                        <x-form.input type="text" name="company" label="Bedrijfsnaam" :value="$order->advertiser->title" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="po_box" label="Postbus" :value="$order->advertiser->address" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="postal_code" label="Postcode" :value="$order->advertiser->postal_code" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="city" label="Woonplaats" :value="$order->advertiser->city" :extraAttributes="'readonly'" />
                        <x-form.input type="text" name="province" label="Provincie" :value="$order->advertiser->province" :extraAttributes="'readonly'" />
                        {{-- <x-form.input type="text" name="country" label="Land" :value="$order->advertiser->country" :extraAttributes="'readonly'" /> --}}
    
                        <x-form.input type="text" name="phone" label="Telefoonnummer" :value="$order->advertiser->phone" :extraAttributes="'readonly'" />
                        <x-form.input type="email" name="email" label="E-mailadres" :value="$order->advertiser->email" :extraAttributes="'readonly'" />
                </div>
                <div class="section__block">
                    <h3>{{__('Opmerkingen')}}</h3>
                    <div class="field">
                        <textarea cols="30" rows="10" name="comment_confirmation" placeholder="Vul opmerkingen in..." @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') readonly @endcan @endif>{{$order->comment_confirmation}}</textarea>
                        @error('comment_confirmation')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset class="form__section section--big">
                <div class="section__block">
                    <div class="view-wrapper">
                        <div class="items__table">
                            <div class="items__row row--head">
                                <div class="item--cell">
                                    {{__('Projectcode')}}
                                </div>
                                <div class="item--cell">
                                    {{__('Editie')}}
                                </div>
                                <div class="item--cell">
                                    {{__('Basisprijs')}}
                                </div>
                                <div class="item--cell">
                                    {{__('Korting')}}
                                </div>
                                <div class="item--cell">
                                    {{__('Prijs met korting')}}
                                </div>
                                <div class="item--action">
                                    {{-- Spacer for actions --}}
                                </div>
                            </div>
                            @forelse($orderlines as $orderline)
                                <div class="items__row row--data {{ $orderline->trashed() ? 'item--thrashed' : 'item--default' }}">
                                    <div class="item--cell">
                                        <label class="cell__label">{{__('Projectcode')}}</label>
                                        {{ $orderline->project->name }}
                                    </div>
                                    <div class="item--cell">
                                        <label class="cell__label">{{__('Projectcode')}}</label>
                                        {{ $orderline->project->edition_name }}
                                    </div>
                                    <div class="item--cell">
                                        <label class="cell__label">{{__('Basisprijs')}}</label>
                                        {{ money( $orderline->base_price ) }}
                                    </div>
                                    <div class="item--cell">
                                        <label class="cell__label">{{__('Korting')}}</label>
                                        {{ money($orderline->discount )}}
                                    </div>
                                    <div class="item--cell">
                                        <label class="cell__label">{{__('Prijs met korting')}}</label>
                                        {{ money( $orderline->price_with_discount) }}
                                    </div>
                                    <div class="item--actions">
                                        <div class="actions__button">
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512">
                                                    <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" /></svg>
                                            </div>
                                            <div class="actions__group">
                                                @if ( $orderline->trashed() )
                                                    <a href="{{ route('orderlines.restore', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id] ) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                                @endif

                                                <a href="{{ route('orderlines.destroy', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                                <a href="{{ route('invoices.create', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id]) }}" class="btn">{{__('Factureren')}}</a>
                                                <a href="{{ route('orderlines.complaint', ['orderline_id' => $orderline->id]) }}}" class="btn">{{__('Klacht')}}</a>
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
                        {{ $orderlines->links() }}
                    </div>
                    <form action="{{ route('orderlines.store', $order->id) }}" method="post">
                        @csrf
                        @method('post')

                        @livewire('set-edition', ['order' => $order, 'projects' => $projects])
                    </form>
                </div>
            </fieldset>
        </div>
    </div>

    <div class="form__actions">
        <div class="buttons">
            <button type="submit" class="button button--big button--primary">{{ __('Opslaan') }}</button>

            <a href="{{ route('orders.preview', $order->id) }}" class="button button--big button--secondary">{{__('Voorbeeld')}}</a>

            @if (!$order->administration_approved_at && $order->seller_approved_at)
                <a href="{{ route('email.approval', $order->id) }}" class="button button--big button--secondary">{{__('Opdrachtbevestiging')}}</a>
            @elseif ($order->administration_approved_at && $order->seller_approved_at)
                <a href="{{ route('invoices.create', $order->id) }}" class="button button--big button--secondary">{{__('Factureer order')}}</a>
            @else
                @cannot('isSupervisor')
                    @if( $order->notification_sent_at && !$order->seller_approved_at )
                        <span class="button button--info">{{__('Wacht op goedkeuring')}}</span>
                    @else
                        <a href="{{ route('orders.seller.approve', $order->id) }}" class="button button--big button--secondary">{{__('Goedkeuring')}}</a>
                    @endif
                @endcannot
            @endif

        </div>
    </div>
</form>
@endsection