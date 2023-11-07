@extends('layouts.app')

@section('title', $pageTitle)
@section('content')

<div class="page__wrapper">

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{route('layouts.create')}}" class="button button--action">{{__('Nieuwe layout')}}</a>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($layouts as $layout)
            <li class="item">
                <div class="item__content">
                    <a href="{{route('layouts.edit', $layout->id)}}">
                        <h3>{{ $layout->layout_name}}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{route('layouts.edit', $layout->id)}}">{{__('Bewerken')}}</a>
                        <a href="#" class="delete" data-id="{{ $layout->id }}" data-action="{{--route('layouts.destroy', $layout->id) --}}">Delete</a>
                    </div>
                </div>
                <div class="item__summery">
                    <div class="field">
                        <label>{{__('Plaatsnaam')}}</label>
                        {{$layout->city_name}}
                    </div>
                    <div class="field">
                        <label>{{__('Logo')}}</label>
                        @if (!empty($layout->logo))
                            {{$layout->logo}}
                        @else
                            {{__('N.v.t.')}}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection