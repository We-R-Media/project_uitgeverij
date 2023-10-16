@extends('layouts.app')

@section('content')
    <form class="formContainer-companies" action="{{route('advertisers.create')}}" method="post">
        @csrf

        <div class="formBlock-companies">
        <input type="text" class="@error('company_name') is-invalid @enderror" value="{{ old('company_name') }}" name="company_name" placeholder="Vul bedrijfsnaam in..." id="">
        @if($errors->has('company_name'))
        <p class="error-message">{{$errors->first('company_name')}}</p>
        @endif 

        <input type="text" class="@error('mailbox') is-invalid @enderror" value="{{ old('mailbox') }}" name="mailbox" placeholder="Vul postadres in..." id="">
        @if($errors->has('mailbox'))
        <p class="error-message">{{$errors->first('mailbox')}}</p>
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

        <input type="text" class="@error('phone_mobile') is-invalid @enderror" value="{{ old('phone_mobile') }}" name="phone_mobile" placeholder="Vul mobiele nummer in..." id="">
        @if($errors->has('phone_mobile'))
        <p class="error-message">{{$errors->first('phone_mobile')}}</p>
        @endif 

        <input type="text" class="@error('phone_number') is-invalid @enderror" value="{{ old('phone_number') }}" name="phone_number" placeholder="Vul telefoonnummer nummer in..." id="">
        @if($errors->has('phone_number'))
        <p class="error-message">{{$errors->first('phone_number')}}</p>
        @endif 

        <input type="text" class="@error('contact') is-invalid @enderror" value="{{ old('contact') }}" name="contact" placeholder="Vul contactpersoon in..." id="nameInput">
        @if($errors->has('contact'))
        <p class="error-message">{{$errors->first('contact')}}</p>
        @endif 


        <button type="submit">Toevoegen</button>
    </div>



    {{-- <select name="contact" id="">
    @foreach($contacts as $contact)
    <option name="contact_input" value="{{$contact->full_name}}">{{$contact->full_name}}</option>
    @endforeach
    </select> --}}

    </form>

    <table class="contactsTable">
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
            {{-- Tijdelijke --}}
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
    </div>
@endsection
