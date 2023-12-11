@extends('layouts.app')

{{-- @section([
    'seo_title' => $pageTitleSection
]) --}}

@section('seo_title',  $pageTitleSection)

@section('content')

@foreach (auth()->user()->unreadNotifications as $notification )

<div class="alert alert-info">
        <label>{{$notification->data['message']}}</label>
        <a href="{{ route('orders.edit', $notification->data['order_id']) }}" class="button button--action">{{__('Order')}}</a>
    </div>
@endforeach


@if( Gate::allows( 'isAdmin' ) )
    <a href="/admin-panel">Admin Panel</a>
@endif

@if( Gate::allows( 'isSupervisor' ) )
    <a href="/admin-panel">Supervisor Panel</a>
@endif

@if( Gate::allows( 'isSeller' ) )
    <a href="/admin-panel">Seller Panel</a>
@endif

@endsection
