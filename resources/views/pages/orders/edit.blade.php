@extends('layouts.app')

@section('title',  $pageTitleSection)

@section('content')

<<<<<<< HEAD

    <form  class="formContainer" action="{{route('orders.create')}}" method="post">
        <div class="formBlock">
            <h3>Bevestigingsadres</h3>

            <input type="text" class="@error ('advertiser') is-invalid @enderror" value="{{ old('advertiser') }}" name="advertiser" placeholder="Vul klantnummer in..." id="">
                @if($errors->has('advertiser'))
                    <p class="error-message">{{$errors->first('advertiser')}}</p>
                @endif
            <input type="text" class="@error ('company') is-invalid @enderror" value="{{ old('company') }}" name="company" placeholder="Vul bedrijfsnaam in..." id="">
                @if($errors->has('company'))
                    <p class="error-message">{{$errors->first('company')}}</p>
                @endif

            <input type="text" class="@error ('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" placeholder="Vul contact in..." id="">
                @if($errors->has('contact'))
                    <p class="error-message">{{$errors->first('contact')}}</p>
                @endif

            <input type="text" class="@error ('po_box') is-invalid @enderror" value="{{ old('po_box') }}" name="po_box" placeholder="Vul postadres in..." id="">
                @if($errors->has('po_box'))
                    <p class="error-message">{{$errors->first('po_box')}}</p>
                @endif

            <input type="text" class="@error ('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" name="postal_code" placeholder="Vul postcode in..." id="">
                @if($errors->has('postal_code'))
                    <p class="error-message">{{$errors->first('postal_code')}}</p>
                @endif

            <input type="text" class="@error ('city') is-invalid @enderror" value="{{ old('city') }}" name="city" placeholder="Vul plaats in..." id="">
                @if($errors->has('city'))
                    <p class="error-message">{{$errors->first('city')}}</p>
                @endif


            <input type="text" class="@error ('province') is-invalid @enderror" value="{{ old('province') }}" name="province" placeholder="Vul provincie in..." id="">
                @if($errors->has('province'))
                    <p class="error-message">{{$errors->first('province')}}</p>
                @endif

            <input type="text" class="@error ('country') is-invalid @enderror" value="{{ old('country') }}" name="country" placeholder="Vul land in..." id="">
                @if($errors->has('country'))
                    <p class="error-message">{{$errors->first('country')}}</p>
                @endif

            <input type="email" class="@error ('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Vul email in..." id="">
                @if($errors->has('email'))
                    <p class="error-message">{{$errors->first('email')}}</p>
                @endif
        </div>
    {{--
        <div class="formBlock">
            <h3>Afwijkend factuuradres</h3>
            <input type="text" name="advertiser" placeholder="Vul klantnummer in..." id="">
            <input type="text" name="company" placeholder="Vul bedrijfsnaam in..." id="">
            <input type="text" name="contact" placeholder="Vul contact in..." id="">
            <input type="text" name="mailbox" placeholder="Vul postadres in..." id="">
            <input type="text" name="postal_code" placeholder="Vul postcode in..." id="">
            <input type="text" name="province" placeholder="Vul provincie in..." id="">
            <input type="text" name="country" placeholder="Vul land in..." id="">
            <input type="email" name="email" placeholder="Vul email in..." id="">
        </div> --}}

    </form>

    <a href="{{route('pdf.generate')}}">Genereer PDF</a>

=======
<div class="page__wrapper">
    <form  class="formContainer" action="{{route('orders.edit', $order->id)}}" method="post">
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Bevestigingsadres') }}</h3>

                <div class="field field-alt">
                    <label for="advertiser">{{ __('Klantnummer') }}</label>
                    <input id="" type="text" name="advertiser" value="">
                    @error('advertiser')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="company" value="{{ old('company') }}">
                    @error('company')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact">{{ __('Contactpersoon') }}</label>
                    <input id="" type="text" name="contact" value="{{ old('contact') }}">
                    @error('contact')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ old('po_box') }}">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code" value="{{ old('postal_code') }}">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city" value="{{ old('city') }}">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province" value="{{ old('province') }}">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="country">{{ __('Land') }}</label>
                    <input id="" type="text" name="country" value="{{ old('country') }}">
                    @error('country')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="text" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email" value="{{ old('email') }}">
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
                    <label for="layout">{{ __('Layout') }}</label>
                    <input id="" type="text" name="layout" value="">
                    @error('layout')
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
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
>>>>>>> 5af2bf4502a2bd22be2b676e93754b1fc60e7890
@endsection
