@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<ul>
    @foreach ($projects as $project)
        <li>
            <a href="{{ route('projects.edit', $project->id) }}" class="">
                {{ $project->release_name }}
            </a>

        </li>
    @endforeach
</ul>

{{ $projects->links() }}

@endsection
