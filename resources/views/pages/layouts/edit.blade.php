@extends('layouts.app')

@section('title', $seoTitle)

@section('content')

<div class="page__wrapper">
    <form action="{{ route('layouts.update', $layout->id) }}" method="post" class="formContainer">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field field-alt">
                    <label for="layout_name">{{__('Layout naam')}}</label>
                    <input type="text" value="{{$layout->layout_name}}" name="layout_name">
                    @error('layout_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city_name">{{__('Plaatsnaam')}}</label>
                    <input type="text" value="{{$layout->city_name}}" name="city_name">
                    @error('city_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

            </fieldset>
            <fieldset class="fields">
                <h3>{{ __('Uiterlijk') }}</h3>

                <div class="field field-alt">
                    <label for="logo">{{__('Logo')}}</label>
                    <input type="file" name="logo">
                    @error('logo')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>
            </fieldset>
        </div>
        <div class="ButtonGroup">
            <div class="buttons">
                <button class="button button--action" type="submit">Opslaan</button>
            </div>
        </div>
    </form>
</div>

@endsection
