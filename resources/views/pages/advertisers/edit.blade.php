@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">
    <div class="header__bar">
        <div class="bar__buttons">
            @if (!$advertiser->deactivated_at && !$advertiser->blacklisted_at)
                <a href="{{ route('orders.create', $advertiser->id) }}" class="button button--secondary">{{ __('+Nieuwe order') }}</a>
            @endif
        </div>
    </div>
    <form action="{{ route('advertisers.update', $advertiser->id) }}" method="post">
        @csrf
        @method('post')

        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <div class="field">
                        <label class="field__label" for="advertiser_id">{{ __('Klantnummer') }}</label>
                        <input type="text" name="advertiser_id" value="{{$advertiser->id}}" readonly>
                    </div>
                    <div class="field">
                        <label class="field__label" for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name" value="{{$advertiser->name}}">
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="salutation">{{__('Aanhef')}}</label>
                        <div class="dropdown">
                            <select name="salutation">
                                <option class="list__option" value="Dhr.">{{__('Dhr.')}}</option>
                                <option class="list__option" value="Mw.">{{__('Mw.')}}</option>
                            </select>
                        </div>
                        @error('salutation')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="initial">{{ __('Voorletter') }}</label>
                        <input type="text" name="initial" value="{{ $advertiser->initial }}">
                        @error('initial')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="first_name">{{ __('Voornaam') }}</label>
                        <input type="text" name="first_name" value="{{ $advertiser->first_name }}">
                        @error('first_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="last_name">{{ __('Achternaam') }}</label>
                        <input type="text" name="last_name" value="{{ $advertiser->last_name }}">
                        @error('last_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    @if ($advertiser->credit_limit && !is_countable($advertiser->credit_limit))
                        <div class="field">
                            <label class="field__label" for="credit">{{ __('Kredietlimiet') }}</label>
                            <input type="text" name="credit" value="">
                            @error('credit')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    @endif

                    @if ($advertiser->po_box)
                        <div class="field">
                            <label class="field__label" for="po_box">{{ __('Postbus') }}</label>
                            <input type="text" name="po_box" value="{{ $advertiser->po_box }}">
                            @error('po_box')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    @endif
                    <div class="field">
                        <label class="field__label" for="phone">{{ __('Telefoonnummer') }}</label>
                        <input type="text" name="phone" value="{{ $advertiser->phone }}">
                        @error('phone')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="phone_mobile">{{ __('Mobiel') }}</label>
                        <input type="text" name="phone_mobile" value="{{ $advertiser->phone_mobile }}">
                        @error('phone_mobile')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="email">{{ __('E-mailadres') }}</label>
                        <input type="email" name="email" value="{{ $advertiser->email }}">
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
                    <h3>{{ __('Opties') }}</h3>

                    <div class="field">
                        <label class="field__label">{{ __('Zwarte lijst') }}</label>
                        <div class="radio__group">
                            <input id="blacklisted_true" type="radio" name="blacklisted" value="1" @if($advertiser->blacklisted_at) checked @endif>
                            <label class="field__label" for="blacklisted_true">{{__('Ja')}}</label>
                            <input id="blacklisted_false" type="radio" name="blacklisted" value="0" @if(!$advertiser->blacklisted_at) checked @endif>
                            <label class="field__label" for="blacklisted_false">{{__('Nee')}}</label>
                        </div>
                        @error('blacklisted_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label">{{__('Actief')}}</label>
                        <div class="radio__group">
                            <input id="deactivated_true" type="radio" name="active" value="1" @if(!$advertiser->deactivated_at) checked @endif>
                            <label class="field__label" for="deactivated_true">{{__('Ja')}}</label>
                            <input id="deactivated_false" type="radio" name="active" value="0" @if($advertiser->deactivated_at) checked @endif>
                            <label class="field__label" for="deactivated_false">{{__('Nee')}}</label>
                        </div>
                    </div>
                </div>
                <div class="section__block">
                    <h3>{{__('Afwijkend factuuradres')}}</h3>

                    <div class="field">
                        <label class="field__label">{{__('Afwijkend factuuradres')}}</label>
                        <div class="radio__group">
                            <input type="radio" value="0" name="alt_invoice" id="alt_invoice_true" onclick="toggleFormDisplay(0)" @if($advertiser->alt_invoice) checked @endif>
                            <label class="field__label" for="alt_invoice_true">{{__('Ja')}}</label>
                            <input type="radio" value="1" name="alt_invoice" id="alt_invoice_false" onclick="toggleFormDisplay(1)" @if($advertiser->alt_invoice) checked @endif>
                            <label class="field__label" for="alt_invoice_false">{{__('Nee')}}</label>
                        </div>
                    </div>
                    <div class="field">
                        <label class="field__label" for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name_alt">
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="po_box">{{ __('Postadres') }}</label>
                        <input type="text" name="po_box_alt">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="postal_code">{{ __('Postcode') }}</label>
                        <input type="text" name="postal_code_alt">
                        @error('postal_code')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="city">{{ __('Woonplaats') }}</label>
                        <input type="text" name="city_alt">
                        @error('city')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="province">{{ __('Provincie') }}</label>
                        <input type="text" name="province_alt">
                        @error('province')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="email">{{ __('E-mailadres') }}</label>
                        <input type="text" name="email_alt">
                        @error('email')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="form__actions">
            <div class="buttons">
                <button type="submit" class="button button--big button--primary">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
