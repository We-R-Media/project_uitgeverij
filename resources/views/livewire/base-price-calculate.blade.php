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