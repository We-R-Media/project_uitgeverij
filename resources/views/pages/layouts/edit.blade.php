@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <form action="{{ route('layouts.update', $layout->id ) }}" method="post" enctype="multipart/form-data">
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

                <div class="field field--column">
                    <label class="field__label" for="logo">{{__('Logo')}}</label>
                    <input type="file" name="image" id="image">

                    @if(!empty($layout->image))
                        <div class="current__logo">
                            <img class="image--cover" src="{{asset('storage/'.$layout->image)}}">
                        </div>
                    @endif
                </div>
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
