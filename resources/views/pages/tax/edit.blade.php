@extends('layouts.app')


@section('title', $seoTitle)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('tax.update', $tax->id) }}" method="post" class="formContainer">
            @csrf
            @method('post')
                <div class="grid__wrapper">
                    <fieldset class="fields base">
                        <h3>{{ __('Algemeen') }}</h3>
                        <div class="field field-alt">
                            <label for="country">{{__('Land')}}</label>
                            <input type="text" name="country" value="{{$tax->country}}" id="">
                            @error('country')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field field-alt">
                            <label for="zero">{{__('Btw 0')}}</label>
                            <input type="text" name="zero" value="{{$tax->zero}}" id="">
                            @error('zero')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field field-alt">
                            <label for="low">{{__('Btw laag')}}</label>
                            <input type="text" name="low" value="{{$tax->low}}" id="">
                            @error('low')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field field-alt">
                            <label for="high">{{__('Btw hoog')}}</label>
                            <input type="text" name="high" value="{{$tax->high}}" id="">
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
