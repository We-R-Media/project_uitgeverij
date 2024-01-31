@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <div class="bar__buttons">
                <a href="{{ route('reminders.create') }}" class="button button--secondary">{{__('Nieuwe aanmaning')}}</a>
            </div>
        </div>

        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Land')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ($reminders as $reminder )
                <div class="items__row row--data">
                    <div class="item--cell">
                        <a href="{{ route('reminders.edit', $reminder->id) }}">
                            {{ $reminder->contact_debtor }}
                        </a>
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                <a href="{{route('reminders.edit', $reminder->id)}}">{{__('Bewerken')}}</a>
                                <a href="{{ route('reminders.destroy', $reminder->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen aanmaningen gevonden')}}</p>
                </div>
            @endforelse
        </div>
        {{ $reminders->links() }}
    </div>
@endsection
