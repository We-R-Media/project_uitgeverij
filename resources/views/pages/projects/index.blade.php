@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <form action="{{ route('projects.export') }}" class="export-form" id="export-form" style="display: none;" method="post">
            @csrf
            @method('post')
        </form>
        <div class="header__bar">
            <x-search-field name="projects" model="projects" placeholder="Projecten zoeken..." />
            @cannot('isSeller')
                <div class="bar__buttons">
                    <a href="" class="button button--secondary" onclick="event.preventDefault(); document.getElementById('export-form').submit();">{{__('Exporteren')}}</a>
                    <a href="{{ route('projects.create') }}" class="button button--primary">{{__('Nieuw project')}}</a>
                </div>
            @endcannot
        </div>
        <div class="items__table">
            <div class="items__row row--head">
                <div class="item--cell">
                    {{ __('Projectcode') }}
                </div>
                <div class="item--cell">
                    {{ __('Naam uitgave') }}
                </div>
                <div class="item--cell">
                    {{ __('Editie') }}
                </div>
                <div class="item--action">
                    {{-- Spacer for actions --}}
                </div>
            </div>
            @forelse ( $projects as $project )
                <div class="items__row row--data">
                    <label class="cell__label">{{__('Projectcode')}}</label>
                    <div class="item--cell">
                        <input type="checkbox" name="selected_values[]" value="{{$project->id}}" class="export--checkbox">
                        <a href="{{ route('projects.edit', $project->id) }}" class="">
                            {{ $project->name }}
                        </a>
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{ __('Uitgave') }}</label>
                        {{$project->release_name}}
                    </div>
                    <div class="item--cell">
                        <label class="cell__label">{{ __('Editie') }}</label>
                        {{$project->edition_name}}
                    </div>
                    @cannot('isSeller')
                        <div class="item--actions">
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
                </div>
            @empty
                <div class="items__row row--data">
                    <p>{{__('Geen projecten gevonden')}}</p>
                </div>
            @endforelse
        </div>

        {{ $projects->links() }}
    </div>
@endsection
