@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('tax.store') }}" method="post">
            @csrf
            @method('post')

            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">

                        <x-form.select
                            name="country"
                            label="Land"
                            :options="[
                                'Nederland',
                                'Duitsland',
                            ]"
                        />
                        <x-form.input type="number" name="zero" label="BTW 0" />
                        <x-form.input type="number" name="low" label="BTW laag" />
                        <x-form.input type="number" name="high" label="BTW hoog" />
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
