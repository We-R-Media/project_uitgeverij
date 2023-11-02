@extends('layouts.app')

@section('content')

<div class="buttonContainer">
    <form action="{{route('advertisers.show')}}" method="post" class="buttonContainer">
        @csrf
        <button name="showContacts" class="showContacts">Contactpersonen</button>
        <button name="showAdvertisers" class="showAdvertisers">Relaties</button>
    </form>
</div>


<div class="tableContainer">

    @if(request()->has('showContacts'))
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
        </tr>
        @endforeach
    </table>
    @elseif (request()->has('showAdvertisers'))
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
            <th>Contactpersoon</th>
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
            <td>{{$advertiser->contact_id}}</td>
        </tr>
        @endforeach
    </table>
    @endif
</div>

@endsection
