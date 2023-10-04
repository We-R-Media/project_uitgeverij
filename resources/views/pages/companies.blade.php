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
        <button type="submit">Verzenden</button>
    </form>
{{-- 
    @foreach($records as $record)
        <li>{{$record->company_name}}</li>
    @endforeach --}}
@endsection