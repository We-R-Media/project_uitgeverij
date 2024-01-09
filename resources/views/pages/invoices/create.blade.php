@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

    <div class="page__wrapper">
        <form action="{{ route('invoices.store') }}" method="post" >
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="field">
                        <label class="field__label" for="advertiser_id">{{__('Klantnummer')}}</label>
                        <input type="text" name="advertiser_id" value="{{$order->advertiser->id}}" disabled>
                        @error('advertiser_id')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="name">{{__('Bedrijfsnaam')}}</label>
                        <input type="text" name="name" value="{{$order->advertiser->name}}" disabled>
                        @error('name')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="order_id">{{__('Ordernummer')}}</label>
                        <input type="text" name="order_id" value="{{$order->id}}" disabled>
                        @error('order_id')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="project_id">{{__('Projectcode')}}</label>
                        <input type="text" name="project_id" value="{{$order->project->id}}" disabled>
                        @error('project_id')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="po_box">{{__('Postadres')}}</label>
                        <input type="text" name="po_box" value="{{$order->advertiser->po_box}}" disabled>
                        @error('po_box')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="postal_code">{{__('Postcode')}}</label>
                        <input type="text" name="postal_code" value="{{$order->advertiser->postal_code}}" disabled>
                        @error('postal_code')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="city">{{__('Woonplaats')}}</label>
                        <input type="text" name="city" value="{{$order->advertiser->city}}" disabled>
                        @error('city')
                            <div class="form__message">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                </fieldset>
            </div>


            <div class="form__actions">
                <div class="buttons">
                    <button type="submit" class="button button--big button--primary">Opslaan</button>
                </div>
            </div>
        </form>
    </div>

@endsection
