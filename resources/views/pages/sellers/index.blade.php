@extends('layouts.app')



@section('title', $pageTitle)

@section('content')
    <div class="page__wrapper">
        <ul class="items__view">
            @foreach ($sellers as $seller)
                <li class="item">
                    <div class="item__content">
                        <a href="{{route('sellers.edit', $seller->id)}}">
                            <h3>{{ $seller->first_name}} {{$seller->last_name}}</h3>
                        </a>
                        <div class="item__actions">
                            <a href="{{route('sellers.edit', $seller->id)}}">Bewerken</a>
                        </div>
                    </div>
                    <div class="item__summery">
                        <div class="field">

                        </div>
                    </div>
                </li>
            @endforeach 
        </ul>
    </div>

@endsection