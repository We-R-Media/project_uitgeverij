@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

<div class="page__wrapper">

    <div class="HeaderButtons">
        <div class="buttons">
            <a href="{{ route('formats.create') }}" class="button button--action">Nieuw formaat</a>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($formats as $format )
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('formats.edit', $format) }}">
                        <h3>{{ $format->id }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('formats.edit', $format) }}">{{__('Bewerken')}}</a>
                        <a href="{{ route('formats.destroy', $format) }}" class="btn" onclick="return confirm('Are you sure you want to delete this record?')">Verwijderen</a>
                    </div>
                </div>

                <div class="item__summery">
                    <div class="field">
                        <label>{{__('Grootte')}}</label>
                        {{ $format->size }}
                    </div>
                    <div class="field">
                        <label>{{__('Afmeting')}}</label>
                        {{ $format->measurement }}
                    </div>
                    <div class="field">
                        <label>{{__('Verhouding')}}</label>
                        {{ $format->ratio }}
                    </div>
                    <div class="field">
                        <label>{{__('Prijs')}}</label>
                        {{ $format->price }}
                    </div>
                </div>

            </li>
        @endforeach
    </ul>
</div>

@endsection
