@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">



    <form  class="formContainer" action="{{route('orders.update', $order->id)}}" method="post">
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
                    <label for="company">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="company" value="{{$order->advertiser->title}}" readonly>
                    @error('company')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact">{{ __('Contactpersoon') }}</label>
                    <input id="" type="text" name="contact" value="{{$order->contact->first_name}} {{$order->contact->last_name}}" readonly>
                    @error('contact')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ $order->advertiser->po_box }}" readonly>
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

            <fieldset class="fields options">
                <h3>{{ __('Opties') }}</h3>

                <div class="field field-alt">
                    <label for="approved_at">{{ __('Goedgekeurd') }}</label>
                    <div class="radio__group">
                        <input id="approved_at_true" type="radio" name="approved_at" value="1" @if($order->approved_at) checked @endif>
                        <label for="approved_at_true">{{__('Ja')}}</label>
                        <input id="approved_at_false" type="radio" name="approved_at" value="0" @if(!$order->approved_at) checked @endif>
                        <label for="approved_at_false">{{__('Nee')}}</label>
                    </div>
                    @error('approved_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
                <div class="field field-alt">
                    <label for="order_date">{{ __('Order datum') }}</label>
                    <input class="field__date" id="order_date" type="datetime-local" name="order_date" value="{{ old('order_date', $order->order_date) }}">
                    @error('order_date')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="deactivated_at">{{ __('Annuleren op') }}</label>
                    <input class="field__date" id="deactivated_at" type="datetime-local" name="deactivated_at" value="{{ old('order_date', $order->deactivated_at) }}">
                    @error('deactivated_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="project_id">{{ __('Projectcode') }}</label>
                    <input id="" type="text" name="project_id" value="{{$order->project->id}}" disabled>
                    @error('project_id')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
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

                <div class="field field-alt">
                    <label for="canceled">{{ __('Geannuleerd') }}</label>
                    <div class="radio__group">
                        <input id="" type="radio" name="canceled" value="1">
                        <label for="canceled">{{__('Ja')}}</label>
                        <input id="" type="radio" name="canceled" value="0">
                        <label for="canceled">{{__('Nee')}}</label>
                    </div>
                    @error('canceled')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="canceldate">{{ __('Annuleringsdatum') }}</label>
                    <input id="" type="text" name="canceldate" value="">
                    @error('canceldate')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="incasso">{{ __('Incasso') }}</label>
                    <div class="radio__group">
                        <input id="" type="radio" name="incasso" value="1">
                        <label>{{__('Ja')}}</label>
                        <input id="" type="radio" name="incasso" value="0">
                        <label>{{__('Nee')}}</label>
                    </div>
                    @error('incasso')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="field field-alt">
                    <label for="order_number">{{ __('Ordernummer') }}</label>
                    <input id="" type="text" name="order_number" value="{{ $order->id }}" readonly>
                    @error('po_box')
                        <span class="order_number" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="order_total">{{ __('Ordertotaal') }}</label>
                    <input id="" type="text" name="order_total" value="{{ $order->order_total_price }}">
                    @error('order_total')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                {{-- @if ($order->order_total_price > $order->advertiser->credit_limit)@endif --}}

                <div class="field field-alt">
                    <label for="order_rule">{{ __('Orderregels') }}</label>
                    <input id="" type="text" name="order_rule" value="" readonly>
                    @error('order_rule')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
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

            <fieldset class="field notes full-width">
                <label for="comment_confirmation">{{ __('Opmerkingen') }}</label>
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
                @if ($order->approved_at)
                    <a href="{{ route('email.approval', $order->id) }}" class="button button--action">{{__('Verstuur akkoord')}}</a>
                @else
                    <a href="{{ route('invoices.create', $order->id) }}" class="button button--action">{{__('Factureer order')}}</a>
                @endif
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
