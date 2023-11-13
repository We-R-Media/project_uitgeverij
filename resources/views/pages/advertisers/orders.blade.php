@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

@section('content')

<div class="page__wrapper">
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
                  <label>{{__('Aangemaakt op')}}</label>
                  {{$order->order_date}}
              </div>
              <div class="item__comments field">
               <label>{{__('Laatst geupdate op')}}</label>
               {{$order->updated_at}}
           </div>
            </div>     
         </li>             
      @endif
      @endforeach
   </ul>
@endsection
