@extends('layouts.app')


@section('title', $pageTitle)
@section('content')

<div class="page__wrapper">

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{ route('formats.create') }}" class="button button--action">Nieuw formaat</a>
        </div>
    </div>

    <div class="items__head">
        <div class="item item__head">
            <div class="item__content">
                <div>{{__('Titel')}}</div>
            </div>
            <div class="item__summery">
                <div>{{__('Afmetingen')}}</div>
                <div>{{__("Prijs")}}</div>
            </div>
            <div class="item__actions">
                <div>{{--__('Actions')--}}</div>
            </div>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($formats as $format )
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('formats.edit', $format->id) }}">
                        <h3>{{ $format->size }}</h3>
                    </a>
                </div>
                <div class="item__summery">
                    <div class="item__format field">
                        <label>Afmeting</label>
                        {{$format->measurement}}
                    </div>
                    <div class="item__pages field">
                        <label>Prijs</label>
                        {{$format->price}}
                    </div>
                </div>
                <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            <a href="{{route('formats.edit', $format->id)}}">{{__('Bewerken')}}</a>
                            <a href="#" class="delete" data-id="{{ $format->id }}" data-action="{{--route('formats.destroy', $format->id) --}}">Delete</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    
</div>

@endsection
