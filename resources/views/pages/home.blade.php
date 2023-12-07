@extends('layouts.app')

{{-- @section([
    'seo_title' => $pageTitleSection
]) --}}

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="notifications">
    <div class="notifications__list">
        @foreach(auth()->user()->notifications as $notification)
            <span class="notification__row">
                {{ $notification->data['message'] }}
            </span>
        @endforeach
    </div>
</div>

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
