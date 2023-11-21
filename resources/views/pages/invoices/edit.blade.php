@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
<div class="page__wrapper">
    <form action="{{ route('invoices.update', $invoice->id) }}" method="post" class="formContainer">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3 class="heading--splitted">
                    {{__('Klantgegevens')}}
                    <a href="{{ route('advertisers.edit', $invoice->advertiser->id ) }}" class="link">Klant bekijken</a>
                </h3>

                <div class="field field-alt">
                    <label for="advertiser_id">{{__('Klantnummer')}}</label>
                    <input type="text" name="advertiser_id" value="{{$invoice->advertiser->id}}" id="advertiser_id" disabled>
                    @error('advertiser_id')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="name">{{__('Bedrijfsnaam')}}</label>
                    <input type="text" name="name" value="{{$invoice->advertiser->name}}" id="name" disabled>
                    @error('name')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact">{{__('Contactpersoon')}}</label>
                    <input type="text" name="contact" value="{{$invoice->advertiser->contact}}" id="contact">
                    @error('contact')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{__('Postadres')}}</label>
                    <input type="text" name="po_box" value="{{$invoice->advertiser->po_box}}" id="po_box" disabled>
                    @error('po_box')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="field field-alt">
                    <label for="postal_code">{{__('Postadres')}}</label>
                    <input type="text" name="postal_code" value="{{$invoice->advertiser->postal_code}}" id="postal_code" disabled>
                    @error('postal_code')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="field field-alt">
                    <label for="city">{{__('Postadres')}}</label>
                    <input type="text" name="city" value="{{$invoice->advertiser->city}}" id="city" disabled>
                    @error('city')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_number">{{__('Telefoonnumer')}}</label>
                    <input type="text" name="phone_number" value="{{$invoice->advertiser->phone}}" id="phone_number" disabled>
                    @error('phone_number')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{__('Mobiel')}}</label>
                    <input type="text" name="phone_mobile" value="{{$invoice->advertiser->phone_mobile}}" id="phone_mobile" disabled>
                    @error('phone_mobile')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

            </fieldset>

            <fieldset class="fields fields-base">

                <h3>{{__('Factuurgegevens')}}</h3>

                <div class="field field-alt">
                    <label for="invoice_id">{{__('Factuurnummer')}}</label>
                    <input type="number" name="invoice_id" value="{{$invoice->id}}" id="invoice_id" disabled>
                    @error('invoice_id')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="invoice_date">{{__('Factuurdatum')}}</label>
                    <input type="text" name="invoice_date" value="{{$invoice->created_at->format('d-m-Y')}}" id="invoice_date">
                    @error('invoice_date')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>



                <div class="field field-alt">
                    <label for="post_method">{{__('Verzonden per')}}</label>
                    <input type="text" name="post_method" value="{{$invoice->post_method}}" id="post_method">
                    @error('post_method')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="first_reminder">{{__('Eerste herinnering')}}</label>
                    <input type="text" name="first_reminder" value="{{$invoice->first_reminder}}" id="first_reminder">
                    @error('first_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="second_reminder">{{__('Tweede herinnering')}}</label>
                    <input type="text" name="second_reminder" value="{{$invoice->second_reminder}}" id="second_reminder">
                    @error('second_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


                <div class="field field-alt">
                    <label for="third_reminder">{{__('Aanmaning')}}</label>
                    <input type="text" name="third_reminder" value="{{$invoice->third_reminder}}" id="third_reminder">
                    @error('third_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="seller">{{__('Verkoper')}}</label>
                    <input type="text" name="seller" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" id="" disabled>
                    @error('seller')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="fields base">

                <h3>{{__('Incasso')}}</h3>

                <div class="field field-alt">
                    <label for="date_of_action">{{__('Datum actie')}}</label>
                    <input type="date" name="date_of_action" id="">
                    @error('date_of_action')
                        <span class="form__message">
                            <small>{{$message}}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="collection_agency">{{__('Incassobureau')}}</label>
                    <input type="text" name="collection_agency" id="">
                    @error('collection_agency')
                    <span class="form__message">
                        <small>{{$message}}</small>
                    </span>
                @enderror
                </div>

                <div class="field field-alt">
                    <label for="collection_date">{{__('Datum incassobureau')}}</label>
                    <input type="date" name="collection_date" id="">
                    @error('collection_date')
                    <span class="form__message">
                        <small>{{$message}}</small>
                    </span>
                @enderror
                </div>

            </fieldset>

            <fieldset class="fields notes full-width">
                <h3>{{__('Aantekeningen')}}</h3>
                <label for="comments">{{__('Aantekeningen')}}</label>
                <textarea name="comments" id="" cols="30" rows="10"></textarea>
            </fieldset>
        </div>

        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">Opslaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
