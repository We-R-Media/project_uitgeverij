@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

    <div class="page__wrapper">
        <form action="{{ route('orders.store', $advertiser->id) }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="advertiser_id">{{ __('Klantnummer') }}</label>
                            <input type="text" name="advertiser_id" value="{{$advertiser->id}}" readonly>
                            @error('advertiser_id')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="name">{{ __('Bedrijfsnaam') }}</label>
                            <input type="text" name="name" value="{{$advertiser->name}}" readonly>
                            @error('name')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="po_box">{{ __('Postadres') }}</label>
                            <input type="text" name="po_box" value="{{$advertiser->po_box}}" readonly>
                            @error('po_box')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="postal_code">{{ __('Postcode') }}</label>
                            <input type="text" name="postal_code" value="{{$advertiser->postal_code}}" readonly>
                            @error('postal_code')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="city">{{ __('Woonplaats') }}</label>
                            <input type="text" name="city" value="{{$advertiser->city}}" readonly>
                            @error('city')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="province">{{ __('Provincie') }}</label>
                            <input type="text" name="province" value="{{$advertiser->province}}" readonly>
                            @error('province')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="phone">{{ __('Telefoon') }}</label>
                            <input type="text" name="phone" value="{{$advertiser->phone}}" readonly>
                            @error('phone')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="phone_mobile">{{ __('Mobiel') }}</label>
                            <input type="text" name="phone_mobile" value="{{$advertiser->phone_mobile}}" readonly>
                            @error('phone_mobile')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="email">{{ __('E-mailadres') }}</label>
                            <input type="text" name="email" value="{{$advertiser->email}}" readonly>
                            @error('email')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="release_name">{{__('Uitgave')}}</label>
                            <div class="dropdown">
                                <select name="publisher">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="field">
                            <label class="field__label" for="contact">{{__('Contactpersoon')}}</label>
                            <div class="dropdown">
                                <select name="contact">
                                    @if($advertiser->contacts->isEmpty())
                                        <option value="nvt" disabled selected>{{ __('Niet beschikbaar ...') }}</option>
                                    @else
                                        @foreach ($advertiser->contacts as $contact)
                                            <option value="{{ $contact->id }}" {{ $contact->role == 1 ? 'selected' : '' }}>
                                                {{ $contact->salutation }} {{ $contact->initial }} {{ $contact->last_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="user">{{__('Verkoper')}}</label>
                            <input type="text" name="user" value="{{auth()->user()->first_name}} {{auth()->user()->last_name}}" readonly>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="form__actions">
                <div class="buttons">
                    <button type="submit" class="button button--big button--primary">{{__('Opslaan')}}</button>
                </div>
            </div>

        </form>
    </div>
@endsection
