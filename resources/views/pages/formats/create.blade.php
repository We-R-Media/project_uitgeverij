@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('formats.store') }}" method="post">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">

                    <div class="field field-alt">
                        <label for="size">{{__('Grootte')}}</label>
                        <input type="text" name="size" id="">
                        @error('size')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="measurement">{{__('Afmeting')}}</label>
                        <input type="text" name="measurement" id="">
                        @error('measurement')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="ratio">{{__('Verhouding')}}</label>
                        <input type="text" name="ratio" id="">
                        @error('ratio')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="price">{{__('Prijs')}}</label>
                        <input type="number" name="price" id="">
                        @error('price')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                </fieldset>
            </div>

            <div class="buttonGroup">
                <div class="buttons">
                    <button type="submit" class="button button--action">Opslaan</button>
                </div>
            </div>

        </form>
    </div>
@endsection