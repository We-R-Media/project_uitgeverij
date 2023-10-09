@extends('layouts.app')


@section('content')
    <form class="formContainer" action="{{route('formats.create')}}" method="post">
        @csrf
        <input type="text" name="format_name" placeholder="Geef formaat een naam..." id="">
        <input type="text" name="format_name" placeholder="Geef formaat een naam..." id="">
    </form>
@endsection