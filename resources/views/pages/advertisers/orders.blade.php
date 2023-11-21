@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
   <div class="items__head">
      <div class="item item__head">
          <div class="item__content">
              <div>{{__('Ordernummer')}}</div>
          </div>
          <div class="item__summary">
              <div>{{__('Totaalprijs')}}</div>
              <div>{{__('Adresgegevens')}}</div>
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
                  {{$order->order_total_price}}
               </div>
               <div class="item__created field">
                  {{$order->order_date}}
              </div>
              <div class="item__comments field">
               {{$order->updated_at}}
           </div>
            </div>
         </li>
      @endif
      @endforeach
   </ul>
@endsection
