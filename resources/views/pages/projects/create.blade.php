@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{route('projects.store')}}" method="post">
            @csrf
            @method('post')
            <div class="form__wrapper">
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Algemeen') }}</h3>

                        <x-form.select
                            name="seller"
                            label="Verkoper"
                            :options="$users->pluck('first_name', 'id')"
                        />
                        <x-form.input type="text" name="name" label="Projectcode" />
                        <x-form.input type="text" name="paper_format" label="Formaat" />
                        <x-form.input type="text" name="release_name" label="Naam uitgave" />
                        <x-form.input type="text" name="edition_name" label="Editie" />
                        <x-form.input type="number" name="edition_amount" label="Oplage" />
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Financieel') }}</h3>

                        <x-form.select
                            name="layout"
                            label="Layout"
                            :options="$layouts->pluck('layout_name', 'id')"
                        />
                        <x-form.select
                            name="taxes"
                            label="BTW"
                            :options="$taxes->pluck('country', 'id')"
                        />

                        <x-form.input type="number" name="ledger" label="Grootboek" />
                        <x-form.input type="number" name="journal" label="Dagboek" />
                        <x-form.input type="number" name="cost_place" label="Kostenplaats" />
                        <x-form.input type="number" name="year" label="Jaar" />
                        <x-form.input type="number" name="revenue_goals" label="Omzetdoelstelling" />
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Paginagegevens') }}</h3>

                        <div class="field">
                            <label class="field__label">{{__("Aantal pagina's")}}</label>

                            <div class="field__row">
                                <x-form.input type="number" name="pages_redaction" label="Redactie" column="true" />
                                <x-form.input type="number" name="pages_adverts" label="Advertenties" column="true" />
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label">Cover</label>

                            <div class="field__row">
                                <x-form.input type="text" name="paper_type_cover" label="Papier cover" column="true" />
                                <x-form.input type="text" name="color_cover" label="Kleurgebruik cover" column="true" />
                            </div>
                        </div>
                        <div class="field">
                            <label class="field__label">{{__('Binnenwerk')}}</label>

                            <div class="field__row">
                                <x-form.input type="text" name="paper_type_interior" label="Papier binnenkant" column="true" />
                                <x-form.input type="text" name="color_interior" label="Kleurgebruik binnenkant" column="true" />
                            </div>
                        </div>
                    </div>
                    <div class="section__block">
                        <h3>{{ __('Vormgeving / drukker') }}</h3>

                        <x-form.input type="text" name="designer" label="Vormgever" />
                        <x-form.input type="text" name="printer" label="Drukker" />
                        <x-form.input type="number" name="client" label="Opdrachtgever" />
                        <x-form.input type="number" name="distribution" label="Verspreider" />
                    </div>
                </fieldset>
                <fieldset class="form__section">
                    <div class="section__block">
                        <h3>{{ __('Opmerkingen') }}</h3>

                        <div class="field field--column">
                            <textarea cols="30" rows="10" name="comments" placeholder="Vul opmerkingen in...">{{ old('comments') }}</textarea>
                            @error('comments')
                                <span class="form__message" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                        </div>
                    </div>
                </fieldset>
            </div>
            <x-form.submit />
        </form>
    </div>
@endsection
