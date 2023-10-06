@extends('layouts.app')

@section('content')
    <form class="formContainer" action="{{route('contacts.create')}}" method="post">
        @csrf
        <input type="text" name="first_name" placeholder="Voer voornaam in..." id="">
        <input type="text" name="initial" placeholder="Voer initiaal in..." id="">
        <input type="text" name="insertion" placeholder="Voer tusselvoegsel in..." id="">
        <input type="text" name="last_name" placeholder="Voer achternaam in..." id="">
        <input type="email" name="email" placeholder="Voer email in..." id="">
        <button type="submit">Toevoegen</button>
    </form>
@endsection