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

                <x-form.input type="text" name="layout_name" label="Layout naam" :value="$layout->layout_name" />
                <x-form.input type="text" name="city_name" label="Plaatsnaam" :value="$layout->city_name" />
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
