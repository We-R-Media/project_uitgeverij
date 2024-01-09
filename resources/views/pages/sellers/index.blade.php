@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <x-search-field/>
            <div class="bar__buttons">
                <a href="{{--route('sellers.create')--}}" class="button button--secondary">{{__('Nieuwe verkoper')}}</a>
            </div>
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Titel')}}
                </div>
                <div class="item--cell">
                    {{__('E-mailadres')}}
                </div>
                <div class="item--cell">
                    {{__('Aangemaakt op')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($sellers as $seller)
                <div class="items__row row--data">
                    <div class="item--cell">
                        <a href="{{route('sellers.edit', $seller->id)}}">
                            {{ $seller->first_name}} {{$seller->last_name}}
                        </a>
                    </div>
                    <div class="item--cell">
                        <div class="item__format field">
                            <label>E-mailadres</label>
                            {{$seller->email}}
                        </div>
                        <div class="item__pages field">
                            <label>Aangemaakt op:</label>
                            {{$seller->created_at}}
                        </div>
                    </div>
                    <div class="item--actions">
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
                </div>
            @empty
                <div class="items__row row--data">
                    <p>Geen verkopers gevonden</p>
                </div>
            @endforelse
        </div>
        {{ $sellers->links() }}
    </div>
@endsection
