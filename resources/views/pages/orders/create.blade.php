@extends('layouts.app')

@section('seo_title', $pageTitleSection)

@section('content')

    <div class="page__wrapper">
        <form action="{{ route('orders.store', $advertiser->id) }}" method="post">
            @csrf
            @method('post')

            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{__('Bevestiginsadres')}}</h3>

                    <div class="field field-alt">
                        <label for="advertiser_id">{{ __('Klantnummer') }}</label>
                        <input type="text" name="advertiser_id" value="{{$advertiser->id}}" disabled>
                        @error('advertiser_id')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name" value="{{$advertiser->name}}" disabled>
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="po_box">{{ __('Postadres') }}</label>
                        <input type="text" name="po_box" value="{{$advertiser->po_box}}" disabled>
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="postal_code">{{ __('Postcode') }}</label>
                        <input type="text" name="postal_code" value="{{$advertiser->postal_code}}" disabled>
                        @error('postal_code')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="city">{{ __('Woonplaats') }}</label>
                        <input type="text" name="city" value="{{$advertiser->city}}" disabled>
                        @error('city')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="province">{{ __('Provincie') }}</label>
                        <input type="text" name="province" value="{{$advertiser->province}}" disabled>
                        @error('province')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="phone">{{ __('Telefoon') }}</label>
                        <input type="text" name="phone" value="{{$advertiser->phone}}" disabled>
                        @error('phone')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>


                    <div class="field field-alt">
                        <label for="phone_mobile">{{ __('Mobiel') }}</label>
                        <input type="text" name="phone_mobile" value="{{$advertiser->phone_mobile}}" disabled>
                        @error('phone_mobile')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="email">{{ __('E-mailadres') }}</label>
                        <input type="text" name="email" value="{{$advertiser->email}}" disabled>
                        @error('email')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="contact">{{__('Contactpersoon')}}</label>
                        <select name="contact" id="">
                            @foreach ($advertiser->contacts as $contact)
                                <option value="{{ $contact->id }}" {{ $contact->role == 1 ? 'selected' : '' }}>
                                    {{ $contact->salutation }} {{ $contact->initial }} {{ $contact->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field field-alt">
                        <label for="project_id">{{__('Projectcode')}}</label>
                        <select name="project_id" id="">
                            @foreach ($projects as $project )
                                    <option value="{{$project->id}}">{{$project->id}} - {{$project->release_name}}</option>
                                @endforeach
                        </select>
                    </div>

                </fieldset>

                <fieldset class="fields options">
                    <h3>{{__('Afwijkend factuuradres')}}</h3>

                    <div class="field field-alt">
                        <label for="advertiser_id">{{ __('Klantnummer') }}</label>
                        <input type="text" name="advertiser_id" value="{{$advertiser->id}}" disabled>
                        @error('advertiser_id')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="field field-alt">
                        <label for="name">{{ __('Bedrijfsnaam') }}</label>
                        <input type="text" name="name">
                        @error('name')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="po_box">{{ __('Postadres') }}</label>
                        <input type="text" name="po_box">
                        @error('po_box')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="postal_code">{{ __('Postcode') }}</label>
                        <input type="text" name="postal_code">
                        @error('postal_code')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    
                    <div class="field field-alt">
                        <label for="city">{{ __('Woonplaats') }}</label>
                        <input type="text" name="city">
                        @error('city')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="province">{{ __('Provincie') }}</label>
                        <input type="text" name="province">
                        @error('province')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="email">{{ __('E-mailadres') }}</label>
                        <input type="text" name="email">
                        @error('email')
                            <span class="form__message" role="alert">
                                <small>{{ $message }}</small>
                            </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="contact-alt">{{__('Contactpersoon')}}</label>
                        <select name="contact-alt" id="">
                            @foreach ($advertiser->contacts as $contact )
                                <option value="{{$contact->id}}">
                                    {{$contact->salutation}}
                                     {{$contact->initial}} 
                                     {{$contact->last_name}}
                                    </option>
                            @endforeach
                        </select>
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
