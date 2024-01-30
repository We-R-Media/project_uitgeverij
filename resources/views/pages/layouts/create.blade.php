@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')

<div class="page__wrapper">
    <form action="{{ route('layouts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <x-form.input type="text" name="layout_name" label="Layout naam" />
                    <x-form.input type="text" name="city_name" label="Plaatsnaam" />
                    <x-form.input type="file" name="image" label="Logo" />
                </div>
            </fieldset>
            <fieldset class="form__section">

            </fieldset>
        </div>

        <x-form.submit />
    </form>
</div>

@endsection
