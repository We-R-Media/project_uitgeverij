@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="header__bar">
            <x-search-field name="projects" model="projects" placeholder="Projecten zoeken..." />
            <div class="buttons">
            @cannot('isSeller')
              <a href="{{ route('projects.create') }}" class="button button--action">{{__('Nieuw project')}}</a>        
            @endcannot
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{ __('Projectcode') }}</div>
                </div>
                <div class="item__summary">
                    <div>{{ __('Naam uitgave') }}</div>
                    <div>{{ __('Editie') }}</div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ( $projects->count() > 0 )
                @foreach ( $projects as $project )
                    <li class="item">
                        <div class="item__content">
                            <a href="{{ route('projects.edit', $project->id) }}" class="">
                                <h3>{{ $project->name }}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            <div class="item__format field">
                                <label>{{ __('Uitgave') }}</label>
                                {{$project->release_name}}
                            </div>
                            <div class="item__pages field">
                                <label>{{ __('Editie') }}</label>
                                {{$project->edition_name}}
                            </div>
                        </div>
                        @cannot('isSeller')
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z" /></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{ route('projects.edit', $project->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('projects.destroy', $project->id) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                    <a href="{{ route('projects.duplicate', $project->id) }}" class="btn">{{__('Dupliceren')}}</a>
                                </div>
                            </div>
                        </div>
                        @endcannot
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen projecten gevonden')}}</p>
                </li>
            @endif
        </ul>
        {{ $projects->links() }}
    </div>
@endsection
