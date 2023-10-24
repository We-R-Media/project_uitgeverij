
@extends('layouts.app')

@section('content')
    <a class="detailsButton nav-item" href="{{ route('advertisers.details') }}">Details</a>
    <form class="formContainer" action="{{route('advertisers.create')}}" method="post">
        @csrf
        @method('post')

        <div class="formBlock">
        <input type="text" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" placeholder="Vul bedrijfsnaam in..." id="">
        @if($errors->has('name'))
        <p class="error-message">{{$errors->first('name')}}</p>
        @endif 

        <input type="text" class="@error('po_box') is-invalid @enderror" value="{{ old('po_box') }}" name="po_box" placeholder="Vul postadres in..." id="">
        @if($errors->has('po_box'))
        <p class="error-message">{{$errors->first('po_box')}}</p>
        @endif 

        <input type="text" class="@error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}" name="postal_code" placeholder="Vul postcode in..." id="">
        @if($errors->has('postal_code'))
        <p class="error-message">{{$errors->first('postal_code')}}</p>
        @endif 

        <input type="text" class="@error('city') is-invalid @enderror" value="{{ old('city') }}" name="city" placeholder="Vul woonplaats in..." id="">
        @if($errors->has('city'))
        <p class="error-message">{{$errors->first('city')}}</p>
        @endif 

        <input type="text" class="@error('province') is-invalid @enderror" value="{{ old('province') }}" name="province" placeholder="Vul provincie in..." id="">
        @if($errors->has('province'))
        <p class="error-message">{{$errors->first('province')}}</p>
        @endif 

        <input type="number" class="@error('phone_mobile') is-invalid @enderror" value="{{ old('phone_mobile') }}" name="phone_mobile" placeholder="Vul mobiele nummer in..." id="">
        @if($errors->has('phone_mobile'))
        <p class="error-message">{{$errors->first('phone_mobile')}}</p>
        @endif 

        <input type="number" class="@error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" placeholder="Vul telefoonnummer nummer in..." id="">
        @if($errors->has('phone'))
        <p class="error-message">{{$errors->first('phone')}}</p>
        @endif 

        
        <input type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" placeholder="Vul email in..." id="">
        @if($errors->has('email'))
        <p class="error-message">{{$errors->first('email')}}</p>
        @endif 

        <select name="contact_id" id="">
            @foreach ($contacts as $contact )
                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
            @endforeach
        </select>


        <button type="submit">Toevoegen</button>
        <a href="{{route('advertisers.process')}}">Nieuwe order</a>
    </div>
    </form>
@endsection
