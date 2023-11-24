@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('advertisers.create') }}" class="button button--action">{{__('Nieuwe relatie')}}</a>
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Bedrijfsnaam')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('Postadres')}}</div>
                    <div>{{__('Postcode')}}</div>
                    <div>{{__('E-mailadres')}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ($advertisers->count() > 0)
                @foreach ($advertisers as $advertiser)
                    <li class="item">
                        <div class="item__content">
                            <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                                <h3>{{ $advertiser->name }}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            <div class="item__pages field">
                                <Label>{{__('Postadres')}}</label>
                                {{$advertiser->po_box}}
                            </div>
                            <div class="item__format field">
                                <label>{{__('Postcode')}}</label>
                                {{$advertiser->postal_code}}, {{$advertiser->city}}
                            </div>
                            <div class="item__format field">
                                <label>{{__('E-mailadres')}}</label>
                                {{$advertiser->email}}
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{ route('advertisers.edit', $advertiser->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('advertisers.destroy', $advertiser->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen relaties gevonden')}}</p>
                </li>
            @endif
        </ul>
    </div>
    {{ $advertisers->links() }}
@endsection
