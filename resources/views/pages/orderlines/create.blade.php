@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('orderlines.store', $order->id) }}" method="post">
            @csrf
            @method('post')

            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{__('Orderregel')}}</h3>

                    <div class="field field-alt">
                        <label for="base_price">{{__('Basisbedrag')}}</label>
                        <input type="text" name="base_price" id="">
                        @error('base_price')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="discount">{{__('Korting')}}</label>
                        <input type="text" name="discount" id="">
                        @error('discount')
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