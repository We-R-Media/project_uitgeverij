@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">

    <div class="items__head">
        <div class="item item__head">
            <div class="item__content">
                <div>{{__('Titel')}}</div>
            </div>
            <div class="item__summery">
                <div>{{__('Formaat')}}</div>
                <div>{{__("Aantal pagina’s")}}</div>
            </div>
            <div class="item__actions">
                <div>{{--__('Actions')--}}</div>
            </div>
        </div>
    </div>

    <ul class="items__view">
        @foreach ($projects as $project)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('projects.edit', $project->id) }}" class="">
                        <h3>{{ $project->release_name }}</h3>
                    </a>
                </div>
                <div class="item__summery">
                    <div class="item__format field">
                        <label>Formaat</label>
                        {{$project->paper_format}}
                    </div>
                    <div class="item__pages field">
                        <label>Aantal pagina’s</label>
                        {{$project->pages_total}}
                    </div>
                </div>
                <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            <a href="{{route('projects.edit', $project->id)}}">{{__('Bewerken')}}</a>
                            <a href="#" class="delete" data-id="{{ $project->id }}" data-action="{{--route('projects.destroy', $project->id) --}}">Delete</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

</div>

{{ $projects->links() }}

@endsection
