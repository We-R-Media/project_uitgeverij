@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('tax.store') }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <div class="field">
                            <label class="field__label" for="country">{{__('Land')}}</label>
                            <input type="text" name="country">
                            @error('country')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="zero">{{__('BTW 0')}}</label>
                            <input type="number" name="zero">
                            @error('zero')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="low">{{__('BTW laag')}}</label>
                            <input type="number" name="low">
                            @error('low')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                        <div class="field">
                            <label class="field__label" for="high">{{__('BTW hoog')}}</label>
                            <input type="number" name="high">
                            @error('high')
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
                    <button type="submit" class="button button--big button--primary">{{__('Opslaan')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
