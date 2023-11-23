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
<<<<<<< HEAD

                    @livewire('base-price-calculate', ['order' => $order], key($order->id))

=======
                    <div class="field field-alt">
                        <label for="format">{{__('Formaat')}}</label>
                        <div class="dropdown">
                            <select class="select2" name="format" id="format">
                                @foreach ($order->project->formats as $format)
                                    <option value="{{ $format->paper_type }}">{{ $format->size }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="field field-alt">
                        <label for="base_price">{{ __('Basisbedrag') }}</label>
                        <input type="text" name="base_price" id="base_price">
                        @error('base_price')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
>>>>>>> 62a8599181f5a9650e78c133d2ff9dd8bbc7b729
                    <div class="field field-alt">
                        <label for="discount">{{__('Korting')}}</label>
                        <input type="text" name="discount" id="discount">
                        @error('discount')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
<<<<<<< HEAD

                    <div class="field field-alt">
                        <label for="material">{{ __('Materiaal') }}</label>
                        <div class="radio__group">
                            <input id="" type="radio" name="material" value="1">
                            <label>{{__('Ja')}}</label>
                            <input id="" type="radio" name="material" value="0">
                            <label>{{__('Nee')}}</label>
                    </div>
                    

=======
>>>>>>> 62a8599181f5a9650e78c133d2ff9dd8bbc7b729
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
