@extends('layouts.app')


@section('title', $pageTitle)
@section('content')
    <div class="page__wrapper">
        <div class="items__view">
            @foreach ($invoices as $invoice )
                <li class="item">
                    <div class="item__content">
                        <a href="{{ route('invoices.edit', $invoice->id) }}">
                            <h3>{{ $invoice->id }}</h3>
                        </a>
                        <div class="item__actions">
                            <a href="{{ route('invoices.edit', $invoice->id) }}">{{__('Bewerken')}}</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </div>
    </div>
@endsection