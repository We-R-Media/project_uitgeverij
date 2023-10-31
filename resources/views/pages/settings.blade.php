@extends('layouts.app')

@section('content')
<div class="sub__pages">
    <a class="detailsButton nav-item" href="{{route('formats.page')}}">Formaten</a>
    <a class="detailsButton nav-item" href="{{route('tax.page')}}">BTW</a>
    <a class="detailsButton nav-item" href="{{route('contacts.page')}}">Contactpersonen</a>
    <a class="detailsButton nav-item" href="{{route('layouts.page')}}">Layouts</a>
    <a class="detailsButton nav-item" href="{{route('reminders.page')}}">Aanmaningen</a>
</div>
{{--@livewire('content-settings');--}}

@endsection