@extends('layouts.app')


@section('title', $pageTitle)
@section('content')

<div class="page__wrapper">
    <form class="formContainer" action="{{ route('layouts.store') }}" method="post">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">

                <div class="field field-alt">
                    <label for="layout_name">{{__('Layout naam')}}</label>
                    <input type="text" name="layout_name" id="">
                    @error('layout_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror
                </div>
                
                <div class="field field-alt">
                    <label for="city_name">{{__('Plaatsnaam')}}</label>
                    <input type="text" name="city_name" id="">
                    @error('city_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                @enderror

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