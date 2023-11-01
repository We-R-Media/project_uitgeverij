@extends('layouts.app')

@section('title',  $pageTitle)

@livewire('page-title', [ 'pageTitle' => $pageTitleSection ])

@if( $subpages )
    @livewire('subpages', ['subpages' => $subpages])
@endif

@section('content')
<<<<<<< HEAD
    @livewire('content-settings');
@endsection
=======
<div class="sub__pages">
    <a class="detailsButton nav-item" href="{{route('formats.page')}}">Formaten</a>
    <a class="detailsButton nav-item" href="{{route('tax.page')}}">BTW</a>
    <a class="detailsButton nav-item" href="{{route('contacts.page')}}">Contactpersonen</a>
    <a class="detailsButton nav-item" href="{{route('layouts.page')}}">Layouts</a>
    <a class="detailsButton nav-item" href="{{route('reminders.page')}}">Aanmaningen</a>
</div>
{{--@livewire('content-settings');--}}

@endsection
>>>>>>> 174130dae9481e3a7e6987b0600df1c4e7b0d92a
