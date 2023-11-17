@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('formats.update', $format->id) }}" method="post">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">

                    <div class="field field-alt">
                        <label for="format_id">{{__('Formaat ID')}}</label>
                        <input type="number" value="{{ $format->id }}" name="format_id" id="" disabled>
                        @error('format_id')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="project_id">{{__('Projectcode')}}</label>
                        <input type="number" value="{{ $format->project_id }}" name="project_id" id="" disabled>
                        @error('project_id')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="size">{{__('Grootte')}}</label>
                        <input type="text" value="{{ $format->size }}" name="size" id="">
                        @error('size')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="field field-alt">
                        <label for="measurement">{{__('Afmeting')}}</label>
                        <input type="text" value="{{ $format->measurement }}" name="measurement" id="">
                        @error('measurement')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="ratio">{{__('Verhouding')}}</label>
                        <input type="text" value="{{ $format->ratio }}" name="ratio" id="">
                        @error('ratio')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="price">{{__('Prijs')}}</label>
                        <input type="text" value="{{ $format->price }}" name="price" id="">
                        @error('price')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </fieldset>
            </div>
            <div class="ButtonGroup">
                <div class="buttons">
                    <button type="submit" class="button button--action">Opslaan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
