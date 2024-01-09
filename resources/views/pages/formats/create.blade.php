@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('formats.store', $project->id) }}" method="post">
            @csrf
            @method('post')
            <div class="form__wrapper">
                <fieldset class="form__section">

                    <div class="field">
                        <label class="field__label" for="format_title">{{__('Titel')}}</label>
                        <input type="text" value="{{$project->name}}" name="format_title">
                    </div>

                    <div class="field">
                        <label class="field__label" for="size">{{__('Grootte')}}</label>
                        <input type="text" name="size">
                        @error('size')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="measurement">{{__('Afmeting')}}</label>
                        <input type="text" name="measurement">
                        @error('measurement')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="ratio">{{__('Verhouding')}}</label>
                        <input type="text" name="ratio">
                        @error('ratio')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field">
                        <label class="field__label" for="price">{{__('Prijs')}}</label>
                        <input type="number" name="price">
                        @error('price')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
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
