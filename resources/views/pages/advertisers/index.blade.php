@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<ul>
    @foreach ($advertisers as $advertiser)
        <li>
            <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                {{ $advertiser->id }}
            </a>

        </li>
    @endforeach
</ul>

{{ $advertisers->links() }}

@endsection
