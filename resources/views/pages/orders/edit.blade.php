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
                            <input id="material_received_true" type="radio" name="material_received_at" @can('isSeller') disabled @endcan value="1" @if($order->material_received_at) checked @endif id="">
                            <label for="approved_at_true">{{__('Ja')}}</label>
                            <input id="material_received_true" type="radio" name="material_received_at" @can('isSeller') disabled @endcan value="0" @if(!$order->material_received_at) checked @endif id="">
                            <label for="approved_at_true">{{__('Nee')}}</label>
                        </div>
                    </div>

                    <div class="field field-alt">
                        <label for="approved_at">{{ __('Goedgekeurd') }}</label>
                        <div class="radio__group">
                            <input id="approved_at_true" type="radio" name="approved_at" @can('isSeller') disabled @endcan value="1" @if($order->administration_approved_at) checked @endif>
                            <label for="approved_at_true">{{__('Ja')}}</label>
                            <input id="approved_at_false" type="radio" name="approved_at" @can('isSeller') disabled @endcan value="0" @if(!$order->administration_approved_at) checked @endif>
                            <label for="approved_at_false">{{__('Nee')}}</label>
                        </div>
                        @error('approved_at')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>



                @livewire('canceled-orders', ['order' => $order], key($order->id))

                <div class="field field-alt">
                    <label for="order_method">{{__('Bevestiging')}}</label>
                    <div class="radio__group">
                        <input type="checkbox" name="method_approval[]" @can('isSeller') disabled @endcan value="email" checked>
                        <label for="email_checkbox">{{__('E-mail')}}</label>
                        <input type="checkbox" name="method_approval[]" @can('isSeller') disabled @endcan value="post" checked>
                        <label for="post_checkbox">{{__('Post')}}</label>
                    </div>
                </div>

                <div class="field field-alt">
                    <label for="order_method">{{__('Factuur')}}</label>
                    <div class="radio__group">
                        <input type="checkbox" name="method_invoice[]" @can('isSeller') disabled @endcan value="email" checked>
                        <label for="email_checkbox">{{__('E-mail')}}</label>
                        <input type="checkbox" name="method_invoice[]" @can('isSeller') disabled @endcan value="post" checked>
                        <label for="post_checkbox">{{__('Post')}}</label>
                    </div>
                </div>

                <div class="field field-alt">
                    <label for="order_file">{{__('Bijlage 1')}}</label>
                    <input type="file" name="order_file" id="" @can('isSeller') disabled @endcan>
                </div>

                <div class="field field-alt">
                    <label for="order_file_2">{{__('Bijlage 2')}}</label>
                    <input type="file" name="order_file_2" id="" @can('isSeller') disabled @endcan>
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
                        <input id="" type="radio" name="incasso" @can('isSeller') disabled @endcan value="1">
                        <label>{{__('Ja')}}</label>
                        <input id="" type="radio" name="incasso" @can('isSeller') disabled @endcan value="0">
                        <label>{{__('Nee')}}</label>
                    </div>
                </div>



                <div class="field field-alt">
                    <label for="invoiced">{{ __('Gefactureerd') }}</label>
                    <input id="" type="text" name="invoiced" value="" readonly>
                    @error('invoiced')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror


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
                    <input id="" type="text" name="order_total" value="{{ @money($order->order_total_price) }}" readonly>
                    @error('order_total')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="fields base">
                <h3>{{__('Opmerkingen')}}</h3>
                <textarea id="" cols="30" rows="10" name="comment_confirmation" placeholder="Vul opmerkingen in...">{{$order->comment_confirmation}}</textarea>
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
                    @cannot('isSeller' && 'isSupervisor')
                     <a href="{{ route('orders.preview', $order->id) }}" class="button button--action">{{__('Voorbeeld')}}</a>
                     <a href="{{ route('orders.seller.approve', $order->id) }}" class="button button--action">{{__('Goedkeuring')}}</a>
                    @endcannot
                @endif
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
    <form action="{{ route('orderlines.store', $order->id) }}" method="post">
        @csrf
        @method('post')

        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{__('Edities')}}</h3>
                @livewire('set-edition', ['order' => $order, 'projects' => $projects])
            </fieldset>
        </div>
    </form>
</div>
@endsection
