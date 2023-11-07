@extends('layouts.app')

@section('title', $pageTitle)
@section('content')

<div class="page_wrapper">

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
                    <h5>{{$layout->city_name}}</h5>
                    <div class="item__actions">
                        <a href="{{route('layouts.edit', $layout->id)}}">Bewerken</a>
                    </div>
                </div>
            </li>
        @endforeach

    </ul>
</div>

@endsection