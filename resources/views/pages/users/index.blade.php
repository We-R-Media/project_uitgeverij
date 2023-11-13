@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('users.index.role', 'supervisor')  }}" class="button button--action">{{__('Administratie')}}</a>
                <a href="{{ route('users.index.role', 'seller')  }}" class="button button--action">{{__('Verkopers')}}</a>
                <a href="{{ route('users.index.role', 'admin')  }}" class="button button--action">{{__('Beheerder')}}</a>
                <a href="{{ route('users.create') }}" class="button button--action">{{__('Nieuwe gebruiker')}}</a>
            </div>

        </div>
        <ul class="items__view">
            @if ( $users->count() > 0 )
                @foreach ($users as $user)
                    <li class="item">
                        <div class="item__content">
                            <a href="{{route('users.edit', $user->id)}}">
                                <h3>{{ $user->first_name}} {{$user->last_name}}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            <div class="item__format field">
                                <label>{{__('E-mailadres')}}</label>
                                {{$user->email}}
                            </div>
                            <div class="item__format field">
                                <label>{{__('Rol')}}</label>
                                {{$aliases[$user->role]}}
                            </div>
                            <div class="item__pages field">
                                <label>{{__('Aangemaakt op')}}</label>
                                {{$user->created_at}}
                            </div>
                        </div>
                        <div class="item__actions">
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
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>Geen btw gevonden</p>
                </li>
            @endif
        </ul>
    </div>
@endsection
