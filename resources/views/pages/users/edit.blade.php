@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">
        <form class="formContainer" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('post')
            <div class="grid__wrapper">
                <fieldset class="fields base">
                    <h3>{{ __('Algemeen') }}</h3>

                    <div class="field field-alt">
                        <label for="id">{{__('ID')}}</label>
                        <input value="{{ $user->id }}" type="text" name="id" id="">
                        @error('id')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="first_name">{{__('Voornaam')}}</label>
                        <input value="{{ $user->first_name }}" type="text" name="first_name" id="">
                        @error('first_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="initial">{{__('Initiaal')}}</label>
                        <input value="{{ $user->initial }}" type="text" name="initial">    
                        @error('initial')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="preposition">{{__('Tussenvoegsel')}}</label>
                        <input value="{{ $user->preposition }}" type="text" name="preposition">    
                        @error('preposition')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="gender">{{__('Gender')}}</label>
                        <select name="gender" id="">
                            <option value="male">Man</option>
                            <option value="female">Vrouw</option>
                            <option value="other">Zeg ik liever niet</option>
                        </select>
                    </div>

                    <div class="field field-alt">
                        <label for="role">{{__('Rol')}}</label>
                        <select name="role" id="">
                            <option value="seller">Verkoper</option>
                            <option value="supervisor">Administratie</option>
                            <option value="admin">Beheerder</option>
                        </select>
                    </div>



                    <div class="field field-alt">
                        <label for="last_name">{{__('Achternaam')}}</label>
                        <input value="{{ $user->last_name }}" type="text" name="last_name" id=""> 
                        @error('last_name')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror   
                    </div>

            
                    <div class="field field-alt">
                        <label for="email">{{__('E-mailadres')}}</label>
                        <input value="{{ $user->email }}" type="email" name="email" id="">
                        @error('email')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                    <div class="field field-alt">
                        <label for="password">{{__('Wachtwoord')}}</label>
                        <input  type="password" name="password" id="">
                        @error('password')
                        <span class="form__message" role="alert">
                            <small>{{ $message }}</small>
                        </span>
                        @enderror
                    </div>

                </fieldset>
                
            </div>
            <div class="ButtonGroup">
                <div class="buttons">
                    <button type="submit" class="button button--action">{{ __('Opslaan') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection