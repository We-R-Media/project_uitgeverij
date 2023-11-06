@extends('layouts.app')

@section('title',  $pageTitle)

@section('content')

<<<<<<< HEAD
<ul>
    @foreach ($advertisers as $advertiser)
        <li>
            <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                {{ $advertiser->id }}
                {{ $advertiser->name }}
            </a>

        </li>
    @endforeach
</ul>
=======
<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($advertisers as $advertiser)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                        <h3>{{ $advertiser->name }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('advertisers.edit', $advertiser->id) }}">Bewerken</a>
                        <a href="{{--delete($project->id)--}}">Verwijderen</a>
                    </div>
                </div>
                <div class="item__summery">
                    <div class="item__format field">
                        <label>E-mailadres</label>
                        {{$advertiser->email}}
                    </div>
                    <div class="item__pages field">
                        <label>Aangemaakt op</label>
                        {{$advertiser->created_at}}
                    </div>
                    <div class="blacklisted field">
                        <label>Blacklisted</label>
                        @if(!empty($advertiser->blacklisted_at))
                            Ja
                        @else 
                            Nee
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
>>>>>>> 5af2bf4502a2bd22be2b676e93754b1fc60e7890

{{ $advertisers->links() }}

@endsection
