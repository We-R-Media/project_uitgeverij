@extends('layouts.app')



@section('title', $pageTitle)
@section('content')
    @foreach ($sellers as $seller )
        <a href="{{route('sellers.edit', $seller->id)}}">
            <p>{{$seller->id}} - {{$seller->first_name}} - {{$seller->last_name}}</p>
        </a>
    @endforeach
@endsection