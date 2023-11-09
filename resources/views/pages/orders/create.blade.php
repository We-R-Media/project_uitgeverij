@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

    <div class="page__wrapper">
        <form action="{{ route('orders.store') }}" method="post">
            @csrf
            @method('post')

            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{__('Bevestiginsadres')}}</h3>

                    <div class="field field-alt">
                        <label for="advertiser_id">{{ __('Klantnummer') }}</label>
                        <input type="text" name="advertiser_id" value="{{$advertiser->id}}" disabled>
                        @error('advertiser_id')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name" value="{{$advertiser->name}}" disabled>
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="po_box">{{ __('Postadres') }}</label>
                        <input type="text" name="po_box" value="{{$advertiser->po_box}}" disabled>
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="postal_code">{{ __('Postcode') }}</label>
                        <input type="text" name="postal_code" value="{{$advertiser->postal_code}}" disabled>
                        @error('postal_code')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="city">{{ __('Woonplaats') }}</label>
                        <input type="text" name="city" value="{{$advertiser->city}}" disabled>
                        @error('city')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="province">{{ __('Provincie') }}</label>
                        <input type="text" name="province" value="{{$advertiser->province}}" disabled>
                        @error('province')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="phone">{{ __('Telefoon') }}</label>
                        <input type="text" name="phone" value="{{$advertiser->phone}}" disabled>
                        @error('phone')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="field field-alt">
                        <label for="phone_mobile">{{ __('Mobiel') }}</label>
                        <input type="text" name="phone_mobile" value="{{$advertiser->phone_mobile}}" disabled>
                        @error('phone_mobile')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="email">{{ __('E-mailadres') }}</label>
                        <input type="text" name="email" value="{{$advertiser->email}}" disabled>
                        @error('email')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                </fieldset>
            </div>
        </form>
    </div>

    <div class="ButtonGroup">
        <div class="buttons">
            <a href="{{route('pdf.generate')}}" class="button button--action">{{__('Genereer PDF')}}</a>
        </div>
    </div>
@endsection
