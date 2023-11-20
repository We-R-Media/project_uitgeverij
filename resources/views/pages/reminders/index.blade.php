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
                            <div class="item__actions">
                                <a href="{{ route('reminders.edit', $reminder->id) }}">{{__('Bewerken')}}</a>
                                <a href="{{ route('reminders.destroy', $reminder->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
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
