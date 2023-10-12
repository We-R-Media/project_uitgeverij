@extends('layouts.app')


@section('content')
    <form class="formContainer" {{route('vat.create')}} method="post">
        @csrf
        <input type="text" placeholder="Vul landcode in..." name="country_code" id="">
        <input type="number" placeholder="Btw percentage 0..." name="percentage_zero" id="">
        <input type="number" placeholder="Btw percentage laag..." name="percentage_low" id="">
        <input type="number" placeholder="Btw percentage hoog..." name="percentage_high" id="">
        <button type="submit">Toevoegen</button>
    </form>
@endsection