@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<<<<<<< HEAD
    <form class="formContainer" action="{{route('advertisers.create')}}" method="post">
        @csrf
        @method('post')

        <div class="formBlock">
            <input type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Vul bedrijfsnaam in..." id="">
            @if($errors->has('name'))
            <p class="error-message">{{$errors->first('name')}}</p>
            @endif

            <input type="text" class="@error('po_box') is-invalid @enderror" value="{{ old('po_box') }}" name="po_box" placeholder="Vul postadres in..." id="">
            @if($errors->has('po_box'))
            <p class="error-message">{{$errors->first('po_box')}}</p>
            @endif

            <input type="text" class="@error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" name="postal_code" placeholder="Vul postcode in..." id="">
            @if($errors->has('postal_code'))
            <p class="error-message">{{$errors->first('postal_code')}}</p>
            @endif

            <input type="text" class="@error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" placeholder="Vul woonplaats in..." id="">
            @if($errors->has('city'))
            <p class="error-message">{{$errors->first('city')}}</p>
            @endif

            <input type="text" class="@error('province') is-invalid @enderror" value="{{ old('province') }}" name="province" placeholder="Vul provincie in..." id="">
            @if($errors->has('province'))
            <p class="error-message">{{$errors->first('province')}}</p>
            @endif

            <input type="number" class="@error('phone_mobile') is-invalid @enderror" value="{{ old('phone_mobile') }}" name="phone_mobile" placeholder="Vul mobiele nummer in..." id="">
            @if($errors->has('phone_mobile'))
            <p class="error-message">{{$errors->first('phone_mobile')}}</p>
            @endif

            <input type="number" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Vul telefoonnummer nummer in..." id="">
            @if($errors->has('phone'))
            <p class="error-message">{{$errors->first('phone')}}</p>
            @endif


            <input type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Vul email in..." id="">
            @if($errors->has('email'))
            <p class="error-message">{{$errors->first('email')}}</p>
            @endif

            {{-- <select class="@error('contact_id') is-invalid @enderror" name="contact_id" id="">
                @if($contacts->isEmpty())
                    <option value="nvt" disabled selected>Niet beschikbaar...</option>
                @else
                    @foreach ($contacts as $contact )
                        <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                    @endforeach
                @endif
            </select> --}}

            @if($errors->has('contact_id'))
            <p class="error-message">{{$errors->first('contact_id')}}</p>
            @endif


            <textarea type="comments" class="@error('comments') is-invalid @enderror" value="{{ old('comments') }}" name="comments" placeholder="Vul opmerking in..." cols="30" rows="10" id=""></textarea>
            @if($errors->has('comments'))
            <p class="error-message">{{$errors->first('comments')}}</p>
            @endif

            <input type="number" name="advertiser_id" placeholder="Vul klantnummer in..." id="">

            <button type="submit">Toevoegen</button>
        </div>
    </form>
=======
<div class="page__wrapper">
    {{--@if($errors)
        <p>{{$errors}}</p>
    @endif--}}


    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{route('orders.create')}}" class="button button--action">+ {{ __('Nieuwe order') }}</a>
        </div>
    </div>

    <form class="formContainer" action="{{route('advertisers.edit', $advertiser->id)}}" method="post">
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
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ $advertiser->po_box }}">
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
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="number" name="phone" value="{{ $advertiser->phone }}">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{ __('Mobiel') }}</label>
                    <input id="" type="number" name="phone_mobile" value="{{ $advertiser->phone_mobile }}">
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
                    <label for="taxes">{{ __('Contactpersoon') }}</label>
                    <div class="dropdown">
                        <select class="@error('contact_id') is-invalid @enderror" name="contact_id" id="">
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
        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
            </div>
        </div>
    </form>
</div>
>>>>>>> 5af2bf4502a2bd22be2b676e93754b1fc60e7890
@endsection
