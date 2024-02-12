@extends('layouts.app')

@section('seo_title',  $pageTitleSection)

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
      </div>
   </div>
   <div class="items__row row--data">
      <div class="item--cell">
         <div class="field">
            
         </div>
      </div>
   </div>
</div>
@endsection
