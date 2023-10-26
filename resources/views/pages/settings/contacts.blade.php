@extends('layouts.app')

@section('content')
    <form class="formContainer" action="{{route('contacts.create')}}" method="post">
        @csrf
        <div class="formBlock">
            <input type="text" value="{{ old('first_name') }}" class="@error ('first_name') is-invalid @enderror" name="first_name" placeholder="{{__('Voer voornaam in...')}}" id="">

            @if($errors->has('first_name'))
            <p class="error-message">{{$errors->first('first_name')}}</p>
            @endif

            <input type="text" value="{{ old('initial') }}" class="@error ('initial') is-invalid @enderror" name="initial" placeholder="{{__('Voer initiaal in...')}}" id="">

            @if($errors->has('initial'))
            <p class="error-message">{{$errors->first('initial')}}</p>
            @endif

            <input type="text" value="{{ old('preposition') }}" class="@error ('preposition') is-invalid @enderror" name="preposition" placeholder="{{__('Voer tusselvoegsel in...')}}" id="">
            
            @if($errors->has('preposition'))
            <p class="error-message">{{$errors->first('preposition')}}</p>
            @endif

            <input type="text" value="{{ old('last_name') }}" class="@error ('last_name') is-invalid @enderror" name="last_name" placeholder="{{__('Voer achternaam in...')}}" id="">

            @if($errors->has('last_name'))
            <p class="error-message">{{$errors->first('last_name')}}</p>
            @endif

            <input type="email" value="{{ old('email') }}" class="@error ('email') is-invalid @enderror" name="email" placeholder="{{__('Voer email in...')}}" id="">

            @if($errors->has('email'))
            <p class="error-message">{{$errors->first('email')}}</p>
            @endif

            <button type="submit">{{__('Toevoegen')}}</button>
        </div>
    </form>
@endsection