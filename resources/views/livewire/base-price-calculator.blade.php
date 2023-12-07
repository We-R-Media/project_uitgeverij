{{-- <div class="fields base">
    <div class="field field-alt">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" name="base_price" value="{{ $formats->$base_price }}">
    </div>
</div>

@if ($currentProject)
    <p>{{$currentProject->id}}</p>
@endif --}}

<div class="fields base">
    <div class="field field-alt">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" value="{{$selectedFormat->price}}" name="base_price" id="" readonly>
    </div>
</div>


