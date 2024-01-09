@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <form action="{{ route('layouts.update', $layout->id) }}" method="post">
        @csrf
        @method('post')
        <div class="form__wrapper">
            <fieldset class="form__section">
                <h3>{{ __('Algemeen') }}</h3>

                <div class="field">
                    <label class="field__label" for="layout_name">{{__('Layout naam')}}</label>
                    <input type="text" value="{{$layout->layout_name}}" name="layout_name">
                    @error('layout_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="field">
                    <label class="field__label" for="city_name">{{__('Plaatsnaam')}}</label>
                    <input type="text" value="{{$layout->city_name}}" name="city_name">
                    @error('city_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

            </fieldset>
            <fieldset class="form__section">
                <h3>{{ __('Uiterlijk') }}</h3>

                <div class="field">
                    <label class="field__label" for="logo">{{__('Logo')}}</label>
                    <input type="hidden" name="logo" id="logo" value="{{$layout->logo}}">

                    @if(!empty($layout->logo))
                        <div class="current__logo">
                            <img src="{{asset('/images/uploads/' . $layout->logo)}}">
                        </div>
                    @endif

                </div>

                <div class="dropzone" id="UploadImageDrop"></div>

            </fieldset>
        </div>
        <div class="form__actions">
            <div class="buttons">
                <button class="button button--big button--primary" type="submit">{{__('Opslaan')}}</button>
            </div>
        </div>
    </form>
</div>

@endsection
