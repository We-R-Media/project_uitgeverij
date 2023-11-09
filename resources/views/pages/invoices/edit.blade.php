@extends('layouts.app')


@section('title', $pageTitleSection)
@section('content')
<div class="page__wrapper">
    <form action="#" method="post" class="formContainer">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{__('Factuur')}}</h3>

                <div class="field field-alt">
                    <label for="invoice_id">{{__('Factuurnummer')}}</label>
                    <input type="number" name="invoice_id" value="{{$invoice->id}}">
                    @error('invoice_id')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="invoice_date">{{__('Factuurdatum')}}</label>
                    <input type="text" name="invoice_date" value="{{$invoice->created_at->format('d-m-Y')}}" id="">
                    @error('invoice_date')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="advertiser_id">{{__('Klantnummer')}}</label>
                    <input type="text" name="advertiser_id" value="{{$invoice->advertiser->id}}" id="">
                    @error('advertiser_id')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="name">{{__('Bedrijfsnaam')}}</label>
                    <input type="text" name="name" value="{{$invoice->advertiser->name}}" id="">
                    @error('name')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact">{{__('Contactpersoon')}}</label>
                    <input type="text" name="contact" value="{{$invoice->advertiser->contact}}" id="">
                    @error('contact')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{__('Postadres')}}</label>
                    <input type="text" name="po_box" value="{{$invoice->advertiser->po_box}}" id="">
                    @error('po_box')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                
                <div class="field field-alt">
                    <label for="postal_code">{{__('Postadres')}}</label>
                    <input type="text" name="postal_code" value="{{$invoice->advertiser->postal_code}}" id="">
                    @error('postal_code')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                                
                <div class="field field-alt">
                    <label for="city">{{__('Postadres')}}</label>
                    <input type="text" name="city" value="{{$invoice->advertiser->city}}" id="">
                    @error('city')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_number">{{__('Telefoonnumer')}}</label>
                    <input type="text" name="phone_number" value="{{$invoice->advertiser->phone}}" id="">
                    @error('phone_number')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{__('Telefoonnumer')}}</label>
                    <input type="text" name="phone_mobile" value="{{$invoice->advertiser->phone_mobile}}" id="">
                    @error('phone_mobile')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{__('Mobiel')}}</label>
                    <input type="text" name="phone_mobile" value="{{$invoice->advertiser->phone_mobile}}" id="">
                    @error('phone_mobile')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="post_method">{{__('Verzonden per')}}</label>
                    <input type="text" name="post_method" value="{{$invoice->post_method}}" id="">
                    @error('post_method')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="first_reminder">{{__('Eerste herinnering')}}</label>
                    <input type="text" name="first_reminder" value="{{$invoice->first_reminder}}" id="">
                    @error('first_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="second_reminder">{{__('Tweede herinnering')}}</label>
                    <input type="text" name="second_reminder" value="{{$invoice->second_reminder}}" id="">
                    @error('second_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                
                <div class="field field-alt">
                    <label for="third_reminder">{{__('Aanmaning')}}</label>
                    <input type="text" name="third_reminder" value="{{$invoice->third_reminder}}" id="">
                    @error('third_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="third_reminder">{{__('Aanmaning')}}</label>
                    <input type="text" name="third_reminder" value="{{Auth::user()->first_name}} {{Auth::user()->last_name}}" id="">
                    @error('third_reminder')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>


            </fieldset>
        </div>
    </form>
</div>
@endsection