@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
   <form action="{{ route('advertisers.contacts.store', $advertiser->id) }}" method="post" class="formContainer">
      @csrf
      @method('post')
      <div class="grid__wrapper">
         <fieldset class="fields base">
            <h3>{{__('Contactpersoon')}}</h3>

            <div class="field field-alt">
               <label for="salutation">{{__('Aanhef')}}</label>
               <input type="text" name="salutation" id="">
               @error('salutation')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="initial">{{__('Voorletter')}}</label>
               <input type="text" name="initial" id="">
               @error('initial')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="preposition">{{__('Tussenvoegsel')}}</label>
               <input type="text" name="preposition" id="">
               @error('preposition')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="first_name">{{__('Voornaam')}}</label>
               <input type="text" name="first_name" id="">
               @error('first_name')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="last_name">{{__('Achternaam')}}</label>
               <input type="text" name="last_name" id="">
               @error('last_name')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="phone">{{__('Telefoonnummer')}}</label>
               <input type="text" name="phone" id="">
               @error('phone')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            <div class="field field-alt">
               <label for="email">{{__('E-mailadres')}}</label>
               <input type="email" name="email" id="">
               @error('email')
                  <span class="form__message" role="alert">
                     <small>{{ $message }}</small>
                  </span>
               @enderror
            </div>

            @if (!$advertiser->contacts->where('role', 1)->count() == 1)
               <div class="field field-alt">
                  <label for="role">{{__('Rol')}}</label>
                  <div class="radio__group">
                     <label>{{__('Primair')}}</label>
                     <input type="radio" name="role" value="1">
                  </div>
            </div>
            @endif

            <textarea name="comments" id="" cols="30" rows="10" placeholder="{{__('Vul opmerkingen in...')}}"></textarea>
            <button type="submit" class="button button--action">{{__('Nieuwe toevoegen')}}</button>
         </fieldset>

      </div>
   </form>
</div>



@endsection
