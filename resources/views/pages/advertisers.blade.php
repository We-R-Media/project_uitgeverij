@extends('layouts.app')

@section('title', $pageTitle)

@section('content')
<div class="page__wrapper">
    {{--@if($errors)
        <p>{{$errors}}</p>
    @endif--}}

    @if($errors->has('contact_id'))
        <p class="error-message">{{$errors->first('contact_id')}}</p>
    @endif

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{route('advertisers.process')}}" class="button button--action">+ {{ __('Nieuwe order') }}</a>
        </div>
    </div>

    <form class="formContainer" action="{{route('advertisers.create')}}" method="post">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field field-alt">
                    <label for="name">{{ __('Bedrijfsnaam') }}</label>
                    <input id="" type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="po_box">{{ __('Postadres') }}</label>
                    <input id="" type="text" name="po_box" value="{{ old('po_box') }}">
                    @error('po_box')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="postal_code">{{ __('Postcode') }}</label>
                    <input id="" type="text" name="postal_code" value="{{ old('postal_code') }}">
                    @error('postal_code')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city">{{ __('Woonplaats') }}</label>
                    <input id="" type="text" name="city" value="{{ old('city') }}">
                    @error('city')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="province">{{ __('Provincie') }}</label>
                    <input id="" type="text" name="province" value="{{ old('province') }}">
                    @error('province')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone">{{ __('Telefoonnummer') }}</label>
                    <input id="" type="number" name="phone" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="phone_mobile">{{ __('Mobiel') }}</label>
                    <input id="" type="number" name="phone_mobile" value="{{ old('phone_mobile') }}">
                    @error('phone_mobile')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="email">{{ __('E-mailadres') }}</label>
                    <input id="" type="email" name="email" value="{{ old('email') }}">
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
                            @if($contacts->isEmpty())
                                <option value="nvt" disabled selected>{{ __('Niet beschikbaar') }}</option>
                            @else
                                @foreach ($contacts as $contact )
                                    <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset class="field notes">
                <label for="comments">{{ __('Opmerkingen') }}</label>
                <textarea id="" cols="30" rows="10" name="comments" value="{{ old('comments') }}" placeholder="Vul opmerkingen in..."></textarea>
                @error('comments')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
            </fieldset>
        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                <button type="submit" class="button button--action">{{ __('Toevoegen') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
