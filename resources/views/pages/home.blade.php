@extends('layouts.app')

{{-- @section([
    'seo_title' => $pageTitleSection
]) --}}

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="dashboard__wrapper">
    <h3>{{__('Recente meldingen')}}</h3>
    <div class="notification__wrapper">


@can('isSupervisor')
@foreach (auth()->user()->unreadNotifications as $notification )
        <div class="notification__card">
            <label>{{$notification->data['message']}}</label>
            <a href="{{ route('orders.edit', $notification->data['order_id']) }}" class="button button-big button--secondary">{{__('Order bekijken')}}</a>
        </div>
@endforeach
    </div>
    @endcan
</div>

<a href="{{ route('advertisers.import') }}">{{__('Importeren')}}</a>



@if( Gate::allows( 'isAdmin' ) )
    <a href="/admin-panel">Admin Panel</a>
    <form action="{{ route('webhook.handler') }}" method="post">
        @csrf
        @method('post')
        <input type="submit" value="Verzenden">
    </form>
@endif

@if( Gate::allows( 'isSupervisor' ) )
    <a href="/admin-panel">Supervisor Panel</a>
@endif

@if( Gate::allows( 'isSeller' ) )
    <a href="/admin-panel">Seller Panel</a>
@endif

@endsection
