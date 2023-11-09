@extends('layouts.app')

@section('title', $pageTitle)
@section('content')

<div class="page__wrapper">

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{route('layouts.create')}}" class="button button--action">{{__('Nieuwe layout')}}</a>
        </div>
    </div>

    <div class="items__head">
        <div class="item item__head">
            <div class="item__content">
                <div>{{__('Titel')}}</div>
            </div>
            <div class="item__summery">
                <div>{{__('Plaatsnaam')}}</div>
                <div>{{__('Logo')}}</div>
            </div>
            <div class="item__actions">
                <div>{{--__('Actions')--}}</div>
            </div>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($layouts as $layout)
            <li class="item">
                <div class="item__content">
                    <a href="{{route('layouts.edit', $layout->id)}}">
                        <h3>{{ $layout->layout_name}}</h3>
                    </a>
                </div>
                <div class="item__summery">
                    <div class="field">
                        <label>{{__('Plaatsnaam')}}</label>
                        {{$layout->city_name}}
                    </div>
                    <div class="field">
                        <label>{{__('Logo')}}</label>
                        @if (!empty($layout->logo))
                            <div class="logo__preview"><a href="{{asset($layout->logo)}}" target="_blank">Bekijk afbeelding</a></div>
                        @else
                            {{--__('Geen afbeelding geupload.')--}}
                        @endif
                    </div>
                </div>
                <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            <a href="{{route('layouts.edit', $layout->id)}}">{{__('Bewerken')}}</a>
                            <a href="#" class="delete" data-id="{{ $layout->id }}" data-action="{{--route('layouts.destroy', $layout->id) --}}">Delete</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection