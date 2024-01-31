@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('tax.update', $tax->id) }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">

                        <div class="field">
                            <label class="field__label" for="country">{{__('Land')}}</label>
                            <input type="text" name="country" value="{{$tax->country}}">
                            @error('country')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="zero">{{__('Btw 0')}}</label>
                            <input type="text" name="zero" value="{{$tax->zero}}">
                            @error('zero')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="low">{{__('Btw laag')}}</label>
                            <input type="text" name="low" value="{{$tax->low}}">
                            @error('low')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                        <div class="field">
                            <label class="field__label" for="high">{{__('Btw hoog')}}</label>
                            <input type="text" name="high" value="{{$tax->high}}">
                            @error('high')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>

                    </div>
                </fieldset>
                <fieldset class="form__section">
                    {{-- --}}
                </fieldset>
            </div>

            <x-form.submit />
        </form>
    </div>
@endsection
