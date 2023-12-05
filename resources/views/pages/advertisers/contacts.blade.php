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
               <div class="dropdown">
                  <select name="salutation" id="" class="select2">
                     <option value="Dhr.">{{__('Dhr.')}}</option>
                     <option value="Mw.">{{__('Mw.')}}</option>
                  </select>
               </div>
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
         <fieldset class="fields base">
            <ul class="items__view">
               <div class="items__head">
                  <div class="item item__head">
                     <div class="item__content">
                        <div>{{__('Naam')}}</div>
                     </div>
                     <div class="item__summary">
                        <div>{{__('E-mailadres')}}</div>
                        <div>{{__('Rol')}}</div>
                     </div>
                  </div>
               </div>
               @if($advertiser->contacts->count() > 0)
                  @foreach ($advertiser->contacts as $contact )
                  <li class="item {{ $contact->trashed() ? 'item--thrashed' : 'item--default' }}">
                     <div class="item__content">
                        <div class="field">
                           {{$contact->initial}} {{$contact->last_name}}
                        </div>
                     </div>
                     <div class="item__summary">
                        <div class="field">
                           {{$contact->email}}
                        </div>
                        <div class="field">
                              @if ($contact->role == 1)
                              {{$aliases[$contact->role]}}
                              @else
                              {{__('')}}
                              @endif
                        </div>
                     </div>
                     <div class="item__actions">
                        <div class="actions__button">
                           <div class="icon">
                              <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                           </div>
                           <div class="actions__group">
                              @if ( $contact->trashed() )
                                 <a href="{{ route('advertisers.contacts.restore', $contact->id)}}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                              @else
                                 <a href="{{ route('advertisers.contacts.destroy', [$contact->advertiser_id, $contact->id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                              @endif
                           </div>
                        </div>
                     </div>
                  </li>
                  @endforeach
               @endif
            </ul>
         </fieldset>
      </div>
   </form>
</div>

@endsection
