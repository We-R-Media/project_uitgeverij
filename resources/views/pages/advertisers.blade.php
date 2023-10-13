@extends('layouts.app')

@section('content')
    <form class="formContainer" action="{{route('companies.create')}}" method="post">
        @csrf
        <input type="text" name="company_name" placeholder="Vul bedrijfsnaam in..." id="">
        <input type="text" name="mailbox" placeholder="Vul postadres in..." id="">
        <input type="text" name="postal_code" placeholder="Vul postcode in..." id="">
        <input type="text" name="city" placeholder="Vul woonplaats in..." id="">
        <input type="text" name="province" placeholder="Vul provincie in..." id="">
        <input type="number" name="phone_mobile" placeholder="Vul mobiele nummer in..." id="">
        <input type="number" name="phone_number" placeholder="Vul telefoonnummer in..." id="">

        <select name="contact" id="">
            @foreach($contacts as $contact)
                <option name="contact_input" value="{{$contact->full_name}}">{{$contact->full_name}}</option>
            @endforeach
        </select>

        <button type="submit">Toevoegen</button>
    </form>

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
            @foreach($records as $advertiser)
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
