@extends('layouts.app')


@section('content')
    @if (DB::table('format_group')->count() > 0)
        <form class="formContainer" action="{{route('formats.create')}}" method="post">
            @csrf
            <input type="text" name="format_name" placeholder="Geef formaat een naam..." id="">
            <input type="text" name="format_name" placeholder="Geef formaat een naam..." id="">
            <button type="submit">Toevoegen</button>
        </form>
    @else 
    @endif
@endsection