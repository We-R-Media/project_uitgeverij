@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

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
                            <strong>{{ $result->title }}</strong>
                        </li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    @endif
@endsection
