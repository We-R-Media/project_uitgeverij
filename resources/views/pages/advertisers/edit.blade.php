@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">

    <div class="icon__group">
        <div class="icon icon__search">
            <div class="icon__svg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 25.935 25.731"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h25.935v25.731H0z" data-name="Rectangle 94"/></clipPath></defs><g data-name="Group 240"><g data-name="Group 235"><g clip-path="url(#a)" data-name="Group 234"><path fill="#f7a637" d="M17.568 19.273c-.5.331-.957.662-1.441.946a10.023 10.023 0 0 1-3.8 1.307A10.54 10.54 0 0 1 4 19.199a10.521 10.521 0 0 1-3.8-6.3 10.869 10.869 0 0 1 21.234-4.648 10.733 10.733 0 0 1-1.837 9c-.03.041-.061.081-.089.123a.31.31 0 0 0-.022.055l1.755 1.752 4.242 4.241a1.323 1.323 0 0 1 .421 1.27 1.352 1.352 0 0 1-1.85.922 2.01 2.01 0 0 1-.56-.393q-2.924-2.906-5.834-5.822a.876.876 0 0 1-.092-.122M10.82 2.71a8.108 8.108 0 0 0-.049 16.216 8.173 8.173 0 0 0 8.158-8.107 8.184 8.184 0 0 0-8.11-8.109" data-name="Path 22"/></g></g></g></svg>                    </div>
                <div class="controls__wrapper">
                <div class="controls search__bar">
                        <form class="field field__row" action="{{ route('search') }}" method="GET">
                            <input type="text" name="q" placeholder="Gebruiker, order, factuur, project etc.">
                            <button class="button--submit" type="submit">
                                <div class="button__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25.935" height="25.731" viewBox="0 0 25.935 25.731"><defs><clipPath id="a"><path fill="#f7a637" d="M0 0h25.935v25.731H0z" data-name="Rectangle 94"></path></clipPath></defs><g data-name="Group 240"><g data-name="Group 235"><g clip-path="url(#a)" data-name="Group 234"><path fill="#f7a637" d="M17.568 19.273c-.5.331-.957.662-1.441.946a10.023 10.023 0 0 1-3.8 1.307A10.54 10.54 0 0 1 4 19.199a10.521 10.521 0 0 1-3.8-6.3 10.869 10.869 0 0 1 21.234-4.648 10.733 10.733 0 0 1-1.837 9c-.03.041-.061.081-.089.123a.31.31 0 0 0-.022.055l1.755 1.752 4.242 4.241a1.323 1.323 0 0 1 .421 1.27 1.352 1.352 0 0 1-1.85.922 2.01 2.01 0 0 1-.56-.393q-2.924-2.906-5.834-5.822a.876.876 0 0 1-.092-.122M10.82 2.71a8.108 8.108 0 0 0-.049 16.216 8.173 8.173 0 0 0 8.158-8.107 8.184 8.184 0 0 0-8.11-8.109" data-name="Path 22"></path></g></g></g></svg>
                                </div>
                            </button>
                        </form>
                </div>
            </div>
        </div>

    <div class="header__bar">
        <x-search-field model="advertisers" placeholder="Relatie zoeken..." />

        <div class="buttons">
            @if (!$advertiser->deactivated_at)
                <a href="{{ route('orders.create', $advertiser->id) }}" class="button button--action">+ {{ __('Nieuwe order') }}</a>
            @endif
        </div>
    </div>

    <form class="formContainer" action="{{ route('advertisers.update', $advertiser->id) }}" method="post">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field field-alt">
                    <label for="advertiser_id">{{ __('Klantnummer') }}</label>
                    <input id="" type="text" name="advertiser_id" value="{{$advertiser->id}}" placeholder="Vul klantnummer in...">
                    @error('advertiser_id')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="name">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="name" value="{{ $advertiser->name }}">
                    @error('name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Adres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ $advertiser->address }}">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code" value="{{ $advertiser->postal_code }}">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city" value="{{ $advertiser->city }}">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province" value="{{ $advertiser->province }}">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="credit">{{ __('Kredietlimiet') }}</label>
                    <input id="" type="text" name="credit" value="{{ number_format($advertiser->credit_limit, 2) }}">
                    @error('credit')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                @if ($advertiser->po_box)
                    <div class="field field-alt">
                        <label for="po_box">{{ __('Postbus') }}</label>
                        <input id="" type="text" name="po_box" value="{{ $advertiser->po_box }}">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                @endif

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="text" name="phone" value="{{ $advertiser->phone }}">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{ __('Mobiel') }}</label>
                    <input id="" type="text" name="phone_mobile" value="{{ $advertiser->phone_mobile }}">
                    @error('phone_mobile')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email" value="{{ $advertiser->email }}">
                    @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                    </div>
            </fieldset>

            <fieldset class="fields notes">
                <h3>{{ __('Vestiging') }}</h3>
                <div class="field field-alt">
                    <label for="company_adres">{{ __('Vestigingsadres') }}</label>
                    <input id="" type="text" name="company_adres" value="">
                    @error('company_adres')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company_postal">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="company_postal" value="">
                    @error('company_postal')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company_city">{{ __('Plaats') }}</label>
                    <input id="" type="text" name="company_city" value="">
                    @error('company_city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company_country">{{ __('Land') }}</label>
                    <input id="" type="text" name="company_country" value="">
                    @error('company_country')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="credit_limit">{{ __('Kredietlimiet') }}</label>
                    <input id="" type="text" name="credit_limit" value="">
                    @error('credit_limit')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company_iban">{{ __('Rekeningnummer') }}</label>
                    <input id="" type="text" name="company_iban" value="">
                    @error('company_iban')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field">
                    <label for="comments">{{ __('Opmerkingen') }}</label>
                    <textarea id="" cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in...">
                        {{ $advertiser->comments }}
                    </textarea>
                    @error('comments')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset>

            <fieldset class="fields base">
                <h3>{{ __('Opties') }}</h3>

                <div class="field field-alt">
                    <label>{{ __('Zwarte lijst') }}</label>
                    <div class="radio__group">
                        <input id="blacklisted_true" type="radio" name="blacklisted" value="1" @if($advertiser->blacklisted_at) checked @endif>
                        <label for="blacklisted_true">{{__('Ja')}}</label>
                        <input id="blacklisted_false" type="radio" name="blacklisted" value="0" @if(!$advertiser->blacklisted_at) checked @endif>
                        <label for="blacklisted_false">{{__('Nee')}}</label>
                    </div>
                    @error('blacklisted_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label>{{__('Actief')}}</label>

                    <div class="radio__group">
                        <input id="deactivated_true" type="radio" name="active" value="0" @if($advertiser->deactivated_at) checked @endif>
                        <label for="deactivated_true">{{__('Ja')}}</label>
                        <input id="deactivated_false" type="radio" name="active" value="1" @if(!$advertiser->deactivated_at) checked @endif>
                        <label for="deactivated_false">{{__('Nee')}}</label>
                    </div>
                </div>

            </fieldset>
        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
