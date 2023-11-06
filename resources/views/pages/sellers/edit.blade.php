@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
@foreach ($sellers as $seller )
    <form class="formContainer" action="{{route('sellers.update', $seller->id)}}" method="post">
        @csrf
        <input type="number" placeholder="{{$seller->id}}" name="id" id="" disabled>
        <label for="first_name">{{__('Voornaam')}}</label>
        <input type="text" placeholder="{{$seller->first_name}}" name="first_name" id="">
        <label for="initial">{{__('Initiaal')}}</label>
        <input type="text" placeholder="{{$seller->initial}}" name="initial">
        <label for="last_name">{{__('Achternaam')}}</label>
        <input type="text" placeholder="{{$seller->last_name}}" name="last_name" id="">
        <label for="email">{{__('E-mailadres')}}</label>
        <input type="email" placeholder="{{$seller->email}}" name="email" id="">
        <button type="submit">Bijwerken</button>
    </form>
@endforeach
@endsection