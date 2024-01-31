@extends('layouts.app')

@section('seo_title',  $pageTitleSection)
@section('content')
    <form action="{{ route('advertisers.export') }}" class="export-form" id="advertisers-export" method="post">
        @csrf
        @method('post')
    </form>
    <form action="{{ route('advertisers.import') }}" id="advertisers-import" method="get">
        @csrf
        @method('get')
    </form>
    <div class="page__wrapper">
        <div class="header__bar">
            <x-search-field model="advertisers" placeholder="Relatie zoeken..." />

            <div class="buttons">
                <a  class="button button--action" href="{{ route('advertisers.create') }}">{{__('Nieuwe relatie')}}</a>
                <a  class="button button--action" href="" onclick="event.preventDefault(); document.getElementById('advertisers-export').submit();">{{__('Exporteren')}}</a>
                <a  class="button button--action" href="" onclick="event.preventDefault(); document.getElementById('advertisers-import').submit();">{{__('Importeren')}}</a>
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
                    <div>{{__('Woonplaats')}}</div>
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
                    <li class="item {{ $advertiser->trashed() ? 'item--thrashed' : 'item--default' }}">
                        <div class="item__content">
                            <input type="checkbox" name="selected_values[]" value="{{$advertiser->id}}" class="export--checkbox">
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
                                {{$advertiser->postal_code}} 
                            </div>
                            <div class="item__format field">
                                {{$advertiser->city}}
                                <label>{{__('Woonplaats')}}</label>
                            </div>
                            <div class="item__format field">
                                <label>{{__('E-mailadres')}}</label>
                                {{$advertiser->email}}
                            </div>
                        </div>
                        <input type="checkbox" name="" id="">
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group advertisers__menu">

                                    @if ( $advertiser->trashed() )
                                    <a href="{{ route('advertisers.restore', $advertiser->id ) }}" class="btn" onclick="return confirm('Are you sure you want to restore this record?')">{{__('Herstellen')}}</a>
                                    @else
                                        <a href="{{ route('advertisers.destroy', $advertiser->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                        <a href="{{ route('advertisers.edit', $advertiser->id) }}">{{__('Bewerken')}}</a>
                                        <a href="{{ route('orders.create', $advertiser->id) }}">{{__('Order maken')}}</a>
                                    @endif

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