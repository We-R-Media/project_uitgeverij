@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <div class="bar__buttons">
                <a href="{{ route('tax.create') }}" class="button button--secondary">{{__('Nieuwe toevoegen')}}</a>
            </div>
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Land')}}
                </div>
                <div class="item--cell">
                    {{__('BTW percentage 0')}}
                </div>
                <div class="item--cell">
                    {{__('BTW percentage laag')}}
                </div>
                <div class="item--cell">
                    {{__('BTW percentage hoog')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>

            @forelse ($taxes as $tax)
                <div class="items__row row--data">
                    <div class="item--cell">
                        <label class="cell__label">{{__('Land')}}</label>
                        <a href=" {{ route('tax.edit', $tax->id) }} ">
                            {{$tax->country}}
                        </a>
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('BTW 0')}}</label>
                        {{$tax->zero}}%
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('BTW laag')}}</label>
                        {{$tax->low}}%
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{__('BTW hoog')}}</label>
                        {{$tax->high}}%
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                <a href="{{route('tax.edit', $tax->id)}}">{{__('Bewerken')}}</a>
                                <a href="{{ route('tax.destroy', $tax->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen BTW gevonden')}}</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
