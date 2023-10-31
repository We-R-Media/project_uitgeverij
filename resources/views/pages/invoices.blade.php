@extends('layouts.app')

@section('title',  $pageTitleSection)

{{-- {{ $pageTitle }}
{{ $pageTitleSection }} --}}

@livewire('page-title', [ 'pageTitle' => $pageTitleSection ])

@if( $subpages )
    @livewire('subpages', ['subpages' => $subpages])
@endif

@section('content')

@endsection
