@extends('layouts.app')

@section('title',  $pageTitleSection)

@section('content')
    @if ($results->isEmpty())
        <p>No results found.</p>
    @else
        @foreach ($results as $searchResult)
            @if (!$searchResult['results']->isEmpty())
                <h2>{{ $searchResult['model'] }} Results</h2>
                <ul>
                    @foreach ($searchResult['results'] as $result)
                        <li>
                            <strong>{{ $result->name }}</strong>
                            <p>{{ $result->description }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    @endif
@endsection
