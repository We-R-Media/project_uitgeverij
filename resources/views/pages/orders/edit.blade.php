@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <form  class="formContainer" action="{{route('orders.edit', $order->id)}}" method="post">
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Bevestigingsadres') }}</h3>

                <div class="field field-alt">
                    <label for="advertiser">{{ __('Klantnummer') }}</label>
                    <input id="" type="text" name="advertiser" value="{{$order->advertiser->id}}">
                    @error('advertiser')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="company" value="">
                    @error('company')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact">{{ __('Contactpersoon') }}</label>
                    <input id="" type="text" name="contact" value="{{ $order->advertiser->name }}">
                    @error('contact')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ $order->advertiser->po_box }}">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code" value="{{ $order->advertiser->postal_code }}">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city" value="{{ $order->advertiser->city }}">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province" value="{{ $order->advertiser->province }}">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="country">{{ __('Land') }}</label>
                    <input id="" type="text" name="country" value="">
                    @error('country')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="text" name="phone" value="{{$order->advertiser->phone}}">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email" value="{{$order->advertiser->email}}">
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
                    <label for="project_id">{{ __('Projectcode') }}</label>
                    <input id="" type="text" name="project_id" value="{{ $order->project->id }}" disabled>
                    @error('project_id')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="invoiced">{{ __('Gefactureerd') }}</label>
                    <input id="" type="text" name="invoiced" value="">
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
                        <label for="canceled">Ja</label>
                        <input id="" type="radio" name="canceled" value="0">
                        <label for="canceled">Nee</label>
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
                        <label>Ja</label>
                        <input id="" type="radio" name="incasso" value="0">
                        <label>Nee</label>
                    </div>
                    @error('incasso')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="order_number">{{ __('Ordernummer') }}</label>
                    <input id="" type="text" name="order_number" value="{{ $order->id }}">
                    @error('po_box')
                        <span class="order_number" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="order_total">{{ __('Ordertotaal') }}</label>
                    <input id="" type="text" name="order_total" value="{{$order->order_total_price}}">
                    @error('order_total')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="order_rule">{{ __('Orderregels') }}</label>
                    <input id="" type="text" name="order_rule" value="">
                    @error('order_rule')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="invoiced">{{ __('Gefactureerd') }}</label>
                    <input id="" type="text" name="invoiced" value="">
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
                <a href="{{route('pdf.generate')}}" class="button button__secondary">{{ __('Genereer PDF') }}</a>
                <a href="{{ route('invoices.create', $order->id) }}" class="button button--action">Factureer order</a>
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
