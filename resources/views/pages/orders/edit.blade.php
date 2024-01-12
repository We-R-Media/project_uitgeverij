@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">

    <div class="header__bar">
        <div class="buttons">
            @if ($order->notification_sent_at && !$order->seller_approved_at)
            <form action="{{ route('orders.seller.approved', $order->id) }}" method="post">
                @csrf
                @can('isSupervisor')
                    <button value="1" name="seller_approved_at" class="button button--action">{{__('Goedkeuren')}}</button>
                @endcan
            </form>
            @endif
        </div>
    </div>

    <form  class="formContainer" action="{{route('orders.update', $order->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')


    <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Bevestigingsadres') }}</h3>

                <div class="field field-alt">
                    <label for="advertiser">{{ __('Klantnummer') }}</label>
                    <input id="" type="text" name="advertiser" value="{{$order->advertiser->id}}" readonly>
                    @error('advertiser')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="user">{{ __('Verkoper') }}</label>
                    <input id="" type="text" name="user" value="{{$order->user->first_name}} {{$order->user->last_name}}" readonly>
                    @error('user')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="company" value="{{$order->advertiser->title}}" readonly>
                    @error('company')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                {{-- <div class="field field-alt">
                    <label for="contact">{{ __('Contactpersoon') }}</label>
                    <input id="" type="text" name="contact" value="{{$order->contact->first_name}} {{$order->contact->last_name}}" readonly>
                    @error('contact')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div> --}}

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ $order->advertiser->address }}" readonly>
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code" value="{{ $order->advertiser->postal_code }}" readonly>
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city" value="{{ $order->advertiser->city }}" readonly>
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province" value="{{ $order->advertiser->province }}" readonly>
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="country">{{ __('Land') }}</label>
                    <input id="" type="text" name="country" value="{{ $order->advertiser->province }}" readonly>
                    @error('country')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="text" name="phone" value="{{$order->advertiser->phone}}" readonly>
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email" value="{{$order->advertiser->email}}" readonly>
                    @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="fields base">
                    <h3>{{ __('Opties') }}</h3>

                    @if (!$selectedOrder->orderLines->isEmpty())
                    <div class="field field-alt">
                        <label for="layout">{{ __('Layout') }}</label>
                        <input type="text" name="layout" value="{{ $order->layout->layout_name }}" id="" readonly>
                    </div>
                    @endif
                

                    <div class="field field-alt">
                        <label for="order">{{ __('Ordernummer') }}</label>
                        <input id="" type="text" name="order" value="{{$order->id}}" readonly>
                        @error('order')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="field field-alt">
                        <label for="project_id">{{ __('Projectcode') }}</label>
                        <input id="" type="text" name="project_id" value="{{$order->project->name}}" disabled>
                        @error('project_id')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div> --}}

                    <div class="fields__row">

                        <div class="field field-alt">
                            <label for="material_received_at">{{__('Materiaal')}}</label>
                            <div class="radio__group">
                                <input id="material_received_true" type="radio" name="material_received_at" value="1"
                                       @if($order->material_received_at) checked @endif
                                       @if($order->notification_sent_at && !$order->seller_approved_at)
                                       @can('isSeller') disabled @endcan
                                       @endif
                                >
                                <label for="material_received_true">{{__('Ja')}}</label>
                        
                                <input id="material_received_false" type="radio" name="material_received_at" value="0"
                                       @if(!$order->material_received_at) checked @endif
                                       @if($order->notification_sent_at && !$order->seller_approved_at)
                                       @can('isSeller') disabled @endcan
                                       @endif
                                >
                                <label for="material_received_false">{{__('Nee')}}</label>
                            </div>
                        </div>                        

                    @cannot('isSeller')
                    <div class="field field-alt">
                        <label for="approved_at">{{ __('Goedgekeurd') }}</label>
                        <div class="radio__group">
                            <input id="approved_at_true" type="radio" name="approved_at" value="1" 
                                @if($order->administration_approved_at) checked @endif 
                                @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan 
                                @endif
                                >
                            <label for="approved_at_true">{{__('Ja')}}</label>
                            <input id="approved_at_false" type="radio" name="approved_at" value="0" 
                                @if(!$order->administration_approved_at) checked @endif 
                                @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan 
                                @endif
                                >
                            <label for="approved_at_false">{{__('Nee')}}</label>
                        </div>
                        @error('approved_at')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    @endcannot




                @livewire('canceled-orders', ['order' => $order], key($order->id))

                <div class="field field-alt">
                    <label for="order_method">{{__('Bevestiging')}}</label>
                    <div class="radio__group">
                        <input type="checkbox" name="method_approval[]" value="email" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label for="email_checkbox">{{__('E-mail')}}</label>
                        <input type="checkbox" name="method_approval[]" value="post" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label for="post_checkbox">{{__('Post')}}</label>
                    </div>
                </div>

                <div class="field field-alt">
                    <label for="order_method">{{__('Factuur')}}</label>
                    <div class="radio__group">
                        <input type="checkbox" name="method_invoice[]" value="email" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label for="email_checkbox">{{__('E-mail')}}</label>
                        <input type="checkbox" name="method_invoice[]" value="post" checked @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label for="post_checkbox">{{__('Post')}}</label>
                    </div>
                </div>

                <div class="field field-alt">
                    <label for="order_file">{{__('Bijlage 1')}}</label>
                    <input type="file" name="order_file" id=""
                    @if($order->notification_sent_at && !$order->seller_approved_at)
                    @can('isSeller') disabled @endcan
                    @endif
                    >
                </div>

                <div class="field field-alt">
                    <label for="order_file_2">{{__('Bijlage 2')}}</label>
                    <input type="file" name="order_file_2" id=""
                    @if($order->notification_sent_at && !$order->seller_approved_at)
                    @can('isSeller') disabled @endcan
                    @endif
                    >
                </div>


                {{-- <div class="field field-alt">
                    <label for="layout_name">{{ __('Layout') }}</label>
                    @if($order->project->layout->count() == 0)
                    {{__('Layout niet beschikbaar...')}}
                    @else
                    <input id="" type="text" name="layout_name" value="{{$order->project->layout->layout_name}}" disabled>
                    @error('layout_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                    @endif
                </div> --}}

                <div class="field field-alt">
                    <label for="invoiced">{{ __('Gefactureerd') }}</label>
                    <input id="" type="text" name="invoiced" value="" readonly>
                    @error('invoiced')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="field field-alt radio">
                    <label for="incasso">{{ __('Incasso') }}</label>
                    <div class="radio__group">
                        <input id="" type="radio" name="incasso" value="1" @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label>{{__('Ja')}}</label>
                        <input id="" type="radio" name="incasso" value="0" @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') disabled @endcan @endif>
                        <label>{{__('Nee')}}</label>
                    </div>
                </div>

            </fieldset>

            <fieldset class="fields row">
                <h3>{{ __('Orderregels') }}</h3>
                <div class="field field-alt">
                    <label for="order_rule">{{ __('Aantal orderregels') }}</label>
                    <input id="" type="text" name="order_rule" value="{{ $order->orderlines->count() }}" readonly>
                    @error('order_rule')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="order_total">{{ __('Order totaal') }}</label>
                    <input id="" type="text" name="order_total" value="{{ money($order->order_total_price) }}" readonly>
                    @error('order_total')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

            </fieldset>

            <fieldset class="fields base">
                <h3>{{__('Opmerkingen')}}</h3>
                <textarea id="" cols="30" rows="10" name="comment_confirmation" placeholder="Vul opmerkingen in..." @if($order->notification_sent_at && !$order->seller_approved_at) @can('isSeller') readonly @endcan @endif>{{$order->comment_confirmation}}</textarea>
                @error('comment_confirmation')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </fieldset>
        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                @if (!$order->administration_approved_at && $order->seller_approved_at)
                    <a href="{{ route('email.approval', $order->id) }}" class="button button--action">{{__('Opdrachtbevestiging')}}</a>
                @elseif ($order->administration_approved_at && $order->seller_approved_at)
                    <a href="{{ route('invoices.create', $order->id) }}" class="button button--action">{{__('Factureer order')}}</a>
                @else 
                     @cannot('isSupervisor')
                         <a href="{{ route('orders.seller.approve', $order->id) }}" class="button button--action">{{__('Goedkeuring')}}</a>
                     @endcannot
                @endif
                <a href="{{ route('orders.preview', $order->id) }}" class="button button--action">{{__('Voorbeeld')}}</a>

                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
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
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Projectcode')}}</div>
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
                        {{ $orderline->project->name }}
                    </div>
                    <div class="item__summary">
                        <div class="item__format field">
                            {{ $orderline->project->edition_name }}
                        </div>
                        <div class="item__format field">
                            {{ money( $orderline->base_price ) }}
                        </div>
                        <div class="item__format field">
                            {{-- {{ $orderline->discount !== 0 && !is_null(money($orderline->discount)) ? "€ {$orderline->discount}" : '-' }} --}}
                            {{ money($orderline->discount )}}
                        </div>
                        <div class="item__format field">
                            {{ money( $orderline->price_with_discount) }}
                        </div>
                    </div>
                    <div class="item__actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                @if ( $orderline->trashed() )
                                    <a href="{{ route('orderlines.restore', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id] ) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                @endif

                                    <a href="{{ route('orderlines.destroy', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                    <a href="{{ route('invoices.create', ['order_id' => $orderline->order->id, 'regel_id' => $orderline->id]) }}" class="btn">{{__('Factureren')}}</a>
                                    {{-- <a href="{{{ route('orderlines.complaint', ['orderline_id' => $orderline->id]) }}}" class="btn">{{__('Klacht')}}</a> --}}
                                    @livewire('create-complaint', ['orderline' => $orderline], key($orderline->id))
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
            {{ $orderlines->links() }}
        @endif
        </ul>
      </div>
    </div>
</div>
@endsection
