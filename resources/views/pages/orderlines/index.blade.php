@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')
    <div class="page__wrapper">
        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('orderlines.create', $order->id) }}" class="button button--action">{{__('Nieuwe Regel')}}</a>
            </div>
        </div>
    </div>
@endsection