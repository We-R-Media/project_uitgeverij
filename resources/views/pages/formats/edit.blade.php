@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('formats.update', [$format->id, $format->project_id]) }}" method="post">
            @csrf
            @method('post')
            <div class="form__wrapper">
                <fieldset class="form__section">
                    <x-form.input type="text" name="format_title" label="Titel" :value="$format->format_title" />
                    <x-form.input type="text" name="size" label="Grootte" :value="$format->size" />
                    <x-form.input type="text" name="measurement" label="Afmeting" :value="$format->measurement" />
                    <x-form.input type="text" name="ratio" label="Verhouding" :value="$format->ratio" />
                    <x-form.input type="number" name="price" label="Prijs" :value="money($format->price, 'EUR') " />
                </fieldset>
                <fieldset class="form__section">
                    {{--  --}}
                </fieldset>
            </div>

            <x-form.submit />
        </form>
    </div>
@endsection
