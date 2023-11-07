@extends('layouts.app')

@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('tax.store') }}" method="post" class="formContainer">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">

                    <div class="field field-alt">
                        <label for="country">{{__('Land')}}</label>
                        <input type="text" name="country" id="">
                        @error('country')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="zero">{{__('BTW 0')}}</label>
                        <input type="number" name="zero" id="">
                        @error('zero')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="low">{{__('BTW laag')}}</label>
                        <input type="number" name="low" id="">
                        @error('low')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="high">{{__('BTW hoog')}}</label>
                        <input type="number" name="high" id="">
                        @error('high')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                </fieldset>    
            </div>

            <div class="ButtonGroup">
                <div class="buttons">
                    <button type="submit" class="button button--action">{{__('Opslaan')}}</button>
                </div>
            </div>
        </form>
    </div>
@endsection