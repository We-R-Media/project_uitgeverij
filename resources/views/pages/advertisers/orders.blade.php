@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
   <div class="HeaderButtons">
      <div class="buttons">
         <a href="{{ route('orders.create', $advertiser->id) }}" class="button button--action">{{__('Nieuwe order')}}</a>
      </div>
   </div>
   <div class="items__head">
      <div class="item item__head">
          <div class="item__content">
              <div>{{__('Ordernummer')}}</div>
          </div>
          <div class="item__summary">
              <div>{{__('Bedrijfsnaam')}}</div>
              <div>{{__('Plaatsnaam')}}</div>
              <div>{{__('E-mailadres')}}</div>
          </div>
          <div class="item__actions">
              <div>{{--__('Actions')--}}</div>
          </div>
      </div>
  </div>
   <ul class="items__view">
      @foreach ($advertiser->orders as $order )
      @if ($order->count() > 0)
         <li class="item">
            <div class="item__content">
               <a href="{{ route('orders.edit', $order->id) }}">
                  {{$order->id}}
               </a>
            </div>
            <div class="item__summary">
               <div class="item__format field">
                  <label>{{__('Prijs')}}</label>
                  {{ $order->advertiser->name }}
               </div>
               <div class="item__created field">
                  {{$order->advertiser->city }}
              </div>
              <div class="item__comments field">
               {{$order->advertiser->email}}
           </div>
            </div>
         </li>
      @endif
      @endforeach
   </ul>
@endsection
