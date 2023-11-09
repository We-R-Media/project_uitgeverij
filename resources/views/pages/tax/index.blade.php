@extends('layouts.app')


@section('seo_title', $pageTitleSection)
@section('content')

    <div class="page__wrapper">

        <div class="HeaderButtons">
            <div class="buttons">
                <a href="{{ route('tax.create') }}" class="button button--action">Nieuwe toevoegen</a>
            </div>
        </div>

        <div class="items__head">
            <div class="item item__head">
                <div class="item__content">
                    <div>{{__('Titel')}}</div>
                </div>
                <div class="item__summery">
                    <div>{{__('BTW 0')}}</div>
                    <div>{{__('BTW laag')}}</div>
                    <div>{{__('BTW hoog')}}</div>
                </div>
                <div class="item__actions">
                    <div>{{--__('Actions')--}}</div>
                </div>
            </div>
        </div>

        <ul class="items__view">
        @foreach ($taxes as $tax)
        
            <li class="item">
                <div class="item__content">
                    <a href=" {{ route('tax.edit', $tax->id) }} ">
                        <h3>{{$tax->country}}</h3>
                    </a>
                </div>
                <div class="item__summery">
                    <div class="field">
                        <label>BTW 0</label>
                        {{$tax->zero}}
                    </div>
                    <div class="field">
                        <label>BTW laag</label>
                        {{$tax->low}}
                    </div>
                    <div class="field">
                        <label>BTW hoog</label>
                        {{$tax->high}}
                    </div>
                </div>
                <div class="item__actions">
                    <div class="actions__button">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 128 512"><path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/></svg>
                        </div>
                        <div class="actions__group">
                            <a href="{{route('tax.edit', $tax->id)}}">{{__('Bewerken')}}</a>
                            <a href="#" class="delete" data-id="{{ $tax->id }}" data-action="{{--route('tax.destroy', $tax->id) --}}">Delete</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>

    </div>
@endsection
