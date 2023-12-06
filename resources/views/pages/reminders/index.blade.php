@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">

        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('reminders.create') }}" class="button button--action">{{__('Nieuwe aanmaning')}}</a>
            </div>
        </div>

        <ul class="items__view">
            @if ( $reminders->count() > 0 )
                @foreach ($reminders as $reminder )
                    <li class="item">
                        <div class="item__content">
                            <a href="{{ route('reminders.edit', $reminder->id) }}">
                                <h3>{{ $reminder->contact_debtor }}</h3>
                            </a>
                        </div>
                        <div class="item__actions">
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
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen aanmaningen gevonden')}}</p>
                </li>
            @endif
        </ul>
        {{ $reminders->links() }}
    </div>
@endsection
