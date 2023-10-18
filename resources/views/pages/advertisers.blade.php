
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

        {{-- <input type="text" class="@error('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" placeholder="Vul contactpersoon in..." id="nameInput">
        @if($errors->has('contact'))
        <p class="error-message">{{$errors->first('contact')}}</p>
        @endif  --}}


        <button type="submit">Toevoegen</button>
        <button href="{{route('advertisers.process')}}">Nieuwe order</button>
    </div>



    {{-- <select name="contact" id="">
    @foreach($contacts as $contact)
    <option name="contact_input" value="{{$contact->full_name}}">{{$contact->full_name}}</option>
    @endforeach
    </select> --}}

    </form>

    {{-- <table class="contactsTable">
        <tr>
            <th>Voornaam</th>
            <th>Initiaal</th>
            <th>Tussenvoegsel</th>
            <th>Achternaam</th>
            <th>E-mail</th>
            <th>Volledige naam</th>
        </tr>
        @foreach($contacts as $contact)
        <tr>
            <td>{{$contact->first_name}}</td>
            <td>{{$contact->initial}}</td>
            <td>{{$contact->insertion}}</td>
            <td>{{$contact->last_name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->full_name}}</td>
            <td><button id="addContact" data-fullname="{{$contact->full_name}}">X</button></td>
        </tr>
        @endforeach
    </table>

    <div class="tableContainer">
        <table class="companiesTable">
            <tr>
                <th>Klantnummer</th>
                <th>Bedrijfsnaam</th>
                <th>Actief (datum)</th>
                <th>Postadres</th>
                <th>Postcode</th>
                <th>Woonplaats</th>
                <th>Mobiel</th>
                <th>Telefoon</th>
            </tr>
            @foreach($advertisers as $advertiser)
            <tr>
                <td>{{$advertiser->id}}</td>
                <td>{{$advertiser->name}}</td>
                <td>{{$advertiser->deactivated_at}}</td>
                <td>{{$advertiser->po_box}}</td>
                <td>{{$advertiser->postal_code}}</td>
                <td>{{$advertiser->city}}</td>
                <td>{{$advertiser->phone_mobile}}</td>
                <td>{{$advertiser->phone}}</td>
                <td><a href="#">Bewerken</a></td>
                <td><a href="#">Verwijderen</a></td>
            </tr>
            @endforeach
        </table>
    </div> --}}
@endsection
