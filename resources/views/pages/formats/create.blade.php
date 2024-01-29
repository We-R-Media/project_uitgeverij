@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('formats.store', $project->id) }}" method="post">
            @csrf
            @method('post')
            <div class="form__wrapper">
                <fieldset class="form__section">
                    <x-form.input type="text" name="format_title" label="Titel" :value="$project->name" />
                    <x-form.input type="text" name="size" label="Grootte" />
                    <x-form.input type="text" name="measurement" label="Afmeting" />
                    <x-form.input type="text" name="ratio" label="Verhouding" />
                    <x-form.input type="number" name="price" label="Prijs" />
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
