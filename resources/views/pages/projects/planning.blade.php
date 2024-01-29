@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
<div class="page__wrapper">
    <form action="{{ $project->planning ? route('projects.planning.update', $project->id) : route('projects.planning.store', $project->id) }}" method="post">
        @csrf
        @method('post')

        <div class="form__wrapper">
            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Planning')}}</h3>

                    <div class="field">
                        <label class="field__label" for="sale_start">{{__('Start verkoop')}}</label>
                        <input type="date" name="sale_start">
                        @error('sale_start')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="redaction_date">{{__('Redactie aanleveren')}}</label>
                        <input type="date" name="redaction_date">
                        @error('redaction_date')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="adverts_date">{{__('Advertenties aanleveren')}}</label>
                        <input type="date" name="adverts_date">
                        @error('adverts_date')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="printer_date">{{__('Aanleveren drukker')}}</label>
                        <input type="date" name="printer_date">
                        @error('printer_date')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="distribution_date">{{__('Verspreider aanleveren')}}</label>
                        <input type="date" name="distribution_date">
                        @error('distribution_date')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="appereance_date">{{__('Verspreider aanleveren')}}</label>
                        <input type="date" name="appereance_date">
                        @error('appereance_date')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset class="form__section">
                <div class="section__block">

                    <h3>{{__('Controle')}}</h3>

                    <div class="field">
                        <label class="field__label" for="sale_started">{{__('Verkoop gestart')}}</label>
                        <input type="date" name="sale_started">
                        @error('sale_started')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="redaction_received">{{__('Redactie aangeleverd')}}</label>
                        <input type="date" name="redaction_received">
                        @error('redaction_received')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="adverts_received">{{__('Advertenties aangeleverd')}}</label>
                        <input type="date" name="adverts_received">
                        @error('adverts_received')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="field__label" for="printer_received">{{__('Drukker aangeleverd')}}</label>
                        <input type="date" name="printer_received">
                        @error('printer_received')
                        <span class="form__message">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>
                </div>
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
