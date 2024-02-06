@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="form__wrapper">
            <fieldset class="form__section">
                <form action="{{ route('advertisers.contacts.store', $advertiser->id) }}" method="post">
                    @csrf
                    @method('post')

                    <div class="section__block">
                        <h3>{{__('Contactpersoon toevoegen')}}</h3>

                        <x-form.select
                            name="salutation"
                            label="Aanhef"
                            :options="['Dhr.' => __('Dhr.'), 'Mw.' => __('Mw.')]"
                        />
                        <x-form.input type="text" name="initial" label="Voorletter" />
                        <x-form.input type="text" name="preposition" label="Tussenvoegsel" />
                        <x-form.input type="text" name="first_name" label="Voornaam" />
                        <x-form.input type="text" name="last_name" label="Achternaam" />
                        <x-form.input type="text" name="phone" label="Telefoonnummer" />
                        <x-form.input type="text" name="email" label="E-mailadres" />

                        {{-- @if (!$advertiser->contacts->where('role', 1)->count() == 1)
                            <div class="field">
                                <label class="field__label" for="role">{{__('Rol')}}</label>
                                <div class="radio__group">
                                    <label>{{__('Primair')}}</label>
                                    <input type="radio" name="role" value="1">
                                </div>
                            </div>
                        @endif --}}
                    </div>
                    <div class="section__block">
                        <h3>{{__('Opmerkingen')}}</h3>
                        {{-- Component voor textarea --}}
                        <x-form.textarea name="comments" label="{{__('Opmerkingen')}}" rows="10" cols="30" :extraAttributes="['maxlength' => 100]"></x-form.textarea>

                        {{-- Oorspronkelijke textarea --}}
                        {{-- <div class="field field--column">
                            <label class="field__label" for="role">{{__('Opmerkingen')}}</label>
                            <textarea name="comments" cols="30" rows="10" placeholder="{{__('Vul opmerkingen in...')}}"></textarea>
                        </div> --}}
                    </div>
               
                    <x-form.submit />
                </form>
            </fieldset>

            <fieldset class="form__section">
                <div class="section__block">
                    <h3>{{__('Contactpersonen')}}</h3>
                    <div class="items__table">
                        <div class="items__row row--head">
                            <div class="item--cell">
                                {{__('Naam')}}
                            </div>
                            <div class="item--cell">
                                {{__('E-mailadres')}}
                            </div>
                            <div class="item--cell">
                                {{__('Rol')}}
                            </div>
                            <div class="item--action">
                                {{-- Spacer for actions --}}
                            </div>
                        </div>
                        @forelse ($advertiser->contacts as $contact )
                            <div class="items__row row--data {{ $contact->trashed() ? 'item--thrashed' : 'item--default' }}">
                                <div class="item--cell">
                                    <label class="cell__label">{{__('Naam')}}</label>
                                    {{$contact->initial}} {{$contact->last_name}}
                                </div>
                                <div class="item--cell">
                                    <label class="cell__label">{{__('E-mailadres')}}</label>
                                    {{$contact->email}}
                                </div>
                                <div class="item--cell">
                                    <label class="cell__label">{{__('Rol')}}</label>
                                    @if ($contact->role == 1)
                                    {{$aliases[$contact->role]}}
                                    @endif
                                </div>
                                <div class="item--actions">
                                    <div class="actions__button">
                                        <div class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512">
                                                <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" /></svg>
                                        </div>
                                        <div class="actions__group">
                                            @if ( $contact->trashed() )
                                                <a href="{{ route('advertisers.contacts.restore', $contact->id)}}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                            @else
                                                <a href="{{ route('advertisers.contacts.destroy', [$contact->advertiser_id, $contact->id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                                @if (!$contact->role)
                        
                                                    <form action="{{ route('advertisers.contacts.primary', [$contact->advertiser_id, $contact->id]) }}" id="primary-form" method="post">
                                                        @csrf
                                                        @method('post')
                                                        <button class="primary--btn" type="submit">{{__('Primair')}}</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="items__row row--data">
                                <p>{{__('Geen contacten gevonden')}}</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection
