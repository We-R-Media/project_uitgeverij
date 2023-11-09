@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

    <div class="page__wrapper">
        <form class="formContainer" action="{{ route('invoices.store') }}" method="post" >
            @csrf
            @method('post')

            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <div class="field field-alt">
                        <label for="advertiser_id">{{__('Klantnummer')}}</label>
                        <input type="text" name="advertiser_id" value="{{$order->advertiser->id}}" id="" disabled>
                        @error('advertiser_id')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="name">{{__('Bedrijfsnaam')}}</label>
                        <input type="text" name="name" value="{{$order->advertiser->name}}" id="" disabled>
                        @error('name')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="order_id">{{__('Ordernummer')}}</label>
                        <input type="text" name="order_id" value="{{$order->id}}" id="" disabled>
                        @error('order_id')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="po_box">{{__('Postadres')}}</label>
                        <input type="text" name="po_box" value="{{$order->advertiser->po_box}}" id="" disabled>
                        @error('po_box')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="postal_code">{{__('Postcode')}}</label>
                        <input type="text" name="postal_code" value="{{$order->advertiser->postal_code}}" id="" disabled>
                        @error('postal_code')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="city">{{__('Woonplaats')}}</label>
                        <input type="text" name="city" value="{{$order->advertiser->city}}" id="" disabled>
                        @error('city')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

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
