@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{--route('sellers.create')--}}" class="button button--action">{{__('Nieuwe verkoper')}}</a>
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Titel')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('E-mailadres')}}</div>
                    <div>{{__('Aangemaakt op')}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ( $sellers->count() > 0 )
                @foreach ($sellers as $seller)
                    <li class="item">
                        <div class="item__content">
                            <a href="{{route('sellers.edit', $seller->id)}}">
                                <h3>{{ $seller->first_name}} {{$seller->last_name}}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            <div class="item__format field">
                                <label>E-mailadres</label>
                                {{$seller->email}}
                            </div>
                            <div class="item__pages field">
                                <label>Aangemaakt op:</label>
                                {{$seller->created_at}}
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{route('sellers.edit', $seller->id)}}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('sellers.destroy', $seller->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>Geen verkopers gevonden</p>
                </li>
            @endif
        </ul>
    </div>
@endsection
