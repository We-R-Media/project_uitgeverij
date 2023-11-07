@extends('layouts.app')

@section('title', $pageTitle)

@section('content')

<div class="page__wrapper">
    @foreach ($layouts as $layout)
    <form action="{{ route('layouts.edit', $layout->id) }}" class="formContainer">
        @csrf
        @method('post')
        <div class="grid__wrapper">
            <fieldset class="fields base">

                <div class="field field-alt">
                    <label for="layout__name">{{__('Layout naam')}}</label>
                    <input type="text" value="{{$layout->layout_name}}" name="layout_name">
                    @error('layout_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

                <div class="field field-alt">
                    <label for="city__name">{{__('Plaatsnaam')}}</label>
                    <input type="text" value="{{$layout->city_name}}" name="city_name">
                    @error('city_name')
                    <span class="form__message" role="alert">
                        <small>{{ $message }}</small>
                    </span>
                    @enderror
                </div>

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
    @endforeach
</div>

@endsection