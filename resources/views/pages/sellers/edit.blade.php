@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
@foreach ($sellers as $seller )
    <div class="page__wrapper">
        <form class="formContainer" action="{{ route('sellers.update', $seller->id) }}" method="post">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <div class="field field-alt">
                        <label for="seller_id">{{__('Verkopernummer')}}</label>
                        <input type="number" value="{{$seller->id}}" name="id" id="" disabled>
                        @error('seller_id')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field field-alt">
                        <label for="first_name">{{__('Voornaam')}}</label>
                        <input type="text" value="{{$seller->first_name}}" name="first_name" id="">
                        @error('first_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field field-alt">
                        <label for="initial">{{__('Initiaal')}}</label>
                        <input type="text" value="{{$seller->initial}}" name="initial">    
                        @error('initial')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="last_name">{{__('Achternaam')}}</label>
                        <input type="text" value="{{$seller->last_name}}" name="last_name" id="">    
                    </div>

            
                    <div class="field field-alt">
                        <label for="email">{{__('E-mailadres')}}</label>
                        <input type="email" value="{{$seller->email}}" name="email" id="">
                        @error('email')
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
@endforeach
@endsection