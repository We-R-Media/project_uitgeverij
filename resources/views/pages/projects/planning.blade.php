@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
   <form action="{{ $project->planning ? route('projects.planning.update', $project->id) : route('projects.planning.store', $project->id) }}" method="post">
      @csrf
      @method('post')
   <div class="grid__wrapper">
        <fieldset class="fields base">
            <h3>{{__('Planning')}}</h3>




            <div class="field field-alt">
               <label for="sale_start">{{__('Start verkoop')}}</label>
               <input type="date" name="sale_start" id="">
               @error('sale_start')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="redaction_date">{{__('Redactie aanleveren')}}</label>
               <input type="date" name="redaction_date" id="">
               @error('redaction_date')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="adverts_date">{{__('Advertenties aanleveren')}}</label>
               <input type="date" name="adverts_date" id="">
               @error('adverts_date')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="printer_date">{{__('Aanleveren drukker')}}</label>
               <input type="date" name="printer_date" id="">
               @error('printer_date')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="distribution_date">{{__('Verspreider aanleveren')}}</label>
               <input type="date" name="distribution_date" id="">
               @error('distribution_date')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="appereance_date">{{__('Verspreider aanleveren')}}</label>
               <input type="date" name="appereance_date" id="">
               @error('appereance_date')
                  <span class="form__message">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

        </fieldset>

        <fieldset class="fields base">
         <h3>{{__('Controle')}}</h3>

         <div class="field field-alt">
            <label for="sale_started">{{__('Verkoop gestart')}}</label>
            <input type="date" name="sale_started" id="">
            @error('sale_started')
               <span class="form__message">
                  <small>{{ $message }}</small>
               </span>
            @enderror
         </div>

         <div class="field field-alt">
            <label for="redaction_received">{{__('Redactie aangeleverd')}}</label>
            <input type="date" name="redaction_received" id="">
            @error('redaction_received')
               <span class="form__message">
                  <small>{{ $message }}</small>
               </span>
            @enderror
         </div>

         <div class="field field-alt">
            <label for="adverts_received">{{__('Advertenties aangeleverd')}}</label>
            <input type="date" name="adverts_received" id="">
            @error('adverts_received')
               <span class="form__message">
                  <small>{{ $message }}</small>
               </span>
            @enderror
         </div>

         <div class="field field-alt">
            <label for="printer_received">{{__('Drukker aangeleverd')}}</label>
            <input type="date" name="printer_received" id="">
            @error('printer_received')
               <span class="form__message">
                  <small>{{ $message }}</small>
               </span>
            @enderror
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
