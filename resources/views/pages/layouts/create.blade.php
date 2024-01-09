@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

<div class="page__wrapper">
    <form action="{{ route('layouts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <div class="field">
                        <label class="field__label" for="layout_name">{{__('Layout naam')}}</label>
                        <input type="text" name="layout_name">
                        @error('layout_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="city_name">{{__('Plaatsnaam')}}</label>
                        <input type="text" name="city_name">
                        @error('city_name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="logo">{{__('Logo')}}</label>
                        <input type="file" name="logo">
                        @error('logo')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
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
