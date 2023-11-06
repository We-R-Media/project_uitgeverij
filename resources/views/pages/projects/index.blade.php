@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<<<<<<< HEAD
<ul>
    @foreach ($projects as $project)
        <li>
            <a href="{{ route('projects.edit', $project->id) }}" class="">
                {{ $project->release_name }}
            </a>

        </li>
    @endforeach
</ul>
=======
<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($projects as $project)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('projects.edit', $project->id) }}" class="">
                        <h3>{{ $project->release_name }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('projects.edit', $project->id) }}">Bewerken</a>
                        <a href="{{--delete($project->id)--}}">Verwijderen</a>
                    </div>
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
            </li>
        @endforeach
    </ul>
</div>
>>>>>>> 5af2bf4502a2bd22be2b676e93754b1fc60e7890

{{ $projects->links() }}

@endsection
