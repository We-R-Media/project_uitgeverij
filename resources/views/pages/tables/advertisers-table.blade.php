@extends('layouts.app')


@section('content')

<div class="tableContainer">
    <table class="tableContent">
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
            <td>{{$contact->first_name}} {{$contact->last_name}}</td>
            <td><button id="addContact" data-fullname="{{$contact->full_name}}">X</button></td>
        </tr>
        @endforeach
    </table>
    <table class="tableContent">
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
        </tr>
        @endforeach
    </table>
</div>


@endsection