@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('formats.create', $project->id) }}" class="button button--action">{{__('Nieuw formaat')}}</a>
            </div>
        </div>
        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Projectcode')}}</div>
                </div>
                <div class="item__summary">
                    <div>{{__('Verhouding')}}</div>
                    <div>{{__('Afmetingen')}}</div>
                    <div>{{__("Prijs")}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>
        <ul class="items__view">
            @if ( $formats->count() > 0 )
                @foreach ( $formats as $format )
                    <li class="item">
                        <div class="item__content">
                            <a href="{{ route('formats.edit', $format->id) }}">
                                <h3>{{ $format->size }}</h3>
                            </a>
                        </div>
                        <div class="item__summary">
                            <div class="item__fromat field">
                                <label>{{__('Verhouding')}}</label>
                                {{$format->ratio}}
                            </div>
                            <div class="item__format field">
                                <label>{{__('Afmeting')}}</label>
                                {{$format->measurement}}
                            </div>
                            <div class="item__pages field">
                                <label>{{__('Prijs')}}</label>
                                @money($format->price)
                            </div>
                        </div>
                        <div class="item__actions">
                            <div class="actions__button">
                                <div class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                                </div>
                                <div class="actions__group">
                                    <a href="{{ route('formats.edit', $format->id) }}">{{__('Bewerken')}}</a>
                                    <a href="{{ route('formats.destroy', [$format->id, $format->project_id]) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">{{__('Verwijderen')}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            @else
                <li class="item">
                    <p>{{__('Geen formaten gevonden')}}</p>
                </li>
            @endif
        </ul>
        {{ $formats->links() }}
    </div>
@endsection
