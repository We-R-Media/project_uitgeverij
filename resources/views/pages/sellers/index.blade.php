@extends('layouts.app')



@section('title', $pageTitle)

@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{--route('sellers.create')--}}" class="button button--action">{{__('Nieuwe verkoper')}}</a>
            </div>
        </div>

        <ul class="items__view">
            @foreach ($sellers as $seller)
                <li class="item">
                    <div class="item__content">
                        <a href="{{route('sellers.edit', $seller->id)}}">
                            <h3>{{ $seller->first_name}} {{$seller->last_name}}</h3>
                        </a>
                        <div class="item__actions">
                            <a href="{{route('sellers.edit', $seller->id)}}">Bewerken</a>
                            <a href="#" class="delete" data-id="{{ $seller->id }}" data-action="{{--route('sellers.destroy', $seller->id) --}}">Delete</a>
                        </div>
                    </div>
                    <div class="item__summery">
                        <div class="item__format field">
                            <label>E-mailadres</label>
                            {{$seller->email}}
                        </div>
                        <div class="item__pages field">
                            <label>Aangemaakt op:</label>
                            {{$seller->created_at}}
                        </div>
                    </div>
                </li>
            @endforeach 
        </ul>
    </div>

@endsection