@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">

        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('tax.create') }}" class="button button--action">Nieuw</a>
            </div>
        </div>

        @foreach ($taxes as $tax)
        <ul class="items__view">
            <li class="item">
                <div class="item__content">
                    <a href=" {{ route('tax.edit', $tax->id) }} ">
                        <h3>{{$tax->country}}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('tax.edit', $tax->id) }}">{{__('Bewerken')}}</a>
                        <a href="#" data-action="{{ route('tax.destroy', $tax->id) }}" data-id="{{ $tax->id }}" class="delete">{{__('Verwijderen')}}</a>
                    </div>
                </div>
            </li>
        </ul>
        @endforeach
    </div>
@endsection