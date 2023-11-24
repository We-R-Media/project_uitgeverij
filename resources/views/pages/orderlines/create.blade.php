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
                        <label for="project">{{__('Editie')}}</label>
                        <div class="dropdown">
                            <select class="select2" name="project" id="project">
                                <option value="{{ $project->id }}">{{ $project->edition_name }}</option>
                            </select>
                        </div>
                    </div>

                    @livewire('base-price-calculate', ['order' => $order], key($order->id))

                    <div class="field field-alt">
                        <label for="discount">{{__('Korting')}}</label>
                        <input type="text" name="discount" id="discount">
                        @error('discount')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="material">{{ __('Materiaal') }}</label>
                        <div class="radio__group">
                            <input id="" type="radio" name="material" value="1">
                            <label>{{__('Ja')}}</label>
                            <input id="" type="radio" name="material" value="0">
                            <label>{{__('Nee')}}</label>
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
