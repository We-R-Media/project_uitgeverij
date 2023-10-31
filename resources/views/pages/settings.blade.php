@extends('layouts.app')

@section('title',  $pageTitle)

@livewire('page-title', [ 'pageTitle' => $pageTitleSection ])

@if( $subpages )
    @livewire('subpages', ['subpages' => $subpages])
@endif

@section('content')
    @livewire('content-settings');
@endsection
