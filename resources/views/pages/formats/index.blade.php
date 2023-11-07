@extends('layouts.app')


@section('title', $pageTitle)
@section('content')

<div class="page__wrapper">
    <ul class="items__view">
        @foreach ($formats as $format )
            <li class="item">
                <div class="item__content">
                    
                </div>
            </li>
        @endforeach
    </ul>
</div>

@endsection
