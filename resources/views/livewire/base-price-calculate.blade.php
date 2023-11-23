<div class="fields base">
    <div class="field field-alt">
        <label for="base_price">{{__('Basisbedrag')}}</label>
        <input type="text" name="base_price" id="" wire:model="base_price" readonly>
        @error('base_price')
            <span class="form__message" role="alert">
                <small>{{ $message }}</small>
            </span>
        @enderror
    </div>
    
    <div class="field field-alt">
        <label for="format">{{__('Formaat')}}</label>
        <select wire:model.change="format" name="format" id="">
            @foreach ($order->project->formats as $format)
                <option value="{{$format->id}}">{{$format->size}}</option>
            @endforeach
        </select>
    </div>
</div>