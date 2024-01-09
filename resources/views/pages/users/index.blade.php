@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <div class="bar__buttons">
                <a href="{{ route('users.create') }}" class="button button--secondary">{{__('Nieuwe gebruiker')}}</a>
            </div>
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{__('Naam')}}
                </div>
                <div class="item--cell">
                    {{__('E-mailadres')}}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse($users as $user)
                <div class="items__row row--data">
                    <div class="item--cell">
                        <a href="{{route('users.edit', $user->id)}}">
                            {{ $user->first_name}} {{$user->last_name}}
                        </a>
                    </div>
                    <div class="item--cell">
                        <div class="field">
                            <label class="cell__label">{{__('E-mailadres')}}</label>
                            {{$user->email}}
                        </div>
                    </div>
                    <div class="item--actions">
                        <div class="actions__button">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                            </div>
                            <div class="actions__group">
                                <a href="{{route('users.edit', $user->id)}}">{{__('Bewerken')}}</a>
                                <a href="{{ route('users.destroy', $user->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="items__row row--data">
                    <p>Geen btw gevonden</p>
                </div>
            @endforelse
        </ul>
        {{ $users->links() }}
    </div>
@endsection
