@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($advertisers as $advertiser)
            <li class="item">
                <div class="item__content">
                    <a href="{{ route('advertisers.edit', $advertiser->id) }}" class="">
                        <h3>{{ $advertiser->id }}</h3>
                    </a>

                    <div class="item__actions">
                        <a href="{{ route('advertisers.edit', $advertiser->id) }}">{{__('Bewerken')}}</a>
                        <a href="#" class="delete" data-id="{{ $advertiser->id }}" data-action="route('advertisers.destroy', $advertiser->id)">Verwijderen</a>
                    </div>
                </div>
                <div class="item__summery">
                    <div class="item__pages field">
                        <label>{{__('Bedrijfsnaam')}}</label>
                        {{$advertiser->name}}
                    </div>
                    <div class="item__pages field">
                        <label>{{__('Postadres')}}</label>
                        {{$advertiser->po_box}}
                    </div>
                    <div class="item__pages field">
                        <label>{{__('Postcode')}}</label>
                        {{$advertiser->postal_code}}
                    </div>
                    <div class="item__format field">
                        <label>{{__('Plaats')}}</label>
                        {{$advertiser->city}}
                    </div>
                    <div class="item__format field">
                        <label>{{__('E-maildres')}}</label>
                        {{$advertiser->email}}
                    </div>
                    {{-- <div class="blacklisted field">
                        <label>{{__('Blacklisted')}}</label>
                        @if(!empty($advertiser->blacklisted_at))
                            {{__('Ja')}}
                        @else
                            {{__('Nee')}}
                        @endif
                    </div> --}}
                </div>
            </li>
        @endforeach
    </ul>
</div>

{{ $advertisers->links() }}

@endsection
