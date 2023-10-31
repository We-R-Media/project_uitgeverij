@extends('layouts.app')

@section('title',  $pageTitle)
@section('content')

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
