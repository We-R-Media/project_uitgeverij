@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')
<div class="page__wrapper">

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{route('orders.create', $advertiser->id)}}" class="button button--action">+ {{ __('Nieuwe order') }}</a>
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

                    <div class="field field-alt">
                    <label for="contacts">{{ __('Contactpersoon') }}</label>
                    <div class="dropdown">
                        <select class="select2 @error('contact_id') is-invalid @enderror" name="contact_id" id="">
                           {{-- @if($contacts->isEmpty()) --}}
                                <option value="nvt" disabled selected>{{ __('Niet beschikbaar') }}</option>
                            {{--
                            @else
                                @foreach ($contacts as $contact )
                                    <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                @endforeach
                            @endif
                            --}}
                        </select>
                    </div>
                    @if($errors->has('contact_id'))
                        <p class="error-message">{{$errors->first('contact_id')}}</p>
                    @endif
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
                        <label for="blacklisted_true">Ja</label>
                        <input id="blacklisted_false" type="radio" name="blacklisted" value="0" @if(!$advertiser->blacklisted_at) checked @endif>
                        <label for="blacklisted_false">Nee</label>
                    </div>
                    @error('blacklisted_at')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
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
