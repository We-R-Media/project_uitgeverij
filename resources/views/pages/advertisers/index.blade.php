@extends('layouts.app')

@section('title',  $seoTitle)

@section('content')

<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($advertisers as $advertiser)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                        <h3>{{ $advertiser->name }}</h3>
                    </a>
                    <div class="item__actions">
                        <a href="{{ route('advertisers.edit', $advertiser->id) }}">{{__('Bewerken')}}</a>
                        <a href="#" class="delete" data-id="{{ $advertiser->id }}" data-action="{{-- route('advertisers.destroy', $advertiser->id) --}}">Verwijderen</a>
                    </div>
                </div>
                <div class="item__summery">
                    <div class="item__format field">
                        <label>{{__('E-mailadres')}}</label>
                        {{$advertiser->email}}
                    </div>
                    <div class="item__pages field">
                        <label>{{__('Aangemaakt op')}}</label>
                        {{$advertiser->created_at}}
                    </div>
                    <div class="blacklisted field">
                        <label>{{__('Blacklisted')}}</label>
                        @if(!empty($advertiser->blacklisted_at))
                            {{__('Ja')}}
                        @else
                            {{__('Nee')}}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>

{{ $advertisers->links() }}

@endsection
