@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <div class="bar__buttons">
                <a href="{{route('layouts.create')}}" class="button button--secondary">{{__('Nieuwe layout')}}</a>
            </div>
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Naam')}}
                </div>
                <div class="item--cell">
                    {{__('Plaatsnaam')}}
                </div>
                <div class="item--cell">
                    {{__('Logo')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($layouts as $layout)
                <div class="items__row row--data">
                    <div class="item--cell">
                        <label class="cell__label">{{__('Naam')}}</label>
                        <a href="{{route('layouts.edit', $layout->id)}}">
                            {{ $layout->layout_name}}
                        </a>
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('Plaatsnaam')}}</label>
                        {{$layout->city_name}}
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('Logo')}}</label>
                        @if (!empty($layout->logo))
                            <div class="logo__preview"><a href="{{asset($layout->logo)}}" target="_blank">{{__('Bekijk afbeelding')}}</a></div>
                        @endif
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                <a href="{{route('layouts.edit', $layout->id)}}">{{__('Bewerken')}}</a>
                                <a href="{{ route('layouts.destroy', $layout->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen layouts gevonden')}}</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
