@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('reminders.update', $reminder->id) }}" method="post" class="formContainer">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{__('Aanmaning')}}</h3>

                    <div class="field field-alt">
                        <label for="id">{{__('ID')}}</label>
                        <input type="number" name="id" value="{{ $reminder->id }}"placeholder="{{__('Aantal dagen')}}" disabled>
                        @error('id')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="period_first">{{__('Periode tussen 1e en 2e herrinnering')}}</label>
                        <input type="number" name="period_first" value="{{ $reminder->period_first }}"placeholder="{{__('Aantal dagen')}}">
                        @error('period_first')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="period_second">{{__('Periode tussen 1e en 2e aanmaning')}}</label>
                        <input type="number" name="period_second" value="{{ $reminder->period_second }}"placeholder="{{__('Aantal dagen')}}">
                        @error('period_second')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="period_third">{{__('Periode tussen aanmaning en incasso')}}</label>
                        <input type="number" name="period_third" value="{{ $reminder->period_third }}"placeholder="{{__('Aantal dagen')}}">
                        @error('period_third')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="administration_first">{{__('Administratiekosten herrinnering')}}</label>
                        <input type="number" name="administration_first" value="{{ $reminder->administration_cost_first }}"placeholder="{{__('Vul kosten in')}}">
                        @error('administration_first')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="administration_second">{{__('Administratiekosten herrinnering')}}</label>
                        <input type="number" name="administration_second" value="{{ $reminder->administration_cost_second }}"placeholder="{{__('Vul kosten in')}}">
                        @error('administration_second')
                            <span class="form__message">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror 
                    </div>

                    <div class="field field-alt">
                        <label for="contact_debtor">{{__('Contactpersoon debiteur')}}</label>
                        <input type="text" name="contact_debtor" value="{{ $reminder->contact_debtor }}"placeholder="{{__('Vul contactpersoon in')}}">
                        @error('contact_debtor')
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