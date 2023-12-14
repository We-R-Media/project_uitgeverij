@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">

    <form class="formContainer" action="{{ route('advertisers.store') }}" method="post">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field field-alt">
                    <label for="salutation">{{__('Aanhef')}}</label>
                    <div class="dropdown">
                       <select name="salutation" id="" class="select2">
                          <option value="Dhr.">{{__('Dhr.')}}</option>
                          <option value="Mw.">{{__('Mw.')}}</option>
                       </select>
                    </div>
                    @error('salutation')
                       <span class="form__message" role="alert">
                          <small>{{ $message }}</small>
                       </span>
                    @enderror
                 </div>

                 <div class="field field-alt">
                    <label for="initial">{{ __('Voorletter') }}</label>
                    <input id="" type="text" name="initial">
                    @error('initial')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="first_name">{{ __('Voornaam') }}</label>
                    <input id="" type="text" name="first_name">
                    @error('first_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="last_name">{{ __('Achternaam') }}</label>
                    <input id="" type="text" name="last_name">
                    @error('last_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="name">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="name">
                    @error('name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Adres') }}</label>
                    <input id="" type="text" name="address">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                    <div class="field field-alt">
                        <label for="po_box">{{ __('Postbus') }}</label>
                        <input id="" type="text" name="po_box">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="credit">{{ __('Kredietlimiet') }}</label>
                        <input id="" type="text" name="credit">
                        @error('credit')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="text" name="phone">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{ __('Mobiel') }}</label>
                    <input id="" type="text" name="phone_mobile">
                    @error('phone_mobile')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email">
                    @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset>

            {{-- <fieldset class="fields notes">
                <h3>{{ __('Vestiging') }}</h3>
                <div class="field field-alt">
                    <label for="company_address">{{ __('Vestigingsadres') }}</label>
                    <input id="" type="text" name="company_address" value="">
                    @error('company_address')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="company_postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="company_postal_code" value="">
                    @error('company_postal_code')
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
                    <textarea id="" cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in..."></textarea>
                    @error('comments')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>
            </fieldset> --}}


            {{-- <fieldset class="fields options">
                <h3>{{__('Afwijkend factuuradres')}}</h3>

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
                    <input type="text" name="name">
                    @error('name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input type="text" name="po_box">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input type="text" name="postal_code">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                
                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input type="text" name="city">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input type="text" name="province">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input type="text" name="email">
                    @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="contact-alt">{{__('Contactpersoon')}}</label>
                    <div class="dropdown">
                        <select class="select2" name="contact-alt" id="">
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
            </fieldset> --}}

        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
