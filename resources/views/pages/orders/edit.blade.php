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
            <fieldset class="form__section">
                <h3>{{ __('Bevestigingsadres') }}</h3>

                <div class="field">
                    <label class="field__label" for="advertiser">{{ __('Klantnummer') }}</label>
                    <input type="text" name="advertiser" value="{{$order->advertiser->id}}" readonly>
                    @error('advertiser')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="user">{{ __('Verkoper') }}</label>
                    <input type="text" name="user" value="{{$order->user->first_name}} {{$order->user->last_name}}" readonly>
                    @error('user')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="company">{{ __('Bedrijfsnaam') }}</label>
                    <input type="text" name="company" value="{{$order->advertiser->title}}" readonly>
                    @error('company')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                {{-- <div class="field">
                    <label class="field__label" for="contact">{{ __('Contactpersoon') }}</label>
                <input type="text" name="contact" value="{{$order->contact->first_name}} {{$order->contact->last_name}}" readonly>
                @error('contact')
                <span class="form__message" role="alert">
                    <small>{{ $message }}</small>
                </span>
                @enderror
        </div> --}}

        <div class="field">
            <label class="field__label" for="po_box">{{ __('Postadres') }}</label>
            <input type="text" name="po_box" value="{{ $order->advertiser->address }}" readonly>
            @error('po_box')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="postal_code">{{ __('Postcode') }}</label>
            <input type="text" name="postal_code" value="{{ $order->advertiser->postal_code }}" readonly>
            @error('postal_code')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="city">{{ __('Woonplaats') }}</label>
            <input type="text" name="city" value="{{ $order->advertiser->city }}" readonly>
            @error('city')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="province">{{ __('Provincie') }}</label>
            <input type="text" name="province" value="{{ $order->advertiser->province }}" readonly>
            @error('province')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="country">{{ __('Land') }}</label>
            <input type="text" name="country" value="{{ $order->advertiser->province }}" readonly>
            @error('country')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="phone">{{ __('Telefoonnummer') }}</label>
            <input type="text" name="phone" value="{{$order->advertiser->phone}}" readonly>
            @error('phone')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>

        <div class="field">
            <label class="field__label" for="email">{{ __('E-mailadres') }}</label>
            <input type="email" name="email" value="{{$order->advertiser->email}}" readonly>
            @error('email')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
        </div>
        </fieldset>

        <fieldset class="form__section">
            <h3>{{ __('Opties') }}</h3>

            @if (!$selectedOrder->orderLines->isEmpty())
            <div class="field">
                <label class="field__label" for="layout">{{ __('Layout') }}</label>
                <input type="text" name="layout" value="{{ $order->layout->layout_name }}" readonly>
            </div>
            @endif


            <div class="field">
                <label class="field__label" for="order">{{ __('Ordernummer') }}</label>
                <input type="text" name="order" value="{{$order->id}}" readonly>
                @error('order')
                <span class="form__message" role="alert">
                    <small>{{ $message }}</small>
                </span>
                @enderror
            </div>

            {{-- <div class="field">
                        <label class="field__label" for="project_id">{{ __('Projectcode') }}</label>
            <input type="text" name="project_id" value="{{$order->project->name}}" disabled>
            @error('project_id')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
            @enderror
</div> --}}

<div class="form__section__row">

    <div class="field">
        <label class="field__label" for="material_received_at">{{__('Materiaal')}}</label>
        <div class="radio__group">
            <input id="material_received_true" type="radio" name="material_received_at" value="1" @if($order->material_received_at) checked @endif
            @if($order->notification_sent_at && !$order->seller_approved_at)
            @can('isSeller') disabled @endcan
            @endif
            >
            <label class="field__label" for="material_received_true">{{__('Ja')}}</label>

            <input id="material_received_false" type="radio" name="material_received_at" value="0" @if(!$order->material_received_at) checked @endif
            @if($order->notification_sent_at && !$order->seller_approved_at)
            @can('isSeller') disabled @endcan
            @endif
            >
            <label class="field__label" for="material_received_false">{{__('Nee')}}</label>
        </div>
    </div>

    @cannot('isSeller')
    <div class="field">
        <label class="field__label" for="approved_at">{{ __('Goedgekeurd') }}</label>
        <div class="radio__group">
            <input id="approved_at_true" type="radio" name="approved_at" value="1" @if($order->administration_approved_at) checked @endif
            @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan
            @endif
            >
            <label class="field__label" for="approved_at_true">{{__('Ja')}}</label>
            <input id="approved_at_false" type="radio" name="approved_at" value="0" @if(!$order->administration_approved_at) checked @endif
            @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan
            @endif
            >
            <label class="field__label" for="approved_at_false">{{__('Nee')}}</label>
        </div>
        @error('approved_at')
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
        @enderror
    </div>
    @endcannot




    @livewire('canceled-orders', ['order' => $order], key($order->id))

    <div class="field">
        <label class="field__label" for="order_method">{{__('Bevestiging')}}</label>
        <div class="radio__group">
            <input type="checkbox" name="method_approval[]" value="email" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
            <label class="field__label" for="email_checkbox">{{__('E-mail')}}</label>
            <input type="checkbox" name="method_approval[]" value="post" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
            <label class="field__label" for="post_checkbox">{{__('Post')}}</label>
        </div>
    </div>

    <div class="field">
        <label class="field__label" for="order_method">{{__('Factuur')}}</label>
        <div class="radio__group">
            <input type="checkbox" name="method_invoice[]" value="email" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
            <label class="field__label" for="email_checkbox">{{__('E-mail')}}</label>
            <input type="checkbox" name="method_invoice[]" value="post" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
            <label class="field__label" for="post_checkbox">{{__('Post')}}</label>
        </div>
    </div>

    <div class="field">
        <label class="field__label" for="order_file">{{__('Bijlage 1')}}</label>
        <input type="file" name="order_file" @if($order->notification_sent_at && !$order->seller_approved_at)
        @can('isSeller') disabled @endcan
        @endif
        >
    </div>

    <div class="field">
        <label class="field__label" for="order_file_2">{{__('Bijlage 2')}}</label>
        <input type="file" name="order_file_2" @if($order->notification_sent_at && !$order->seller_approved_at)
        @can('isSeller') disabled @endcan
        @endif
        >
    </div>


    {{-- <div class="field">
                    <label class="field__label" for="layout_name">{{ __('Layout') }}</label>
    @if($order->project->layout->count() == 0)
    {{__('Layout niet beschikbaar...')}}
    @else
    <input type="text" name="layout_name" value="{{$order->project->layout->layout_name}}" disabled>
    @error('layout_name')
    <span class="form__message" role="alert">
        <small>{{ $message }}</small>
    </span>
    @enderror
    @endif
</div> --}}

<div class="field">
    <label class="field__label" for="invoiced">{{ __('Gefactureerd') }}</label>
    <input type="text" name="invoiced" value="" readonly>
    @error('invoiced')
    <span class="form__message" role="alert">
        <small>{{ $message }}</small>
    </span>
    @enderror
</div>


<div class="field radio">
    <label class="field__label" for="incasso">{{ __('Incasso') }}</label>
    <div class="radio__group">
        <input type="radio" name="incasso" value="1" @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
        <label>{{__('Ja')}}</label>
        <input type="radio" name="incasso" value="0" @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
        <label>{{__('Nee')}}</label>
    </div>
</div>

</fieldset>

<fieldset class="form__section row">
    <h3>{{ __('Orderregels') }}</h3>
    <div class="field">
        <label class="field__label" for="order_rule">{{ __('Aantal orderregels') }}</label>
        <input type="text" name="order_rule" value="{{ $order->orderlines->count() }}" readonly>
        @error('order_rule')
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
        @enderror
    </div>

    <div class="field">
        <label class="field__label" for="order_total">{{ __('Order totaal') }}</label>
        <input type="text" name="order_total" value="{{ @money($order->order_total_price, 'EUR') }}" readonly>
        @error('order_total')
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
        @enderror
    </div>

</fieldset>

<fieldset class="form__section">
    <h3>{{__('Opmerkingen')}}</h3>
    <div class="field">
        <textarea cols="30" rows="10" name="comment_confirmation" placeholder="Vul opmerkingen in..." @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') readonly @endcan @endif>{{$order->comment_confirmation}}</textarea>
        @error('comment_confirmation')
        <span class="form__message" role="alert">
            <small>{{ $message }}</small>
        </span>
        @enderror
    </div>
</fieldset>
</div>
<div class="form__actions">
    <div class="buttons">
        @if (!$order->administration_approved_at && $order->seller_approved_at)
        <a href="{{ route('email.approval', $order->id) }}" class="button button--secondary">{{__('Opdrachtbevestiging')}}</a>
        @elseif ($order->administration_approved_at && $order->seller_approved_at)
        <a href="{{ route('invoices.create', $order->id) }}" class="button button--secondary">{{__('Factureer order')}}</a>
        @else
        @cannot('isSupervisor')
        <a href="{{ route('orders.seller.approve', $order->id) }}" class="button button--secondary">{{__('Goedkeuring')}}</a>
        @endcannot
        @endif
        <a href="{{ route('orders.preview', $order->id) }}" class="button button--secondary">{{__('Voorbeeld')}}</a>

        <button type="submit" class="button button--big button--primary">{{ __('Opslaan') }}</button>
    </div>
</div>
</form>
<div class="editions-base">
    <form action="{{ route('orderlines.store', $order->id) }}" method="post" class="edition-form">
        @csrf
        @method('post')
        @livewire('set-edition', ['order' => $order, 'projects' => $projects])
    </form>
    <div class="view-wrapper">
        <h3>{{__('Weergave')}}</h3>
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
                        {{ $orderline->project->name }}
                    </div>
                    <div class="item--cell">
                        <div class="item__format field">
                            {{ $orderline->project->edition_name }}
                        </div>
                        <div class="item__format field">
                            {{ @money( $orderline->base_price ) }}
                        </div>
                        <div class="item__format field">
                            {{-- {{ $orderline->discount !== 0 && !is_null(@money($orderline->discount)) ? "€ {$orderline->discount}" : '-' }} --}}
                            {{ @money($orderline->discount )}}
                        </div>
                        <div class="item__format field">
                            {{ @money( $orderline->price_with_discount) }}
                        </div>
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
                                <a href="{{{ route('orderlines.complaint', ['orderline_id' => $orderline->id]) }}}" class="btn">{{__('Klacht')}}</a>
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
</div>
@endsection
