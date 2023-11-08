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
                    <a href="{{ route('formats.edit', $format->id) }}">
                        <h3>{{ $format->id }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('formats.edit', $format->id) }}">{{__('Bewerken')}}</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection
