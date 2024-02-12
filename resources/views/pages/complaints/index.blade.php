@extends('layouts.app')

@section('seo_title', $pageTitleSection)
@section('content')
<div class="page__wrapper">
   <div class="items__table">
      <div class="items__row row--head">
         <div class="item--cell">
            {{__('Bedrijfsnaam')}}
         </div>
         <div class="item--cell">
            {{__('Editie')}}
         </div>
         <div class="item--cell">
            {{__('Soort')}}
         </div>
         <div class="item--cell">
            {{__('Datum')}}
         </div>
      </div>
   @forelse ($complaints as $complaint )
      <div class="items__row row--data">
            <div class="item--cell">
               {{$complaint->order->advertiser->name}}
            </div>
            <div class="item--cell">
               <div class="item__format field">
               <label class="cell__label">{{__('Bedrijfsnaam')}}</label>
                  {{ $complaint->orderline->project->edition_name }}
               </div>
            </div>
            <div class="item--cell">
               <label class="cell__label">{{__('Soort')}}</label>
               {{$complaint->type}}
            </div>
            <div class="item--cell">
               {{$complaint->created_at->format('d-m-y')}}
            </div>
      </div>
            @empty
            <div class="items__row row--data">
               <p>{{__('Geen klachten gevonden')}}</p>
            </div>
      @endforelse
   </div>
</div>   
@endsection