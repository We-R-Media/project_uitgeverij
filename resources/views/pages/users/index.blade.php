@extends('layouts.app')



@section('title', $pageTitle)

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
            @foreach ($users as $user)
                <li class="item">
                    <div class="item__content">
                        <a href="{{route('users.edit', $user->id)}}">
                            <h3>{{ $user->first_name}} {{$user->last_name}}</h3>
                        </a>
                        <div class="item__actions">
                            <a href="{{route('users.edit', $user->id)}}">Bewerken</a>
                            <a href="#" class="delete" data-id="{{ $user->id }}" data-action="{{--route('sellers.destroy', $user->id) --}}">Delete</a>
                        </div>
                    </div>
                    <div class="item__summery">
                        <div class="item__format field">
                            <label>E-mailadres</label>
                            {{$user->email}}
                        </div>
                        <div class="item__format field">
                            <label>Rol</label>
                            {{$aliases[$user->role]}}
                        </div>
                        <div class="item__pages field">
                            <label>Aangemaakt op:</label>
                            {{$user->created_at}}
                        </div>
                    </div>
                </li>
            @endforeach 
        </ul>
    </div>

@endsection