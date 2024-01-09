{{-- <div class="form__section">
    <div class="field">
        <label class="field__label" for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" name="base_price" value="{{ $formats->$base_price }}">
    </div>
</div>

@if ($currentProject)
    <p>{{$currentProject->id}}</p>
@endif --}}

<div class="form__section">
    <div class="field">
        <label class="field__label" for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" value="{{$selectedFormat->price}}" name="base_price" readonly>
    </div>
</div>


